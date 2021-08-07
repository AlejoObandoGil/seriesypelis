<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::truncate();
        Role::truncate();
        User::truncate();

        $adminRole = Role::create(['name' => 'Admin']);
        $writerRole = Role::create(['name' => 'Editor']);
        $modRole = Role::create(['name' => 'Moderador']);
        $usuarioRole = Role::create(['name' => 'Usuario']);

        $viewPostsPermission = Permission::create(['name' => 'View posts']);
        $createPostsPermission = Permission::create(['name' => 'Create posts']);
        $updatePostsPermission = Permission::create(['name' => 'Update posts']);
        $deletePostsPermission = Permission::create(['name' => 'Delete posts']);

        $viewUsersPermission = Permission::create(['name' => 'View users']);
        $createUsersPermission = Permission::create(['name' => 'Create users']);
        $updateUsersPermission = Permission::create(['name' => 'Update users']);
        $deleteUsersPermission = Permission::create(['name' => 'Delete users']);

        $viewRolesPermission = Permission::create(['name' => 'View roles']);
        $createRolesPermission = Permission::create(['name' => 'Create roles']);
        $updateRolesPermission = Permission::create(['name' => 'Update roles']);
        $deleteRolesPermission = Permission::create(['name' => 'Delete roles']);

        $adminRole->givePermissionTo($viewPostsPermission);
        $adminRole->givePermissionTo($createPostsPermission);
        $adminRole->givePermissionTo($updatePostsPermission);
        $adminRole->givePermissionTo($deletePostsPermission);
        $adminRole->givePermissionTo($viewUsersPermission);
        $adminRole->givePermissionTo($createUsersPermission);
        $adminRole->givePermissionTo($updateUsersPermission);
        $adminRole->givePermissionTo($deleteUsersPermission);
        $adminRole->givePermissionTo($viewRolesPermission);
        $adminRole->givePermissionTo($createRolesPermission);
        $adminRole->givePermissionTo($updateRolesPermission);
        $adminRole->givePermissionTo($deleteRolesPermission);

        $writerRole->givePermissionTo($viewPostsPermission);
        $writerRole->givePermissionTo($createPostsPermission);
        $writerRole->givePermissionTo($updatePostsPermission);

        $modRole->givePermissionTo($viewUsersPermission);
        $modRole->givePermissionTo($createUsersPermission);
        $modRole->givePermissionTo($updateUsersPermission);
        $modRole->givePermissionTo($deleteUsersPermission);
        $modRole->givePermissionTo($viewRolesPermission);
        $modRole->givePermissionTo($createRolesPermission);
        $modRole->givePermissionTo($updateRolesPermission);
        $modRole->givePermissionTo($deleteRolesPermission);

        $admin = new User;
        $admin->name = 'JA';
        $admin->email = 'jonalejo0803@gmail.com';
        $admin->password = '12345678';
        $admin->save();

        $admin->assignRole($adminRole);

        $writer = new User;
        $writer->name = 'AJ';
        $writer->email = 'john@gmail.com';
        $writer->password = '12345678';
        $writer->save();

        $writer->assignRole($writerRole);

        $mod = new User;
        $mod->name = 'modjohn';
        $mod->email = 'mod@gmail.com';
        $mod->password = '12345678';
        $mod->save();

        $mod->assignRole($modRole);
    }
}
