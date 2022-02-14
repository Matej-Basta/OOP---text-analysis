<?php

class Text
{
    public $text = null;

    public function __construct($text)
    {
        $this->text = $text;
    }

    public function getLength()
    {
        return strlen($this->text);
    }

    public function getNrOfWords()
    {
        return str_word_count($this->text, 0);
    }

    public function getNrOfSentences()
    {
        return preg_match_all('/[^\s](\.|\!|\?)(?!\w)/', $this->text, $match);
    }

    public function getNrOfParagraphs()
    {
        return substr_count($this->text, "\n") + 1;
    }

    public function getMostCommonWords()
    {
        $numberOfWords = str_word_count($this->text, 1);
        $frequency = array_count_values($numberOfWords);
        arsort($frequency);
        return array_search(reset($frequency), $frequency);

    }
}


$textContent = file_get_contents('book.txt');

$text = new Text("$textContent");

echo $text->text;
echo "<br>";
echo "<br>";
echo $text->getLength();
echo "<br>";
echo "<br>";
echo $text->getNrOfWords();
echo "<br>";
echo "<br>";
echo $text->getNrOfSentences();
echo "<br>";
echo "<br>";
echo $text->getNrOfParagraphs();
echo "<br>";
echo "<br>";
echo $text->getMostCommonWords();