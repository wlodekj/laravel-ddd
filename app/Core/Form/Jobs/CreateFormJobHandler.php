<?php

namespace App\Core\Form\Jobs;

use App\Core\Form\Form;
use App\Core\Form\FormRepositoryInterface;

class CreateFormJobHandler
{

    public function __construct(private FormRepositoryInterface $formRepository)
    {
    }

    public function handle(CreateFormJob $job) : void
    {

//        Eloquent way
//        $form = new FormEloquent();
//        $form->id = $job->id()->toString();
//        $form->name = $job->name();
//        $form->published = false;
//        $this->formRepository->create($form);

        $form = new Form($job->id(), $job->name());
        $this->formRepository->create($form);
    }
}
