<?php

namespace App\Core\FormEloquent\Query;

use App\Core\FormEloquent\Query\Model\FormEloquent;
use Ramsey\Uuid\UuidInterface;

interface FormEloquentQueryInterface
{
    public function getById(UuidInterface $id) : FormEloquent;
}
