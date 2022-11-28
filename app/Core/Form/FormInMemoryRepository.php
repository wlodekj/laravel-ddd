<?php

declare(strict_types=1);

namespace App\Core\Form;

use Ramsey\Uuid\UuidInterface;

class FormInMemoryRepository implements FormRepositoryInterface
{
    private array $forms = [];

    public function create(Form $form) : void
    {
        $this->forms[(string) $form->id()] = $form;
    }

    public function getById(UuidInterface $id) : Form
    {
        if (array_key_exists($id->toString(), $this->forms)) {
            return $this->forms[$id->toString()];
        }

        throw new \RuntimeException();
    }

}
