<?php
namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;
class RoleAndPermissionSeeder extends Seeder
{
    public function run()
    {
        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@test.com',
            'password' => bcrypt('password')
        ]);

        Permission::create(['name' => 'create-users']);
        Permission::create(['name' => 'create-blog-posts']);

        $adminRole = Role::create(['name' => 'Admin']);
        $editorRole = Role::create(['name' => 'Editor']);

        $adminRole->givePermissionTo([
            'create-users',
        ]);

        $editorRole->givePermissionTo([
            'create-blog-posts',
        ]);

        $admin = User::first();
        $admin->assignRole('Admin');

    }
}
