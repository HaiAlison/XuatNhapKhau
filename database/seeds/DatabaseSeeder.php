<?php

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
        // $this->call(UserSeeder::class);
        $this->call(createAccountUser::class);
        $this->call(createAdminAccount::class);
        $this->call(seedShipmentStatus::class);
        $this->call(bindingSeeder::class);
        $this->call(certificateOfOriginSeeder::class);
        $this->call(customerSeeder::class);
        $this->call(incotermsSeeder::class);
        $this->call(manufacturerSeeder::class);
        $this->call(originSeeder::class);
        $this->call(containerSizeSeeder::class);
        $this->call(packingSeeder::class);
        $this->call(paymentTermsSeeder::class);
        $this->call(PODSeeder::class);
        $this->call(POStatusSeeder::class);
        $this->call(productSeeder::class);
        $this->call(supplierSeeder::class);
        $this->call(weightUnitSeeder::class);
    }
}
