<?php

declare(strict_types=1);

namespace App\Providers;

use App\Core\Form\Jobs\CreateFormJob;
use App\Core\Form\Jobs\CreateFormJobHandler;
use App\Core\FormEloquent\Jobs\CreateFormEloquentJob;
use App\Core\FormEloquent\Jobs\CreateFormEloquentJobHandler;
use Illuminate\Bus\Dispatcher;
use Illuminate\Support\ServiceProvider;

class JobServiceProvider extends ServiceProvider
{
    /**
     * @param Dispatcher $dispatcher
     */
    public function boot(Dispatcher $dispatcher) : void
    {
        $dispatcher->map([
            CreateFormJob::class => CreateFormJobHandler::class,
            CreateFormEloquentJob::class => CreateFormEloquentJobHandler::class
        ]);
    }
}
