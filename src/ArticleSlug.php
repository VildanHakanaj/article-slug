<?php

namespace VildanHakanaj;

class ArticleSlug
{

    private string $slug;

    private string $postFix = "_";

    public function __construct(string $slug){
        $this->slug = $slug;
    }

    public function getPostFix(): string
    {
        return $this->postFix;
    }

    public function get(): string
    {
        return $this->slug;
    }

}