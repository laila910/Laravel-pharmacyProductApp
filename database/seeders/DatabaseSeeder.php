<?php

namespace Database\Seeders;

use App\Models\Pharmacy;
use App\Models\Product;
use App\Models\ProductPharmacy;
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




       

    $this->call([
       ProductSeeder::class
    ]);
    $this->call([
        PharmacySeeder::class
    ]);
    $this->call([
        ProductPharmacySeeder::class
    ]);
   

 
    
    }
}
