<?php

namespace scraper\scrapers;

interface IScrape
{
    /**
     * @param string $fileName Input file name
     * @param string $output   Output path
     *
     * @return mixed
     */
    public function scrape(string $fileName, string $output);
}