<?php

declare(strict_types=1);

namespace vonZnotz\MtgDeckParser\Test\functional\UseCase\Deck\ParseDeck;

use PHPUnit\Framework\TestCase;
use vonZnotz\MtgDeckParser\UseCase\ConvertDeckFromList;
use vonZnotz\MtgDeckParser\UseCase\Request\ConvertDeckFromListRequest;
use vonZnotz\MtgDeckParser\UseCase\Response\ConvertDeckFromListResponse;

class ConvertDeckFromListTest extends TestCase
{
    public function testConvertList()
    {
        $request = new ConvertDeckFromListRequest();
        $response = new ConvertDeckFromListResponse();

        $request->setDeckList("
            1 x Sol Ring
            1 x Forest
        ");

        $useCase = new ConvertDeckFromList();
        $response = $useCase->run(
            $request,
            $response
        );

        $deckCollection = $response->getDeckCollection();
        $this->assertNotNull($deckCollection->getDeckItem(0)->getName());
        $this->assertNotNull($deckCollection->getDeckItem(1)->getName());
    }
}