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

    /**
     * Связываем модель Page с моделью User
     * Чтобы получать связанные модели user
     * Можно использовать Page::find(5)->user;
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){
        return $this->belongsTo('App\User');
    }

}
