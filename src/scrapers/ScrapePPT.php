<?php

namespace scraper\scrapers;

use NcJoes\OfficeConverter\OfficeConverter;

class ScrapePPT implements IScrape
{
    public function scrape(string $fileName, string $output)
    {
        $convertor = new OfficeConverter($fileName);
        $pdfFile = $output.'/out.pdf';
        $convertor->convertTo($pdfFile);

        (new ScrapePDF())->scrape($pdfFile, $output);
        unlink($pdfFile);
    }
}