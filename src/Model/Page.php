<?php

namespace S1Ranjan\Pages\Model;

use Flarum\Database\AbstractModel;

class Page extends AbstractModel
{
    protected $table = 'pages';

    protected $fillable = [
        'title',
        'slug',
        'content',
        'blocks',
        'is_published'
    ];

    protected $casts = [
        'blocks' => 'array'
    ];
}
