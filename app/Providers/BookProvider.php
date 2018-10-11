<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Category;
class BookProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerViewComposer();
    }

    public function registerViewComposer(){
        view()->composer('*',function($view){
                $view->with([
                    'allCategories'=>Category::all()
                            ]);
        });
    }
}
