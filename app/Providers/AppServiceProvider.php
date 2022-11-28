<?php

namespace App\Providers;

use App\Core\Form\FormORMRepository;
use App\Core\Form\FormRepositoryInterface;
use App\Core\Form\Query\DbalFormQuery;
use App\Core\Form\Query\FormQueryInterface;
use App\Core\FormEloquent\FormEloquentRepository;
use App\Core\FormEloquent\FormEloquentRepositoryInterface;
use App\Core\FormEloquent\Query\FormEloquentQueryInterface;
use App\Core\FormEloquent\Query\LaravelDBFormQuery;
use Doctrine\DBAL\Driver\Connection;
use Doctrine\DBAL\DriverManager;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public $bindings = [
        // Form
        FormQueryInterface::class => DbalFormQuery::class,
        FormRepositoryInterface::class => FormORMRepository::class,
        FormEloquentQueryInterface::class => LaravelDBFormQuery::class,
        FormEloquentRepositoryInterface::class => FormEloquentRepository::class
    ];

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Connection::class, function () {
            return DriverManager::getConnection(
                [
                    'dbname' => env('DB_DATABASE'),
                    'user' => env('DB_USERNAME'),
                    'password' => env('DB_PASSWORD'),
                    'host' => env('DB_HOST'),
                    'driver' => 'pdo_mysql',
                ]
            );
        });

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
