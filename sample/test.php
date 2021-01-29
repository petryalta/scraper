<?php
include '../vendor/autoload.php';

use scraper\PScraper;

$fileName = $argv[1];
$output = $argv[2];
echo "File: $fileName \n";
echo "Output: $output \n";

$scraper = new PScraper($fileName, $output);
$scraper->scrape();

echo "done \n";
