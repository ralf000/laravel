<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $table = 'portfolio';

    public function filter()
    {
        return $this->belongsTo(Filter::class);
    }
}
