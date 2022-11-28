<?php

namespace App\Providers;

use App\Core\Form\FormInMemoryRepository;
use App\Core\Form\FormRepositoryInterface;
use App\Core\FormEloquent\FormEloquentRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppTestServiceProvider extends ServiceProvider
{
    public $bindings = [
        // Form
        FormRepositoryInterface::class => FormInMemoryRepository::class,
        FormEloquentRepositoryInterface::class => FormInMemoryRepository::class
    ];

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
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
}
