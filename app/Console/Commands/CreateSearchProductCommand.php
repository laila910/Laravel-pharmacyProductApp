<?php

namespace App\Console\Commands;

use App\Models\Pharmacy;
use Illuminate\Console\Command;
use App\Models\Product;
use App\Models\ProductPharmacy;

class CreateSearchProductCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'products:search-cheapest {product}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command for takes product id and returns cheapest 5 pharmacies (id, name, price)
    have this product';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

    //  $product =$this->arguments('product');
        
    //  print_r($product['product']);

    }
}
