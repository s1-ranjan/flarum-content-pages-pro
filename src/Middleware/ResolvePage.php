<?php

namespace S1Ranjan\ContentPages\Middleware;

use Psr\Http\Message\ServerRequestInterface as Request;
use Laminas\Diactoros\Response\HtmlResponse;
use Psr\Http\Server\RequestHandlerInterface as Handler;
use S1Ranjan\ContentPages\Page;

class ResolvePage
{
    public function process(Request $request, Handler $handler)
    {
        $path = trim($request->getUri()->getPath(), '/');

        if (!$path) {
            return $handler->handle($request);
        }

        $page = Page::where('slug', $path)->first();

        if (!$page) {
            return $handler->handle($request);
        }

        return new HtmlResponse(
            "<div style='max-width:900px;margin:40px auto'>
            <h1>{$page->title}</h1>
            {$page->content}
            </div>"
        );
    }
}
