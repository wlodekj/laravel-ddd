<?php

namespace App\Core\Form\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Ramsey\Uuid\UuidInterface;

class CreateFormJob implements ShouldQueue
{
    use InteractsWithQueue, Queueable;

    private UuidInterface $id;
    private string $name;

    public function __construct(UuidInterface $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function id() : UuidInterface
    {
        return $this->id;
    }

    public function name() : string
    {
        return $this->name;
    }
}
