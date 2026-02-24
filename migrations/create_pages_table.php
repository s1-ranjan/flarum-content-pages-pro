<?php

use Illuminate\Database\Schema\Blueprint;

return [
    'up' => function ($schema) {
        $schema->create('content_pages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('content');
            $table->timestamps();
        });
    },

    'down' => function ($schema) {
        $schema->dropIfExists('content_pages');
    }
];
