<?php

namespace S1Ranjan\Pages\Middleware;

use Laminas\Diactoros\Response\HtmlResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Server\MiddlewareInterface;
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
        $response = $handler->handle($request);

        if ($response->getStatusCode() !== 404) {
            return $response;
        }

        $path = trim($request->getUri()->getPath(), '/');

        if (!$path) {
            return $response;
        }

        $page = $this->pages->findBySlug($path);

        if (!$page) {
            return $response;
        }

        return new HtmlResponse($page->content);
    }
}
