<?php

declare(strict_types=1);

namespace Tests\Unit\Core\FormEloquent;

use App\Core\FormEloquent\FormEloquent;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;

class FormEloquentTest extends TestCase
{
    public function test_form_creation()
    {
        $form = FormEloquent::create($id = Uuid::uuid4(),'test');

        self::assertEquals(false, $form->published());
        self::assertEquals($id, $form->id());
    }

    public function test_form_publication()
    {
        $form = FormEloquent::create(Uuid::uuid4(),'test');
        $form->publish();

        self::assertEquals(true, $form->published());
    }
}


