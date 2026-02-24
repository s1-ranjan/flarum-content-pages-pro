<?php

namespace S1Ranjan\ContentPages;

use Flarum\Extend;
use S1Ranjan\ContentPages\Api\PageController;
use S1Ranjan\ContentPages\Middleware\ResolvePage;

return [

    (new Extend\Routes('api'))
        ->get('/content-pages', 'content.pages.index', PageController::class.'@index')
        ->post('/content-pages', 'content.pages.store', PageController::class.'@store'),

    (new Extend\Middleware('forum'))
        ->add(ResolvePage::class),

];
