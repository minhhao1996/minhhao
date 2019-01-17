<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use  App\Catalog;
use  App\Product;
use Cart;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.menuMain',function ($view){


            $cat = Catalog::where('parent_id',0)->orderBy('location', 'asc')->get()    ->toArray();
            $view->with('cat',$cat);

        });

        view()->composer('layouts.productHot',function ($view){
            $pro_hot = Product::select('avatar', 'name', 'id', 'price', 'discount','status')
                ->orderBy('buyed', 'DESC')->limit(5)
                ->get()->toArray();
            $view->with('pro_hot',$pro_hot);

        });
        view()->composer('layouts.header',function ($view){
            $quantity = Cart::getTotalQuantity();
            $data = Cart::getContent();
            $total= Cart::getTotal ();
            $view->with('data',$data)->with('qty',$quantity)->with('total',$total);

        });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
    public function search($name)
    {


    }
}
