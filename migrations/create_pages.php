<?php

use Illuminate\Database\Schema\Blueprint;

return [
    'up' => function ($schema) {
        if (!$schema->hasTable('pages')) {
            $schema->create('pages', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->string('slug')->unique();
                $table->longText('content');
                $table->timestamps();
            });
        }
    },

    'down' => function ($schema) {
        $schema->dropIfExists('pages');
    }
];
