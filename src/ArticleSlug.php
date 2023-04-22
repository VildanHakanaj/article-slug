<?php

namespace VildanHakanaj;

class ArticleSlug
{

    private string $original;
    private string $slug;
    private string $postFix = "_";

    public function __construct(string $slug)
    {
        $this->original = $slug;
        $this->slug = $this->ignorePostFix($slug);
    }

    public function getPostFix(): string
    {
        return $this->postFix;
    }

    public function get(): string
    {
        return $this->slug;
    }

    public function setPostFix(string $postFix): ArticleSlug
    {
        $this->postFix = $postFix;
        return $this;
    }

    private function ignorePostFix(string $slug): string
    {
        $segments = explode($this->postFix, $slug, 2);
        return $segments[0];
    }

    public function getOriginalSlug(): string
    {
        return $this->original;
    }


}