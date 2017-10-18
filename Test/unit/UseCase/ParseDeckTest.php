<?php

declare(strict_types=1);

namespace vonZnotz\MtgDeckParser\Test\UseCase\Deck\ParseDeck;

use PHPUnit\Framework\TestCase;
use vonZnotz\MtgDeckParser\Service\Deck\DeckCollection;
use vonZnotz\MtgDeckParser\Service\Deck\DeckItem;
use vonZnotz\MtgDeckParser\UseCase\Deck\ParseDeck;
use vonZnotz\MtgDeckParser\UseCase\Deck\Request\ParseDeckRequest;
use vonZnotz\MtgDeckParser\UseCase\Deck\Response\ParseDeckResponse;

class ParseDeckTest extends TestCase
{
    public function testParseDeckFromPostRequest()
    {
        $request = new ParseDeckRequest();

        $deckCollection = new DeckCollection();

        $deckItem = new DeckItem();
        $deckItem->setMultiverseId(433241);
        $deckCollection->addDeckItem($deckItem);

        $deckItem = new DeckItem();
        $deckItem->setName('Forest');
        $deckCollection->addDeckItem($deckItem);

        $request->setCollection($deckCollection);

        $response = new ParseDeckResponse();
        $response->setDeckCollection($deckCollection);

        $parseDeckUseCase = new ParseDeck();
        $response = $parseDeckUseCase->run($request, $response);
        $this->assertInstanceOf(DeckCollection::class, $response->getDeckCollection());

        $collection = $response->getDeckCollection();
        foreach ($collection as $deckItem) {
            $this->assertNotNull($deckItem->getMultiverseId());
            $this->assertNotNull($deckItem->getName());
        }
    }
}
