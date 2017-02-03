<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filter extends Model
{
    public function portfolio()
    {
        return $this->hasMany(Portfolio::class);
    }
}
