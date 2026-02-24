<?php

namespace S1Ranjan\Pages;

class PageRepository
{
    public function findBySlug($slug)
    {
        return Page::where('slug', $slug)->first();
    }
}
