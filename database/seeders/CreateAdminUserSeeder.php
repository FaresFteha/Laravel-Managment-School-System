<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = [
            'en' => 'Fares Fteha', 'ar' => 'فارس فتيحة'
        ];
        $user = User::create([
            'name' => $name,
            'email' => 'admin@gmail.com',
            'password' => Hash::make('2525**2525**'),
            'roles_name' =>['Owner'],
        //    'status' => 'مفعل',
        ]);
        $role = Role::create([
            'name' =>'Owner',
            ]
        );
        $permissions = Permission::pluck('id', 'id')->all();
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);
    }
}
