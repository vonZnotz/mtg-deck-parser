<?php

namespace vonZnotz\MtgDeckParser\UseCase\Deck;

use vonZnotz\MtgDeckParser\UseCase\AbstractUseCase;
use vonZnotz\MtgDeckParser\UseCase\Deck\Request\ParseDeckRequest;
use vonZnotz\MtgDeckParser\UseCase\Deck\Response\ParseDeckResponse;

class ParseDeck extends AbstractUseCase
{
    public function run(ParseDeckRequest $request, ParseDeckResponse $response): ParseDeckResponse
    {
        return $response;
    }
}