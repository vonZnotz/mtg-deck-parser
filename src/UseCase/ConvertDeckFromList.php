<?php

declare(strict_types=1);

namespace vonZnotz\MtgDeckParser\UseCase;

use vonZnotz\MtgDeckParser\Service\DeckListConverterInterface;
use vonZnotz\MtgDeckParser\UseCase\Request\ConvertDeckFromListRequest;
use vonZnotz\MtgDeckParser\UseCase\Response\ConvertDeckFromListResponse;

class ConvertDeckFromList extends AbstractUseCase
{
    /** @var DeckListConverterInterface */
    private $deckListConverter;

    public function __construct(
        DeckListConverterInterface $deckListConverter
    ) {
        $this->deckListConverter = $deckListConverter;
    }

    public function run(ConvertDeckFromListRequest $request, ConvertDeckFromListResponse $response)
    {
        $deckList = $request->getDeckList();
        $deckCollection = $this->deckListConverter->convertList($deckList);
        $response->setDeckCollection($deckCollection);

        return $response;
    }

}