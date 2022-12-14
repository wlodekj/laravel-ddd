<?php

declare(strict_types=1);

namespace App\Core\FormEloquent\Query\Model;

class FormEloquent
{
    public function __construct(private string $id, private string $name)
    {
    }

    public function id() : string
    {
        return $this->id;
    }

    public function name() : string
    {
        return $this->name;
    }
}
