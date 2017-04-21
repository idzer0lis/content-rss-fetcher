<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once ('./shared/blogReader.php');

/*$involvery = new blogReader('http://involvery.com/');

$product = $involvery->filterContent('<div class="col-md-4 col-sm-6 col-xs-12 pt-cv-content-item pt-cv-1-col"', '<\/div><\/div><\/div>');*/

//var_dump($product);


$urlParam = explode('/',$_SERVER['REQUEST_URI']);

//Get content from the original site
//$involvery = new blogReader('http://involvery.com/' . $urlParam[1]);

$involvery = new blogReader('http://involvery.com/' . 'thoughtful-hostess-gifts-affordable-unique-hostess-gift-ideas/');

$product = $involvery->getCssLinks('http://involvery.com/' . 'thoughtful-hostess-gifts-affordable-unique-hostess-gift-ideas/');

//$article = $involvery->filterContent('<article id="', 'article>');

var_dump($product);
