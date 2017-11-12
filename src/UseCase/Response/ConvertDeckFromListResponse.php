<?php

declare(strict_types=1);

namespace vonZnotz\MtgDeckParser\UseCase\Response;

use vonZnotz\MtgDeckParser\Service\Deck\DeckCollection;

class ConvertDeckFromListResponse
{
    /** @var DeckCollection */
    public $deckCollection;

    public function getDeckCollection():? DeckCollection
    {
        return $this->deckCollection;
    }

    public function setDeckCollection(DeckCollection $deckCollection)
    {
        $this->deckCollection = $deckCollection;
    }

}