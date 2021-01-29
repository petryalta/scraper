<?php

namespace scraper\scrapers;

use PhpOffice\PhpPresentation\IOFactory;
use PhpOffice\PhpPresentation\PhpPresentation;

class ScrapePPT implements IScrape
{
    public function scrape(string $fileName, string $output)
    {
        $ppt = new PhpPresentation();
        $slide = $ppt->getSlide();
    }
}