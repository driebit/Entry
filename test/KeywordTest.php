<?php
/**
 * @file
 */

namespace CultuurNet\Entry;

class KeywordTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function it_requires_a_string_value()
    {
        $this->setExpectedException('\\InvalidArgumentException');
        $keyword = new Keyword(false);
    }

    /**
     * @test
     */
    public function it_does_not_allow_semicolons()
    {
        $this->setExpectedException('\\InvalidArgumentException');
        $keyword = new Keyword('something with a ; semicolon');
    }

    /**
     * @test
     */
    public function it_needs_to_be_at_least_one_character_long()
    {
        $this->setExpectedException('\\InvalidArgumentException');
        $keyword = new Keyword('');
    }

    /**
     * @test
     */
    public function it_can_be_cast_to_a_string()
    {
        $keyword = new Keyword('International');
        $value = (string)$keyword;

        $this->assertEquals('International', $keyword);
    }

    /**
     * @test
     */
    public function it_can_be_serialized_to_a_json_string()
    {
        $keyword = new Keyword('International');
        $serializedKeyword = json_encode($keyword);
        $this->assertEquals('"International"', $serializedKeyword);
    }
} 
