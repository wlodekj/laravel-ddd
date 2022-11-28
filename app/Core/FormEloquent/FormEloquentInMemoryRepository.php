<?php

declare(strict_types=1);

namespace App\Core\FormEloquent;

use Ramsey\Uuid\UuidInterface;

class FormEloquentInMemoryRepository implements FormEloquentRepositoryInterface
{
    private array $forms = [];

    public function create(FormEloquent $form) : void
    {
        $this->forms[(string) $form->id()] = $form;
    }

    public function getById(UuidInterface $id) : FormEloquent
    {
        if (array_key_exists($id->toString(), $this->forms)) {
            return $this->forms[$id->toString()];
        }

        throw new \RuntimeException();
    }

}
