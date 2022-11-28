<?php

declare(strict_types=1);

namespace Tests\Unit\Core\Form;

use App\Core\Form\Form;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;

class FormTest extends TestCase
{
    public function test_form_creation()
    {
        $form = new Form(Uuid::uuid4(), 'test');

        self::assertEquals(false, $form->published());
    }

    public function test_form_publication()
    {
        $form = new Form(Uuid::uuid4(), 'test');
        $form->publish();

        self::assertEquals(true, $form->published());
    }
}
