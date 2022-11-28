<?php

declare(strict_types=1);

namespace App\Core\Form;

use Doctrine\ORM\EntityManagerInterface;
use Ramsey\Uuid\UuidInterface;

class FormORMRepository implements FormRepositoryInterface
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    public function create(Form $form) : void
    {
        $this->entityManager->persist($form);
        $this->entityManager->flush();
    }

    public function getById(UuidInterface $id) : Form
    {
        $item = $this->entityManager->getRepository(Form::class)->find($id);

        if (!($item instanceof Form)) {
            throw new \RuntimeException(sprintf('Form not found by id %s', $id));
        }

        return $item;
    }

}
