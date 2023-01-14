<?php

namespace App\Providers;

use App\Contracts\CategoryRepository;
use App\Contracts\RecordRepository;
use App\Contracts\UserRepository;
use App\Repository\Cache\CacheCategoryRepository;
use App\Repository\Cache\CacheRecordRepository;
use App\Repository\Cache\CacheUserRepository;
use Illuminate\Support\Facades\Request;
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
        if(Request::is('api/v1/*')){
            $this->bindV1();
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Bind classes for api v1
     */
    private function bindV1(){
        app()->bind(UserRepository::class,CacheUserRepository::class);
        app()->bind(CategoryRepository::class,CacheCategoryRepository::class);
        app()->bind(RecordRepository::class,CacheRecordRepository::class);
    }
}
