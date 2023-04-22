<?php

namespace VildanHakanaj;

class ArticleSlug
{

    private string $original;
    private string $slug;
    private string $postFix;

    public function __construct(string $slug, $postFix = "_")
    {
        $this->postFix = $postFix;
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

    private function ignorePostFix(string $slug): string
    {
        $segments = $this->getSegments($slug);
        return $segments[0];
    }

    public function getOriginalSlug(): string
    {
        return $this->original;
    }

    public static function fromPath($path, $postFix = "_"): ArticleSlug
    {
        $pathSegments = explode('/', $path);
        return new self(end($pathSegments), $postFix);
    }

    public function getPostFixSegment()
    {
        $segments = $this->getSegments($this->original);
        return end($segments);
    }

    private function getSegments(string $slug): array
    {
        return explode($this->postFix, $slug, 2);
    }

    public function __toString(): string
    {
        return $this->slug;
    }

}