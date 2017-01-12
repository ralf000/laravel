<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $title
 * @property string $text
 */
class Page extends Model
{

    /**
     * @var array
     */
    protected $fillable = ['title', 'text'];
    

}
