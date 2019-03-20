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

    public function testDisplayAboutTextToEditSuccess()
    {
        $expected = 'test data';
        $aboutTextToEdit = [['id'=>1, 'content'=>'test data']];
        $case = displayAboutTextToEdit($aboutTextToEdit);
        $this->assertEquals($expected, $case);
    }

    public function testDisplayAboutTextToEditFailure()
    {
        $expected = "";
        $aboutTextToEdit = [['thing'=>'words']];
        $case = displayAboutTextToEdit($aboutTextToEdit);
        $this->assertEquals($expected, $case);
    }

    public function testDisplayAboutTextToEditMalform()
    {
        $aboutTextToEdit = 'string';
        $this->expectException(TypeError::class);
        displayAboutTextToEdit($aboutTextToEdit);
    }

    public function testDisplaySubmitEditButtonSuccess()
    {
        $expected = '<input type="submit" value="Edit text">';
        $case = displaySubmitEditButton();
        $this->assertEquals($expected, $case);
    }

    public function testEditAboutMeSuccessSuccess()
    {
        $expected = "<p>Your content has been updated</p>";
        $updateAboutMeQuoteAndText = true;
        $case = editAboutMeSuccess($updateAboutMeQuoteAndText);
        $this->assertEquals($expected, $case);
    }

    public function testEditAboutMeSuccessFailure()
    {
        $expected = "<p>There has been an error</p>";
        $updateAboutMeQuoteAndText = false;
        $case = editAboutMeSuccess($updateAboutMeQuoteAndText);
        $this->assertEquals($expected, $case);
    }

    public function testEditAboutMeSuccessMalform()
    {
        $aboutTextToEdit = 'string';
        $this->expectException(TypeError::class);
        displayAboutTextToEdit($aboutTextToEdit);
    }
}
    ?>
