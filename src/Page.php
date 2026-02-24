<?php

namespace S1Ranjan\ContentPages;

use Flarum\Database\AbstractModel;

class Page extends AbstractModel
{
    protected $table = 'content_pages';

    protected $fillable = [
        'title',
        'slug',
        'content'
    ];
}
