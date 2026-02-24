<?php

namespace S1Ranjan\Pages\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Server\MiddlewareInterface;
use Laminas\Diactoros\Response\HtmlResponse;
use S1Ranjan\Pages\PageRepository;

class ResolvePage implements MiddlewareInterface
{
    protected $pages;

    public function __construct(PageRepository $pages)
    {
        $this->pages = $pages;
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $path = trim($request->getUri()->getPath(), '/');

        if (!$path) {
            return $handler->handle($request);
        }

        $page = $this->pages->findBySlug($path);

        if (!$page) {
            return $handler->handle($request);
        }

        return new HtmlResponse($page->content);
    }
}
