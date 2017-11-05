<?php

declare(strict_types=1);


namespace vonZnotz\MtgDeckParser\Service\Cards;

class ExternalCardDatabaseProvider implements ExternalCardDatabaseProviderInterface
{
    const EXTERNAL_DATABASE_URL = 'https://mtgjson.com/json/AllSets.json.zip';

    private $zipFilename;
    private $targetDirectory;

    public function __construct()
    {
        $this->zipFilename = dirname(__FILE__) . "/../../../app/cache/AllSets.json.zip";
        $this->targetDirectory = dirname(__FILE__) . "/../../../app/cache";
    }

    public function downloadDatabase()
    {
        $allCardsJsonZipContent = file_get_contents(self::EXTERNAL_DATABASE_URL);
        file_put_contents($this->zipFilename, $allCardsJsonZipContent);
    }

    public function extractDatabase()
    {
        $zipArchive = new \ZipArchive();
        $zipArchive->open($this->zipFilename);
        $zipArchive->extractTo($this->targetDirectory);
        $zipArchive->close();
    }

    public function importDatabase()
    {
        return true;
    }

}