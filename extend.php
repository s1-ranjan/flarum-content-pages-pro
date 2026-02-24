<?php

namespace S1Ranjan\Pages;

use Flarum\Extend;
use S1Ranjan\Pages\Middleware\ResolvePage;

return [

    (new Extend\Routes('api'))
        ->get('/pages', 'pages.index', Api\Controller\ListPagesController::class)
        ->post('/pages', 'pages.create', Api\Controller\CreatePageController::class)
        ->patch('/pages/{id}', 'pages.update', Api\Controller\UpdatePageController::class)
        ->delete('/pages/{id}', 'pages.delete', Api\Controller\DeletePageController::class),

    (new Extend\Frontend('admin'))
        ->js(__DIR__.'/js/dist/admin.js'),

    (new Extend\Frontend('forum'))
        ->js(__DIR__.'/js/dist/forum.js'),

    (new Extend\Middleware('forum'))
        ->add(ResolvePage::class)

];
