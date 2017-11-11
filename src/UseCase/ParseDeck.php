<?php

declare(strict_types=1);

namespace vonZnotz\MtgDeckParser\UseCase;

use vonZnotz\MtgDeckParser\Service\Deck\CardDataUpdater;
use vonZnotz\MtgDeckParser\UseCase\Request\ParseDeckRequest;
use vonZnotz\MtgDeckParser\UseCase\Response\ParseDeckResponse;

class ParseDeck extends AbstractUseCase
{
    /** @var CardDataUpdater */
    private $cardDataUpdater;

    public function __construct(CardDataUpdater $cardDataUpdater)
    {
        $this->cardDataUpdater = $cardDataUpdater;
    }

    public function run(ParseDeckRequest $request, ParseDeckResponse $response): ParseDeckResponse
    {
        $collection = $request->getCollection();
        $collection = $this->cardDataUpdater->update($collection);
        $collection = $this->cardDataUpdater->updatePoints($collection);


        $response->setDeckCollection($collection);

        return $response;
    }
}