<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__.'/../vendor/autoload.php';
    require_once __DIR__.'/../src/Anagram.php';


    $app = new Silex\Application();
    $app['debug'] = true;

    $app->register(
        new Silex\Provider\TwigServiceProvider(),
        array('twig.path' => __DIR__.'/../views')
    );

    $app->get('/', function() use ($app) {
        $target_word_key = "target_word";
        $possible_anagrams_key = "possible_anagrams";
        $actual_anagrams = "";
        $target_word = "";
        $actual_anagrams = "";
        $possible_anagrams = "";

        if (array_key_exists($target_word_key, $_GET) && array_key_exists($possible_anagrams_key, $_GET)) {
            $target_word = $_GET["target_word"];
            $possible_anagrams = $_GET["possible_anagrams"];
            $possible_anagrams_array = explode(" ", $possible_anagrams);
            $my_anagram = new Anagram;
            $actual_result = $my_anagram->anagramFinder($target_word, $possible_anagrams_array);
            $actual_anagrams = implode(" ", $actual_result);
        }


        return $app['twig']->render(
            'anagram.html.twig',
            array(
                "actual_anagrams" => $actual_anagrams,
                "target_word" => $target_word,
                "possible_anagrams" => $possible_anagrams
            )
        );
    });

    return $app;
?>
