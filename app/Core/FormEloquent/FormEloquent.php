<?php

namespace App\Core\FormEloquent;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\UuidInterface;

class FormEloquent extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $table = 'forms_eloquent';

    protected $keyType = 'string';

    protected $fillable = ['name', 'published'];

    public function publish()
    {
        $this->published = true;
    }

    public function id() : UuidInterface
    {
        return $this->id;
    }

    public function published() : bool
    {
        return $this->published;
    }

    public static function create(
        UuidInterface $id,
        string $name
    ) : self {
        $obj = new self();
        $obj->id = $id;
        $obj->name = $name;
        $obj->published = false;

        return $obj;
    }
}
