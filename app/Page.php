<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property string $title
 * @property string $text
 */
class Page extends Model
{
    use SoftDeletes;

    /**
     * @var array
     */
    protected $fillable = ['title', 'text'];
    /**
     * @var array
     */
    protected $dates = ['deleted_at'];
    

}
