<?php

namespace vonZnotz\MtgDeckParser\UseCase\Deck;

use vonZnotz\MtgDeckParser\Service\DeckCollection;
use vonZnotz\MtgDeckParser\UseCase\AbstractUseCase;
use vonZnotz\MtgDeckParser\UseCase\Deck\Request\ParseDeckRequest;
use vonZnotz\MtgDeckParser\UseCase\Deck\Response\ParseDeckResponse;

class ParseDeck extends AbstractUseCase
{
    public function run(ParseDeckRequest $request, ParseDeckResponse $response): ParseDeckResponse
    {
        $deckCollection = new DeckCollection();
        $response->setDeckCollection($deckCollection);
        return $response;
    }
}