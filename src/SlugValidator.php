<?php

namespace S1Ranjan\Pages;

class SlugValidator
{
    protected $reserved = [
        'all',
        'following',
        'tags',
        'd',
        't',
        'admin',
        'api'
    ];

    public function validate($slug)
    {
        if (in_array($slug, $this->reserved)) {
            throw new \Exception("Slug reserved by Flarum.");
        }
    }
}
