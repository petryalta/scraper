<?php

namespace scraper\scrapers;

use NcJoes\OfficeConverter\OfficeConverter;

class ScrapePPT implements IScrape
{
    public function scrape(string $fileName, string $output)
    {
        $convertor = new OfficeConverter($fileName);

        $convertor->convertTo('out.pdf');
        $inDir = pathinfo($fileName, PATHINFO_DIRNAME);
        $pdfFile = $inDir.'/out.pdf';

        (new ScrapePDF())->scrape($pdfFile, $output);
        unlink($pdfFile);
    }
}