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
        // $product_id=$this->ask('What is the product Id?');

$product =$this->arguments('product');
        
print_r($product['product']);

        // $headers=['id','name','price'];
        // foreach ($product->pharmacies() as $pharmacy ) {
        //     echo $pharmacy->name;
        // }
        // $products=ProductPharmacy::where('product_id','=',$product_id)->get();
        // $pharmacy_name=Pharmacy::find($products->pharmacy->id);
        // $arr=[];
        // array_push($arr,[
        //     'pharmacy_id'=>$product->pharmacy_id,
        //     'pharmacyName'=>$pharmacy_name,
        //     'ProductPrice'=>$products->price
        // ]);

// $data='';
        // print_r($arr);
        //toJson();
        // $this->table($headers,$data);

    }
}
