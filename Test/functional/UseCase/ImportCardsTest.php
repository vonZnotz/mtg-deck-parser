<?php

namespace vonZnotz\MtgDeckParser\Test\functional\UseCase\Deck\ParseDeck;

use vonZnotz\MtgDeckParser\Service\Cards\ExternalCardDatabaseProvider;
use vonZnotz\MtgDeckParser\UseCase\ImportCards;
use PHPUnit\Framework\TestCase;
use vonZnotz\MtgDeckParser\UseCase\Request\ImportCardsRequest;
use vonZnotz\MtgDeckParser\UseCase\Response\ImportCardsResponse;

class ImportCardsTest extends TestCase
{
    public function testImport()
    {
        $zipFilename = dirname(__FILE__) . "/../../../app/cache/AllSets.json.zip";
        if (file_exists($zipFilename)) {
            unlink($zipFilename);
        }

        $jsonFilename = dirname(__FILE__) . "/../../../app/cache/AllSets.json";
        if (file_exists($jsonFilename)) {
            unlink($jsonFilename);
        }

        $importCardsUseCase = new ImportCards(new ExternalCardDatabaseProvider());
        $importCardsUseCase->run(
            new ImportCardsRequest(),
            new ImportCardsResponse()
        );
        $this->assertTrue(file_exists($zipFilename));
        $this->assertTrue(file_exists($jsonFilename));
    }
}
