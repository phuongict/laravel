<?php

use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $parent = 0;

    public function run()
    {
        App\Permission::insert([
            'slug' => 'backend',
            'name' => 'Control panel',
            'parent' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        /*
         * user
         */
        $this->parent = App\Permission::insertGetId([
            'slug' => 'backend.user.index',
            'name' => 'Người dùng',
            'parent' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        App\Permission::insert([
            [
                'slug' => 'backend.user.create',
                'name' => 'Thêm người dùng',
                'parent' => $this->parent,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'slug' => 'backend.user.edit',
                'name' => 'Cập nhật người dùng',
                'parent' => $this->parent,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'slug' => 'backend.user.show',
                'name' => 'Thông tin người dùng',
                'parent' => $this->parent,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'slug' => 'backend.user.delete',
                'name' => 'Xóa người dùng',
                'parent' => $this->parent,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'slug' => 'backend.user.blockUser',
                'name' => 'Khóa người dùng',
                'parent' => $this->parent,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'slug' => 'backend.user.editPermissions',
                'name' => 'Cập nhật quyền người dùng',
                'parent' => $this->parent,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
        ]);
    }
}
