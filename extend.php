<?php

namespace S1Ranjan\Pages;

use Flarum\Extend;
use S1Ranjan\Pages\Middleware\ResolvePage;

return [
    (new Extend\Frontend('forum'))
        ->route('/{slug}', 's1ranjan.pages'),

    (new Extend\Middleware('forum'))
        ->add(ResolvePage::class),
];
