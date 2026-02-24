<?php

namespace S1Ranjan\Pages;

use Flarum\Extend;
use S1Ranjan\Pages\Middleware\ResolvePage;

return [

    (new Extend\Frontend('admin'))
        ->js(__DIR__.'/js/dist/admin.js'),

    (new Extend\Frontend('forum'))
        ->js(__DIR__.'/js/dist/forum.js'),

    (new Extend\Middleware('forum'))
        ->add(ResolvePage::class),

    (new Extend\Routes('api'))
        ->get('/pages', 'pages.index', Api\PageController::class)
        ->post('/pages', 'pages.create', Api\PageController::class)

];
