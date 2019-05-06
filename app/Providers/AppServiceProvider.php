<?php

namespace App\Providers;

use View;
use App\Category;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('company.category.manageCategory',function ($abc){
            $categories = Category::Where('publicationStatus',1)->get();
            $abc->with('categories',$categories);
        });

        $publishedCategories = Category::Where('publicationStatus',1)->get();
        $categories = Category::Where('publicationStatus',1)->get();
        View::share('publishedCategories',$publishedCategories);
        View::share('categories',$categories);
    }
}
