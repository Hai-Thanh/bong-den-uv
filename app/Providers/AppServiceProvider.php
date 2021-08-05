<?php

namespace App\Providers;

use App\Models\Categories;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;


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
        Paginator::useBootstrap();
        
        View::share('schoolname', 'FPT Polytechnic');  // truyền 1 view ra tất cả màn hình

        View::composer(['admin.categories.index', 'admin.product.index'], function ($view) {
            $users = User::all();
            $view->with('system_user' ,$users);

        });
     
        View::composer(['frontend.home.components.sidebar'], function ($view) {
            $categories = Categories::all();
            $tagsName = Tag::all();
            $view->with(['categories'=>$categories, 'tagsName' =>$tagsName]);
          
        });

        View::composer(['frontend.home.components.footer'], function ($view) {
            $categories = Categories::take(5)->get();
            
            $view->with(['categories'=>$categories]);
        });
    }
}
