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
    public function it_can_create_the_article_slug_when_given_the_slug()
    {
        $this->assertSame($this->slug, $this->articleSlug->get());
    }

    /** @test */
    public function it_has_a_default_postfix()
    {
        $this->assertSame('_', $this->articleSlug->getPostFix());
    }

    /** @test */
    public function it_can_override_the_postfix()
    {
        $this->assertSame('!!', (new ArticleSlug($this->slug, "!!"))->getPostFix());
    }

    /** @test */
    public function it_can_separate_the_slug_from_post_fix()
    {
        $slug = (new ArticleSlug("this-is-the-slug_ignore_this_part"))->get();
        $this->assertSame("this-is-the-slug", $slug);

        $slug = (new ArticleSlug("this-is-the-slug--ignore_this_part", "--"))->get();
        $this->assertSame("this-is-the-slug", $slug);
    }

    /** @test */
    public function it_stores_original_slug_before_the_postfix_is_ignored()
    {
        $articleSlug = new ArticleSlug($this->slug . '_ignore_this_part');
        $this->assertSame($this->slug . '_ignore_this_part', $articleSlug->getOriginalSlug());
    }

    /** @test */
    public function it_can_create_and_parse_slug_from_given_path()
    {
        $url = "https://domain.test/category/subcategory/this-is-the-slug-part_ignore_this_part";
        $this->assertSame('this-is-the-slug-part', (ArticleSlug::fromPath($url)->get()));
    }

    /** @test */
    public function it_can_get_the_postfix_segment()
    {
        $this->assertSame("fetch_only_this_part", (new ArticleSlug("this-is-the-slug_fetch_only_this_part"))->getPostFixSegment());
    }

    /** @test */
    public function it_can_be_used_as_a_string()
    {
        $this->assertSame("this-is-a-slug-used-as-a-string", "{$this->articleSlug}-used-as-a-string");
    }


}
