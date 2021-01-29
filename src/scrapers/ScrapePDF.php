<?php

namespace scraper\scrapers;

use Spatie\PdfToImage\Pdf;

class ScrapePDF implements IScrape
{
    /**
     * @inheritDoc
     */
    public function scrape(string $fileName, string $output)
    {
        $pdf = new Pdf($fileName);
        $pdf->saveAllPagesAsImages($output);

    }
}