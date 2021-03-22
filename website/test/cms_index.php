<?php

require '../php/functions.php';

use PHPUnit\Framework\Testcase;

class StackTest extends Testcase
{
    public function testDisplayAboutMeTextSuccess()
    {
        $expected = '<p>test data</p>';
        $input = [['content' => 'test data']];
        $case = displayAboutMeText($input);
        $this->assertEquals($expected, $case);
    }

    public function testDisplayAboutMeTextFailure()
    {
        $expected = "";
        $input = [['thing'=>'words']];
        $case = displayAboutMeText($input);
        $this->assertEquals($expected, $case);
    }

    public function testDisplayAboutMeTextMalform()
    {
        $input = 'string';
        $this->expectException(TypeError::class);
        displayAboutMeText($input);
    }

    public function testDisplayAboutMeQuoteSuccess()
    {
        $expected = '<p class=\'contentEmphasisLine\'>test data<span class=\'contentQuote\'>"</span></p>';
        $input = [['content' => 'test data']];
        $case = displayAboutMeQuote($input);
        $this->assertEquals($expected, $case);
    }

    public function testDisplayAboutMeQuoteFailure()
    {
        $expected = "";
        $input = [['thing'=>'words']];
        $case = displayAboutMeQuote($input);
        $this->assertEquals($expected, $case);
    }

    public function testDisplayAboutMeQuoteMalform()
    {
        $input = 'string';
        $this->expectException(TypeError::class);
        displayAboutMeQuote($input);
    }

    public function testRemoveWhitespaceHTMLSuccess()
    {
        $expected = "string";
        $input = "  string  ";
        $case = removeWhitespaceHTML($input);
        $this->assertEquals($expected, $case);
    }

    public function testCheckTextExistsSuccess()
    {
        $expected = true;
        $input = "";
        $case = checkTextExists($input);
        $this->assertEquals($expected, $case);
    }

    public function testCheckTextExistsFailure()
    {
        $expected = false;
        $input = "string";
        $case = CheckTextExists($input);
        $this->assertEquals($expected, $case);
    }

    public function testCheckTextExistsMalform()
    {
        $input = ['thing'];
        $this->expectException(TypeError::class);
        CheckTextExists($input);
    }

    public function testAboutMeSuccessFalse()
    {
        $expected = "<p>Please add content of up to 400 characters</p>";
        $input = false;
        $case = aboutMeSuccess($input);
        $this->assertEquals($expected, $case);
    }

    public function testAboutMeSuccessTrue()
    {
        $expected = "<p>Your text has been added</p>";
        $input = true;
        $case = aboutMeSuccess($input);
        $this->assertEquals($expected, $case);
    }

    public function testAboutMeSuccessMalform()
    {
        $input = ['thing'];
        $this->expectException(TypeError::class);
        aboutMeSuccess($input);
    }

    public function testAboutMeTextDropdownSuccess()
    {
        $expected = "<option value=1>test data</option>";
        $input = [['id'=>1, 'content'=>'test data']];
        $case = AboutMeTextDropdown($input);
        $this->assertEquals($expected, $case);
    }

    public function testAboutMeTextDropdownFailure()
    {
        $expected = '<option value=></option>';
        $input = [['thing'=>'words']];
        $case = AboutMeTextDropdown($input);
        $this->assertEquals($expected, $case);
    }

    public function testAboutMeTextDropdownMalform()
    {
        $input = 'string';
        $this->expectException(TypeError::class);
        AboutMeTextDropdown($input);
    }

    public function testDisplayAboutTextToEditSuccess()
    {
        $expected = 'test data';
        $input = ['content'=>'test data'];
        $case = displayAboutTextToEdit($input);
        $this->assertEquals($expected, $case);
    }

    public function testDisplayAboutTextToEditFailure()
    {
        $expected = "";
        $input = [['thing'=>'words']];
        $case = displayAboutTextToEdit($input);
        $this->assertEquals($expected, $case);
    }

    public function testDisplayAboutTextToEditMalform()
    {
        $input = 'string';
        $this->expectException(TypeError::class);
        displayAboutTextToEdit($input);
    }

    public function testDisplaySubmitEditButtonSuccess()
    {
        $expected = '<input type="submit" value="Edit text">';
        $case = displaySubmitEditButton();
        $this->assertEquals($expected, $case);
    }

        public function testDeleteAboutMeSuccessFalse()
    {
        $expected = "<p>The content has been deleted</p>";
        $input = false;
        $case = deleteAboutMeSuccess($input);
        $this->assertEquals($expected, $case);
    }

    public function testDeleteAboutMeSuccessTrue()
    {
        $expected = "<p>The paragraph has been deleted</p>";
        $input = true;
        $case = deleteAboutMeSuccess($input);
        $this->assertEquals($expected, $case);
    }

    public function testdeleteAboutMeSuccessMalform()
    {
        $input = ['thing'];
        $this->expectException(TypeError::class);
        deleteAboutMeSuccess($input);
    }
}
?>