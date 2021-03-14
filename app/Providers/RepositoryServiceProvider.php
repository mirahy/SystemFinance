<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
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
        $this->app->bind(\App\Repositories\TbCadUserRepository::class, \App\Repositories\TbCadUserRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\TbLaunchRepository::class, \App\Repositories\TbLaunchRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\TbBaseRepository::class, \App\Repositories\TbBaseRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\TbProfileRepository::class, \App\Repositories\TbProfileRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\TbTypeLauncRepository::class, \App\Repositories\TbTypeLauncRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\TbTypeLaunchRepository::class, \App\Repositories\TbTypeLaunchRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\TbCaixaRepository::class, \App\Repositories\TbCaixaRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\TbClosingRepository::class, \App\Repositories\TbClosingRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\PaymentTypeRepository::class, \App\Repositories\PaymentTypeRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\TbPaymentTypeRepository::class, \App\Repositories\TbPaymentTypeRepositoryEloquent::class);
        //:end-bindings:
    }
}
