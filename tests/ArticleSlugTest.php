<?php

namespace VildanHakanaj\Tests;
use PHPUnit\Framework\TestCase;
use VildanHakanaj\ArticleSlug;

class ArticleSlugTest extends TestCase
{
    private string $slug = "this-is-a-slug";
    private ArticleSlug $articleSlug;

    public function __construct(string $name)
    {
        parent::__construct($name);
        $this->articleSlug = new ArticleSlug($this->slug);
    }

    /** @test */
    public function it_can_create_the_article_slug_when_given_the_slug(){
        $this->assertSame($this->slug, $this->articleSlug->get());
    }

    /** @test */
    public function it_has_a_default_postfix(){
        $this->assertSame('!!', $this->articleSlug->getPostFix());
    }
    public function it_can_override_the_postfix(){
        $this->articleSlug->setPostFix('!!');
        $this->assertSame('!!', $this->articleSlug->getPostFix());
    }

}
