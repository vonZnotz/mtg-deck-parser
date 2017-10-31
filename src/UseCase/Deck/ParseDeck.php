<?php

declare(strict_types=1);

namespace vonZnotz\MtgDeckParser\UseCase\Deck;

use vonZnotz\MtgDeckParser\Service\Deck\CardDataUpdater;
use vonZnotz\MtgDeckParser\Service\Deck\DeckCollection;
use vonZnotz\MtgDeckParser\UseCase\AbstractUseCase;
use vonZnotz\MtgDeckParser\UseCase\Deck\Request\ParseDeckRequest;
use vonZnotz\MtgDeckParser\UseCase\Deck\Response\ParseDeckResponse;

class ParseDeck extends AbstractUseCase
{
    /** @var CardDataUpdater */
    private $cardDataUpdater;

    public function __construct(CardDataUpdater $cardDataUpdater)
    {
        $this->cardDataUpdater = new CardDataUpdater();
    }

    public function run(ParseDeckRequest $request, ParseDeckResponse $response): ParseDeckResponse
    {
        $collection = $request->getCollection();
        $collection = $this->cardDataUpdater->update($collection);

        $response->setDeckCollection($collection);

        return $response;
    }
}