<?php

require_once dirname(__FILE__) . '/../Wrapper.php';

class WrapperTest extends PHPUnit_Framework_TestCase {

	private $wrapper;
	
	function setUp() {
		$this->wrapper = new Wrapper();
	}

	function testItEmpty() {
		$this->assertEquals('', $this->wrapper->wrap('', 0));
	}
	
	function testItDoesNotWrapAShortEnoughWord() {
		$textToBeParsed = 'word';
		$maxLineLength = 5;
		$this->assertEquals('word', $this->wrapper->wrap($textToBeParsed, $maxLineLength));
	}
	
	function testItWrapsAWordLongerThanLineLength() {
		$textToBeParsed = 'alongword';
		$maxLineLength = 5;
		$this->assertEquals("along\nword", $this->wrapper->wrap($textToBeParsed, $maxLineLength));
	}
	
	function testItWrapsAWordServeralTimesIfItsTooLong() {
		$textToBeParsed = 'averyverylongword';
		$maxLineLength = 5;
		$this->assertEquals("avery\nveryl\nongwo\nrd", $this->wrapper->wrap($textToBeParsed, $maxLineLength));
	}
	
	function testItWrapsTwoWordsWhenSpaceAtTheEndOfLine() {
		$textToBeParsed = 'word word';
		$maxLineLength = 5;
		$this->assertEquals("word\nword", $this->wrapper->wrap($textToBeParsed, $maxLineLength));
	}
	
	function testItWrapsTwoWordsWhenLineEndIsAfterFirstWord() {
		$textToBeParsed = 'word word';
		$maxLineLength = 7;
		$this->assertEquals("word\nword", $this->wrapper->wrap($textToBeParsed, $maxLineLength));
	}
	
	function testItWraps3WordsOn2Lines() {
		$textToBeParsed = 'word word word';
		$maxLineLength = 12;
		$this->assertEquals("word word\nword", $this->wrapper->wrap($textToBeParsed, $maxLineLength));
	}
	
	function testItWraps2WordsOn3Lines() {
		$textToBeParsed = 'word word';
		$maxLineLength = 3;
		$this->assertEquals("wor\nd\nwor\nd", $this->wrapper->wrap($textToBeParsed, $maxLineLength));
	}
	
	function testItWraps2WordsAtBoundry() {
		$textToBeParsed = 'word word';
		$maxLineLength = 4;
		$this->assertEquals("word\nword", $this->wrapper->wrap($textToBeParsed, $maxLineLength));
	}


}

?>