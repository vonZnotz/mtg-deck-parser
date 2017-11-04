<?php
/**
 * Created by PhpStorm.
 * User: tneumann
 * Date: 11/4/17
 * Time: 9:35 PM
 */

namespace vonZnotz\MtgDeckParser\Test\UseCase\Deck\ParseDeck;

use vonZnotz\MtgDeckParser\Service\Cards\ExternalCardDatabaseProvider;
use vonZnotz\MtgDeckParser\UseCase\ImportCards;
use PHPUnit\Framework\TestCase;

class ImportCardsTest extends TestCase
{
    public function testImport()
    {
        $zipFilename = dirname(__FILE__) . "/../../../app/cache/AllCards.json.zip";
        if (file_exists($zipFilename)) {
            unlink($zipFilename);
        }

        $jsonFilename = dirname(__FILE__) . "/../../../app/cache/AllCards.json";
        if (file_exists($jsonFilename)) {
            unlink($jsonFilename);
        }

        $importCardsUseCase = new ImportCards(new ExternalCardDatabaseProvider());
        $importCardsUseCase->import();
        $this->assertTrue(file_exists($zipFilename));
        $this->assertTrue(file_exists($jsonFilename));
    }
}
