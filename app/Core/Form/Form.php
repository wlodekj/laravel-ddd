<?php

namespace App\Core\Form;

use DateTimeImmutable;
use Ramsey\Uuid\UuidInterface;

class Form
{
    private UuidInterface $id;
    private DateTimeImmutable $createdAt;
    private DateTimeImmutable $updatedAt;
    private string $name;
    private bool $published;

    public function __construct(
        UuidInterface $id,
        string $name,
    ) {
        $this->id = $id;
        $this->createdAt = new DateTimeImmutable();
        $this->updatedAt = new DateTimeImmutable();
        $this->name = $name;
        $this->published = false;
    }

    public function id() : UuidInterface
    {
        return $this->id;
    }

    public function name() : string
    {
        return $this->name;
    }

    public function published() : bool
    {
        return $this->published;
    }

    public function publish()
    {
        $this->published = true;
        $this->updatedAt = new DateTimeImmutable();
    }
}
