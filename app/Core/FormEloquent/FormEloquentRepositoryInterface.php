<?php

namespace App\Core\FormEloquent;

use App\Core\FormEloquent\FormEloquent;
use Ramsey\Uuid\UuidInterface;

interface FormEloquentRepositoryInterface
{
    public function create(FormEloquent $form) : void;

    public function getById(UuidInterface $id) : FormEloquent;
}
