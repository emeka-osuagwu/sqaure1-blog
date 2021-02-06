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
            
        /*
        |--------------------------------------------------------------------------
        | Add Comment
        |--------------------------------------------------------------------------
        */
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        /*
        |--------------------------------------------------------------------------
        | Add Comment
        |--------------------------------------------------------------------------
        */
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'user']);

        /*
        |--------------------------------------------------------------------------
        | Add Comment
        |--------------------------------------------------------------------------
        */
        $admin = User::create([
            'name' => 'Emeka Osuagwu',
            'email' => 'admin@gmail.com',
            'password' => 'password',
        ]);
        $admin->assignRole('admin');

        /*
        |--------------------------------------------------------------------------
        | Add Comment
        |--------------------------------------------------------------------------
        */
        $user = User::create([
            'name' => 'Onolapo Osuagwu',
            'email' => 'user@gmail.com',
            'password' => 'password',
        ]);
        $user->assignRole('user');
          
        /*
        |--------------------------------------------------------------------------
        | Add Comment
        |--------------------------------------------------------------------------
        */
        \App\Models\Post::factory(10)->create();
    }
}
