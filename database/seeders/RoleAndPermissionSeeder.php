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
            'password' => bcrypt('password'),
            'email_verified_at'=>date("Y-m-d H:i:s")
        ]);

        $especialista = User::create([
            'name' => 'especialista',
            'email' => 'especialista@test.com',
            'password' => bcrypt('password'),
            'email_verified_at'=>date("Y-m-d H:i:s")
        ]);

        /*$invitado = User::create([
            'name' => 'invitado',
            'email' => 'invitado@test.com',
            'password' => bcrypt('password')
        ]);*/

        Permission::create(['name' => 'registrar-usuarios']);
        Permission::create(['name' => 'registrar-altasybajas']);
        Permission::create(['name' => 'view-invitado']);

        $adminRole = Role::create(['name' => 'Admin']);
        $registradorRole = Role::create(['name' => 'Registrador']);
        //$invitadoRole = Role::create(['name' => 'Invitado']);

        $adminRole->givePermissionTo([
            'registrar-usuarios',
            'registrar-altasybajas',


        ]);

        $registradorRole->givePermissionTo([

            'registrar-altasybajas',
        ]);

        /* $invitadoRole->givePermissionTo([
            'view-invitado',
        ]);*/

        $admin = User::first();
        $admin->assignRole('Admin');
        $especialista->assignRole('Registrador');
        //$invitado->assignRole('Invitado');
    }
}
