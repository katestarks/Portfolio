<?php

require '../php/functions.php';

use PHPUnit\Framework\Testcase;

class StackTest extends Testcase
{
    public function testDisplayAboutMeTextSuccess () {
        $expected = 'test data';
        $aboutMeText = [['content'=>'test data']];
        $case = displayAboutMeText($aboutMeText);
        $this->assertEquals($expected, $case);
    }
    public function testDisplayAboutMeTextFailure () {
        $expected = "<p>Come back soon to find out more about me</p>";
        $aboutMeText = NULL;
        $case = displayAboutMeText($aboutMeText);
        $this->assertEquals ($expected, $case);
    }
    public function testDisplayAboutMeTextMalform () {
        $expected = "<p>Come back soon to find out more about me</p>";
        $aboutMeText = 'three';
        $case = displayAboutMeText($aboutMeText);
        $this->assertEquals($expected, $case);
    }
