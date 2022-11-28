<?php

namespace App\Core\Form;

use Ramsey\Uuid\UuidInterface;

interface FormRepositoryInterface
{
    public function create(Form $form) : void;

    public function getById(UuidInterface $id) : Form;
}
