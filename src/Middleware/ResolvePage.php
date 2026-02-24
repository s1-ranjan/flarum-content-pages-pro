<?php

namespace S1Ranjan\Pages\Middleware;

use Laminas\Diactoros\Response\HtmlResponse;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Server\MiddlewareInterface;
use S1Ranjan\Pages\PageRepository;

class ResolvePage implements MiddlewareInterface
{
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler)
    {
        $path = trim($request->getUri()->getPath(), '/');

        if ($path === '' || str_starts_with($path, 't/') || str_starts_with($path, 'd/')) {
            return $handler->handle($request);
        }

        $page = resolve(PageRepository::class)->findBySlug($path);

        if (!$page) {
            return $handler->handle($request);
        }

        return new HtmlResponse($page->content);
    }
}
