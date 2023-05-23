<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portf extends Model
{
    use HasFactory;

    protected $guarded = ['slug', 'date_of_start'];

    public function type()
    {

        return $this->belongsTo(Type::class);
    }
}
