<?php
    class Anagram
    {
        function anagramFinder ($word, $possible_anagrams)
        {
            $result = array();

            if (!$word || count($possible_anagrams) == 0) {
                return $result;
            }

            foreach ($possible_anagrams as $possible_anagram) {
                if ($word !== $possible_anagram) {
                    $wordls = str_split($word);
                    $possls = str_split($possible_anagram);
                    $inter = array_intersect($wordls, $possls);
                    if ($inter === $wordls) {
                        array_push($result, $possible_anagram);
                    }
                }
            }

            return $result;
        }
    }

?>
