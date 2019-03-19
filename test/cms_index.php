<?php

require '../php/functions.php';

use PHPUnit\Framework\Testcase;

class StackTest extends Testcase
{
    public function testDisplayAboutMeTextSuccess()
    {
        $expected = '<p>test data</p>';
        $aboutMeText = [['content' => 'test data']];
        $case = displayAboutMeText($aboutMeText);
        $this->assertEquals($expected, $case);
    }

    public function testDisplayAboutMeTextFailure()
    {
        $expected = "";
        $aboutMeText = [['thing'=>'words']];
        $case = displayAboutMeText($aboutMeText);
        $this->assertEquals($expected, $case);
    }

    public function testDisplayAboutMeTextMalform()
    {
        $aboutMeText = 'string';
        $this->expectException(TypeError::class);
        displayAboutMeText($aboutMeText);
    }

    public function testDisplayAboutMeQuoteSuccess()
    {
        $expected = '<p class=\'contentEmphasisLine\'>test data<span class=\'contentQuote\'>"</span></p>';
        $aboutMeQuote = [['content' => 'test data']];
        $case = displayAboutMeQuote($aboutMeQuote);
        $this->assertEquals($expected, $case);
    }

    public function testDisplayAboutMeQuoteFailure()
    {
        $expected = "";
        $aboutMeQuote = [['thing'=>'words']];
        $case = displayAboutMeQuote($aboutMeQuote);
        $this->assertEquals($expected, $case);
    }

    public function testDisplayAboutMeQuoteMalform()
    {
        $aboutMeQuote = 'string';
        $this->expectException(TypeError::class);
        displayAboutMeQuote($aboutMeQuote);
    }

//    public function testEditAboutMeTextAndQuoteSuccess()
//    {
//        $expected = "<option value=1>'test data'</option>";
//        $aboutMeTextAndQuote = [];
//        $aboutMeTextAndQuote['id'] = '1';
//        $aboutMeTextAndQuote['content'] = 'test data';
//        $array[0] = $aboutMeTextAndQuote;
//        $case = editAboutMeTextAndQuote($aboutMeTextAndQuote);
//        $this->assertEquals($expected, $case);
//    }

    public function testEditAboutMeTextAndQuoteSuccess()
    {
        $expected = "<option value=1>test data</option>";
        $aboutMeTextAndQuote = [['id'=>1, 'content'=>'test data']];
        $case = editAboutMeTextAndQuote($aboutMeTextAndQuote);
        $this->assertEquals($expected, $case);
    }

    public function testEditAboutMeTextAndQuoteFailure()
    {
        $expected = '<option value=></option>';
        $aboutMeTextAndQuote = [['thing'=>'words']];
        $case = editAboutMeTextAndQuote($aboutMeTextAndQuote);
        $this->assertEquals($expected, $case);
    }

    public function testEditAboutMeTextAndQuoteMalform()
    {
        $aboutMeTextAndQuote = 'string';
        $this->expectException(TypeError::class);
        editAboutMeTextAndQuote($aboutMeTextAndQuote);
    }
}
    ?>
