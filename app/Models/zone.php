<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class zone extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function regions()
    {
        return $this->hasMany(Region::class);
    }
}
