<?php

namespace S1Ranjan\Pages\Api;

use Laminas\Diactoros\Response\HtmlResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use S1Ranjan\Pages\PageRepository;

class PageController
{
    protected $pages;

    public function __construct(PageRepository $pages)
    {
        $this->pages = $pages;
    }

    public function __invoke(ServerRequestInterface $request): ResponseInterface
    {
        $slug = $request->getAttribute('slug');

        if (!$slug) {
            return new HtmlResponse('', 404);
        }

        $page = $this->pages->findBySlug($slug);

        if (!$page) {
            return new HtmlResponse('', 404);
        }

        return new HtmlResponse($page->content);
    }
}
