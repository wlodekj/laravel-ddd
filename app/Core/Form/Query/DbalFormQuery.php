<?php

declare(strict_types=1);

namespace App\Core\Form\Query;

use App\Core\Form\Query\Model\Form;
use Doctrine\DBAL\Driver\Connection;
use Ramsey\Uuid\UuidInterface;

class DbalFormQuery implements FormQueryInterface
{
    public function __construct(private Connection $connection)
    {
    }

    public function getById(UuidInterface $id) : Form
    {
        $queryBuilder = $this->connection->createQueryBuilder();
        $queryBuilder
            ->select('*')
            ->from('forms', 'f')
            ->where('id = :id')
            ->setParameter('id', $id);

        $result = $this->connection->fetchAssociative(
            $queryBuilder->getSQL(),
            $queryBuilder->getParameters(),
            $queryBuilder->getParameterTypes()
        );

        if (!$result) {
            throw new \RuntimeException(sprintf('Form "%s" not found', $id));
        }

        return $this->hydrate($result);

    }

    private function hydrate(array $data) : Form
    {
        return new Form(
            $data['id'],
            $data['name']
        );
    }
}
