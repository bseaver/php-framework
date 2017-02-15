<?php
    require_once "src/Anagram.php";

    class AnagramTest extends PHPUnit_Framework_TestCase
    {
        function test_anagramFinder_blank_input()
        {
            // Arrange
            $new_anagram = new Anagram;
            $word = "";
            $possible_list = array();
            $expected_result = array();

            // Act
            $actual_result = $new_anagram->anagramFinder($word, $possible_list);

            //Assert
            $this->assertEquals($expected_result, $actual_result);
        }

        function test_anagramFinder_blank_word()
        {
            // Arrange
            $new_anagram = new Anagram;
            $word = "";
            $possible_list = array('tic', 'tac', 'toe');
            $expected_result = array();

            // Act
            $actual_result = $new_anagram->anagramFinder($word, $possible_list);

            //Assert
            $this->assertEquals($expected_result, $actual_result);
        }

        function test_anagramFinder_blank_possibleList()
        {
            // Arrange
            $new_anagram = new Anagram;
            $word = "cat";
            $possible_list = array();
            $expected_result = array();

            // Act
            $actual_result = $new_anagram->anagramFinder($word, $possible_list);

            //Assert
            $this->assertEquals($expected_result, $actual_result);
        }

        function test_anagramFinder_word_sameAs_possibility()
        {
            // Arrange
            $new_anagram = new Anagram;
            $word = "cat";
            $possible_list = array("cat");
            $expected_result = array();

            // Act
            $actual_result = $new_anagram->anagramFinder($word, $possible_list);

            //Assert
            $this->assertEquals($expected_result, $actual_result);
        }

        function test_anagramFinder_word_oneCorrectPossibility()
        {
            // Arrange
            $new_anagram = new Anagram;
            $word = "cat";
            $possible_list = array("tac");
            $expected_result = array("tac");

            // Act
            $actual_result = $new_anagram->anagramFinder($word, $possible_list);

            //Assert
            $this->assertEquals($expected_result, $actual_result);
        }

        function test_anagramFinder_word_multipleCorrectPossibility()
        {
            // Arrange
            $new_anagram = new Anagram;
            $word = "cat";
            $possible_list = array("tac", "tic", "toe", "act");
            $expected_result = array("tac", "act");

            // Act
            $actual_result = $new_anagram->anagramFinder($word, $possible_list);

            //Assert
            $this->assertEquals($expected_result, $actual_result);
        }








    }

?>
