<?php
/**
 * Created by PhpStorm.
 * User: liwei
 * Date: 2018/4/13
 * Time: 上午11:52
 */
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // 重置角色和权限缓存
        app()['cache']->forget('spatie.permission.cache');

        // 创建权限
        Permission::create(['name' => 'edit articles']);
        Permission::create(['name' => 'delete articles']);
        Permission::create(['name' => 'publish articles']);
        Permission::create(['name' => 'unpublish articles']);

        // 创建角色并分配创建的权限

        $role = Role::create(['name' => 'writer']);
        $role->givePermissionTo('edit articles');

        $role = Role::create(['name' => 'moderator']);
        $role->givePermissionTo(['publish articles', 'unpublish articles']);

        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());
    }
}