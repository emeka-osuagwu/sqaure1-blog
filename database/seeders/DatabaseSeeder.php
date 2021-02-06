<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        Role::create(['name' => 'admin']);
        Role::create(['name' => 'user']);

        $admin = User::create([
            'name' => 'Emeka Osuagwu',
            'email' => 'admin@gmail.com',
            'password' => 'password',
        ]);
        
        $admin->assignRole('admin');

        $user = User::create([
            'name' => 'Onolapo Osuagwu',
            'email' => 'user@gmail.com',
            'password' => 'password',
        ]);
        
        $user->assignRole('user');

        \App\Models\Post::factory(10)->create();
    }
}
