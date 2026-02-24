<?php

namespace S1Ranjan\Pages;

use Flarum\Database\AbstractModel;

class Page extends AbstractModel
{
    protected $table = 'pages';

    protected $fillable = [
        'title',
        'slug',
        'content'
    ];
}
