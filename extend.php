<?php

namespace S1Ranjan\Pages;

use Flarum\Extend;
use S1Ranjan\Pages\Api\PageController;

return [

    (new Extend\Content)
        ->route('/{slug}')
        ->action(PageController::class),

];
