<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class SpatieUser extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $admin_sup_permission = [
            'create_user',
            'create_menu',
            'create_menu_promo',
            'menu_detail',
            'detail_all_pemesanan',
            'all_transaksi',


            //user side
            "pembelian",
            "pemesanan",
            "transaksi",
        ];

        $user_sup_permission = [
            "pembelian",
            "pemesanan",
            "transaksi",

        ];

        $allPermission = array_unique(array_merge($admin_sup_permission, $user_sup_permission));

        foreach ($allPermission as $permission) {
            Permission::create([
                'name' => $permission
            ]);
        }

        $role = Role::create(['name' => 'admin']);
        foreach ($admin_sup_permission as $permission) {
            $role->givePermissionTo($permission);
        }

        $role = Role::create(['name' => 'user']);
        foreach ($user_sup_permission as $permission) {
            $role->givePermissionTo($permission);
        }

    }
    }
