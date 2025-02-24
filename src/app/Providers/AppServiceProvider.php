<?php

namespace App\Providers;

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
        // View::share('genders', [
        //     1 => '男性',
        //     2 => '女性',
        //     3 => 'その他',
        // ]);

        // View::share('categories', [
        //     1 => '商品のお届けについて',
        //     2 => '商品の交換について',
        //     3 => '商品トラブル',
        //     4 => 'ショップへのお問い合わせ',
        //     5 => 'その他',
        // ]);
    }
}
