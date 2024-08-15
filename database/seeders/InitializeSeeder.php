<?php

namespace Database\Seeders;

use App\Models\Companies;
use App\Models\Roles;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InitializeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $company = [
            'name' => 'POS PROJECT',
            'email' => 'agieswahyudi+company@gmail.com',
            'phone' => '081398257238',
            'address' => 'Sukabumi',
            'logo' => '',
            'is_active' => true,
        ];
        Companies::create($company);

        $roles = [
            [
                "position" => "superadmin",
                "is_active" => true,
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "position" => "owner",
                "is_active" => true,
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "position" => "admin",
                "is_active" => true,
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "position" => "cashier",
                "is_active" => true,
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "position" => "cook",
                "is_active" => true,
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "position" => "server",
                "is_active" => true,
                "created_at" => now(),
                "updated_at" => now()
            ],
        ];
        Roles::insert($roles);


        $user = [
            'company_id' => 1,
            'name' => 'Agies Wahyudi',
            'email' => 'agieswahyudi@gmail.com',
            'phone' => '081398257238',
            'password' => 'agieswahyudi',
            'role_id' => 1,
            'is_active' => 1,
        ];
        User::create($user);
    }
}
