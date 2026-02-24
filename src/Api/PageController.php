<?php

namespace S1Ranjan\ContentPages\Api;

use Illuminate\Support\Arr;
use Psr\Http\Message\ServerRequestInterface;
use Tobscure\JsonApi\Document;
use S1Ranjan\ContentPages\Page;

class PageController
{
    public function index(ServerRequestInterface $request, Document $document)
    {
        return Page::all();
    }

    public function store(ServerRequestInterface $request)
    {
        $data = Arr::get($request->getParsedBody(), 'data.attributes');

        return Page::create([
            'title' => $data['title'],
            'slug' => $data['slug'],
            'content' => $data['content']
        ]);
    }
}
