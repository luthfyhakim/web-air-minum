<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->create([
            'username' => 'admin',
            'name' => 'Admin',
            'email' => 'admin@swa.com',
            'password' => bcrypt('admin1234'),
        ]);

        \App\Models\User::factory()->create([
            'username' => 'usertest',
            'name' => 'User Test',
            'email' => 'usertest@swa.com',
            'password' => bcrypt('usertest'),
            'birth_date' => '1990-01-01',
            'phone' => '+6281358132251',
            'address' => 'Jl. Contoh Alamat No. 123, Jakarta',
        ]);

        $this->call([
            ProductSeeder::class,
            OrderSeeder::class,
            OrderHistorySeeder::class,
            InvoiceSeeder::class,
        ]);
    }
}
