<?php

namespace scraper;
/**
 * Class PScraper
 * presentation scraper
 *
 * @author  Petr Ivanov (petr.yrs@gmail.com)
 * @package pivanov\scraper
 */

use scraper\exceptions\UnsupportedException;
use scraper\scrapers\ScrapePDF;
use scraper\scrapers\ScrapePPT;

class PScraper
{
    /**
     * Входной файл PDF
     */
    const FTYPE_PDF = 1;
    /**
     * Входной файл PowerPoint
     */
    const FTYPE_PPT = 2;
    /**
     * @var string путь к изображениям
     */
    public  $outputPath = '';
    /**
     * @var string название входного файла
     */
    private $fileName;

    public function __construct($inFile, $outPath)
    {
            if (!file_exists($inFile)) {
                throw new \Exception("$inFile file not found");
            }
            $this->fileName = $inFile;
            $this->outputPath = $outPath;
    }


    /**
     * Опеределение типа файла
     * @return int
     * @throws Unsupported
     */
    protected function detectFileType(){
        $ext = pathinfo($this->fileName, PATHINFO_EXTENSION);
        if (empty($ext)) {
            throw new UnsupportedException('Cannot detect file type');
        }
        $ext = strtolower($ext);

        if ($ext == 'pdf') {
            return self::FTYPE_PDF;
        } elseif (in_array($ext, ['ppt', 'pptx'])) {
            return self::FTYPE_PPT;
        }

        throw new UnsupportedException('Unsupported file format');

    }

    /**
     * Разбор файла
     * @param null|int $fileType тип файла
     *
     * @throws UnsupportedException
     */
    public function scrape($fileType = null){

        if (is_null($fileType)) {
            $fileType = $this->detectFileType();
        }

        switch ($fileType) {
            case self::FTYPE_PDF:
                $scrape= new ScrapePDF();
                break;
            case self::FTYPE_PPT:
                $scrape = new ScrapePPT();
                break;
            default:
                throw new UnsupportedException('Unsupported file format');
        }

        $scrape->scrape($this->fileName, $this->outputPath);
    }
}