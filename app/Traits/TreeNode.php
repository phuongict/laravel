<?php
/**
 * Created by PhpStorm.
 * User: phamphuong
 * Author: Phạm Văn Phương
 * Date: 17/12/2019
 * Time: 11:35
 */
namespace App\Traits;

trait TreeNode{
    private function createTree($listPermissions, $listPermissionsUser, &$tree, $parent = 0){
        $cate_child = array();
        foreach ($listPermissions as $key => $item)
        {
            if ($item->parent == $parent)
            {
                $cate_child[] = $item;
                unset($listPermissions[$key]);
            }
        }
        if ($cate_child)
        {
            $tree[] = '<ul>';
            foreach ($cate_child as $key => $item)
            {
                $checked = $listPermissionsUser->contains($item)?'checked':'';
                $findChild = $listPermissions->filter(function($childItem) use ($item) {
                   return $childItem->parent == $item->id;
                });
                $collapse = $findChild->isNotEmpty()?'class="collapsed"':'';
                $tree[] = '<li '.$collapse.'>';
                $tree[] = '<div class="custom-control custom-checkbox mb-3">';
                $tree[] = '<input type="checkbox" name="permissions[]" class="custom-control-input" id="permission_'.$item->id.'" value="'.$item->id.'" '.$checked.'>';
                $tree[] = '<label class="custom-control-label" for="permission_'.$item->id.'">'.$item->name.'</label>';
                $tree[] = '</div>';
                $this->createTree($listPermissions, $listPermissionsUser, $tree, $item->id);
                $tree[] = '</li>';
            }
            $tree[] = '</ul>';
        }
        return $tree;
    }
    private function getParent($lists, &$tree, $char = '', $id = null, $myid = null, $parent_id = 0)
    {
        foreach ($lists as $key => $item) {
            if ($item->parent == $parent_id) {
                $selected = $id == $item->id ? 'selected' : '';
                if ($item->id != $myid) {
                    $tree[] = '<option value="' . $item->id . '" ' . $selected . '>' . $char . ' ' . $item->name . '</option>';
                }
                unset($lists[$key]);
                $this->getParent($lists, $tree, $char . '|---', $id, $myid, $item->id);
            }
        }
    }
}
