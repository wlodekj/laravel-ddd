<?php

namespace App\Core\FormEloquent\Jobs;

use App\Core\FormEloquent\FormEloquent;
use App\Core\FormEloquent\FormEloquentRepositoryInterface;

class CreateFormEloquentJobHandler
{

    public function __construct(private FormEloquentRepositoryInterface $formRepository)
    {
    }

    public function handle(CreateFormEloquentJob $job) : void
    {
        $form = FormEloquent::create($job->id(), $job->name());
        $this->formRepository->create($form);
    }
}
