<?php
namespace Database\Seeders;

use App\Enums\RolesEnum;
use App\Enums\PermissionsEnum;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // creating roles

        $userRole   = Role::create(["name" => RolesEnum::User->value]);
        $vendorRole = Role::create(["name" => RolesEnum::Vendor->value]);
        $adminRole  = Role::create(["name" => RolesEnum::Admin->value]);

        // create permissions

        $buyProducts    = Permission::create(['name' => PermissionsEnum::BuyProducts->value]);
        $sellProducts   = Permission::create(["name" => PermissionsEnum::SellProducts->value]);
        $approveVendors = Permission::create(['name' => PermissionsEnum::ApproveVendors->value]);

        // assign permissions to roles
        $userRole->syncPermissions([
            $buyProducts,
        ]);
        $vendorRole->syncPermissions([
            $buyProducts, $sellProducts,
        ]);
        $adminRole->syncPermissions([
            $buyProducts, $sellProducts, $approveVendors,
        ]);
    }
}
