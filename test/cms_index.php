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
        $expected = '<p>test data</p>';
        $aboutMeText = [['content' => 'test data']];
        $case = displayAboutMeText($aboutMeText);
        $this->assertEquals($expected, $case);
    }

    public function testDisplayAboutMeQuoteFailure()
    {
        $expected = "";
        $aboutMeText = [['thing'=>'words']];
        $case = displayAboutMeText($aboutMeText);
        $this->assertEquals($expected, $case);
    }

    public function testDisplayAboutMeQuoteMalform()
    {
        $aboutMeText = 'string';
        $this->expectException(TypeError::class);
        displayAboutMeText($aboutMeText);
    }
}
    ?>
