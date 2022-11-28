<?php

declare(strict_types=1);

namespace App\Core\FormEloquent\Query;

use App\Core\FormEloquent\Query\Model\FormEloquent;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\UuidInterface;

class LaravelDBFormQuery implements FormEloquentQueryInterface
{
    public function getById(UuidInterface $id) : FormEloquent
    {
        $result = DB::table('forms_eloquent')
            ->select('*')
            ->where('id', '=', (string) $id)
            ->get();

        if (!$result->containsOneItem()) {
            throw new \RuntimeException('Not found form by ID:' . (string) $id);
        }

        return new FormEloquent(
            $result->first()->id,
            $result->first()->name
        );
    }

}
