<?php

declare(strict_types=1);

namespace App\Core\FormEloquent;

use Ramsey\Uuid\UuidInterface;

class FormEloquentRepository implements FormEloquentRepositoryInterface
{
    public function create(FormEloquent $form) : void
    {
        $form->save();
    }

    public function getById(UuidInterface $id) : FormEloquent
    {
        $item = FormEloquent::where('id', $id)->first();

        if (!($item instanceof FormEloquent)) {
            throw new \RuntimeException(sprintf('Form eloquent not found by id %s', $id));
        }

        return $item;
    }
}
