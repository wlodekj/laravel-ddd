<?php

namespace App\Core\Form\Query;

use App\Core\Form\Query\Model\Form;
use Ramsey\Uuid\UuidInterface;

interface FormQueryInterface
{
    public function getById(UuidInterface $id) : Form;
}
