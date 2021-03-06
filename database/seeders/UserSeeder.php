<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
                // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $permission = Permission::create(['name' => 'users']); 
        $permission = Permission::create(['name' => 'clients']);
        $permission = Permission::create(['name' => 'admins']);
        $permission = Permission::create(['name' => 'classifications']);
        
        $user = Role::create(['name' => 'user']);
        $client = Role::create(['name' => 'client']);
        $admin = Role::create(['name' => 'admin']);

        $admin->givePermissionTo(Permission::all());
        $client->givePermissionTo(Permission::all());
        $newUser = User::create([
            'id' => 200,
            'name' => 'Webmaster Alini',
            'email' => 'alini.canedo@gmail.com',
            'matricula' => '',
            'periodo' => '',
            'password' => bcrypt('123123123'),
            'type' => 'admin',
        ]);
        $newUser->assignRole('admin');

        $newUser = User::create([
            'id' => 199,
            'name' => 'Webmaster Teste',
            'email' => 'alini.teste@gmail.com',
            'matricula' => '',
            'periodo' => '',
            'password' => bcrypt('123123123'),
            'type' => 'admin',
        ]);
        $newUser->assignRole('admin');

        $newUser = User::create([
            'id' => 198,
            'name' => 'Aluno de Testes',
            'email' => 'aluno@gmail.com',
            'matricula' => '',
            'periodo' => '',
            'password' => bcrypt('123123123'),
            'type' => 'client',
        ]);

        $newUser->assignRole('client');
    }
}
