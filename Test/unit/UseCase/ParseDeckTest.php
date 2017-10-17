<?php

namespace vonZnotz\MtgDeckParser\Test\UseCase\Deck\ParseDeck;

use PHPUnit\Framework\TestCase;
use vonZnotz\MtgDeckParser\Service\DeckCollection;
use vonZnotz\MtgDeckParser\UseCase\Deck\DeckItem;
use vonZnotz\MtgDeckParser\UseCase\Deck\ParseDeck;
use vonZnotz\MtgDeckParser\UseCase\Deck\Request\ParseDeckRequest;
use vonZnotz\MtgDeckParser\UseCase\Deck\Response\ParseDeckResponse;

class ParseDeckTest extends TestCase
{
    public function testParseDeck()
    {
        $request = new ParseDeckRequest();
        $response = new ParseDeckResponse();
        $parseDeckUseCase = new ParseDeck();
        $response = $parseDeckUseCase->run($request, $response);
        $this->assertInstanceOf(DeckCollection::class, $response->getDeckCollection());
    }
}
