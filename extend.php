<?php

namespace S1Ranjan\Pages;

use Flarum\Extend;
use S1Ranjan\Pages\Middleware\ResolvePage;

return [

    (new Extend\Middleware('forum'))
        ->add(ResolvePage::class),

];
