<?php

namespace S1Ranjan\Pages\Middleware;

use Laminas\Diactoros\Response\HtmlResponse;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Server\MiddlewareInterface;
use S1Ranjan\Pages\Model\Page;

class ResolvePage implements MiddlewareInterface
{
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler)
    {
        $path = trim($request->getUri()->getPath(), '/');

        if ($this->isReserved($path)) {
            return $handler->handle($request);
        }

        $page = cache()->remember("page_".$path, 3600, function () use ($path) {
            return Page::where('slug', $path)->where('is_published', 1)->first();
        });

        if (!$page) {
            return $handler->handle($request);
        }

        return new HtmlResponse($page->content);
    }

    private function isReserved($slug)
    {
        $reserved = [
            '',
            'all',
            'following',
            'tags',
            'admin',
            'api',
            'login',
            'logout',
            'register',
            'd',
            't'
        ];

        return in_array($slug, $reserved);
    }
}
