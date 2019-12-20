<?php
/**
 * Created by PhpStorm.
 * User: phamphuong
 * Author: Phạm Văn Phương
 * Date: 10/12/2019
 * Time: 16:43
 */

namespace App\Repositories;

use App\Abstracts\Repository;
use App\Interfaces\MenuRepositoryInterface;
use App\Menu;
use Illuminate\Support\Facades\Route;

class MenuRepository extends Repository implements MenuRepositoryInterface
{
    protected $modelClassName = '\\App\\Menu';
    private $menu;

    public function __construct(Menu $menu)
    {
        $this->menu = $menu;
    }
    public function allWhere(array $where = [], array $array = ['*']){
        return $this->menu->select($array)->where($where)->with('permission')->get();
    }
    public static function setUpMenu()
    {
        $instance = new static(new Menu());
        $allItem = $instance->allWhere([['location',0]], ['*'])->sortBy('order');
        $render = [];
        $instance->createMenu($allItem, $render);
        return implode('', $render);
    }
    public function createMenu($menus, &$render, $parent_id = 0)
    {
        $menu_child = array();
        foreach ($menus as $key => $item) {
            if ($item->parent == $parent_id) {
                $menu_child[] = $item;
                unset($menus[$key]);
            }
        }
        if ($menu_child) {
            foreach ($menu_child as $key => $item) {
                if (!auth()->user()->can($item->permission->slug))
                    continue;
                $filterChild = $menus->filter(function ($other_item) use ($item) {
                    return $other_item->parent === $item->id;
                });
                $currentRouteUrl = '';
                switch ($item->type) {
                    case 0:
                        $currentRouteUrl = Route::currentRouteName();
                        break;
                    case 1:
                        $currentRouteUrl = url()->current();
                        break;
                }
                $active = '';
                $menuOpen = '';
                if ($filterChild->isNotEmpty()) {
                    $find = $filterChild->filter(function($item){
                        switch ($item->type) {
                            case 0:
                                return $item->value == Route::currentRouteName();
                                break;
                            case 1:
                                return $item->value == url()->current();
                                break;
                        }
                        return false;
                    });
                    if($find->isNotEmpty())
                    {
                        $active = 'active';
                        $menuOpen = 'menu-open';
                    }
                    $render[] = '<li class="nav-item has-treeview '.$menuOpen.'">';
                    $render[] = '<a href="#" class="nav-link '.$active.'"> ';
                    $render[] = '<i class="nav-icon ' . $item->icon . '"></i>';
                    $render[] = '<p>' . $item->name . ' <i class="right fas fa-angle-left"></i></p>';
                    $render[] = '</a>';
                    $render[] = '<ul class="nav nav-treeview">';
                    $this->createMenu($menus, $render, $item->id);
                    $render[] = '</ul>';
                    $render[] = '</li>';
                } else {
                    if($item->value == $currentRouteUrl)
                        $active = 'active';
                    $render[] = '<li class="nav-item">';
                    $link = $item->type === 0 ? route($item->value) : $item->value;
                    $render[] = '<a href="' . $link . '" class="nav-link '.$active.'"> ';
                    $render[] = '<i class="nav-icon ' . $item->icon . '"></i>';
                    $render[] = '<p>' . $item->name . '</p>';
                    $render[] = '</a>';
                    $render[] = '</li>';
                }
            }

        }
    }

}
