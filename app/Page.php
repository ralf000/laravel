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
     * Определяем типы данных свойств модели
     * Если указан array то при сохранении
     * это свойство будет автоматом сериализовываться
     * @var array
     */
//    protected $casts = [
//        'title' => 'string',
//        'text' => 'array'
//    ];

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
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Методы преобразователи
     * @param $value
     * @return string
     */
//    public function getTitleAttribute($value)
//    {
//        return 'hello world - ' . $value . ' - hello world';
//    }

    /**
     * Методы преобразователи
     * @param $value
     */
//    public function setTitleAttribute($value)
//    {
//        $this->attributes['title'] = " | $value | ";
//    }

}
