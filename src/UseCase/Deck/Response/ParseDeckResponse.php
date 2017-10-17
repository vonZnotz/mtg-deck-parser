<?php

namespace vonZnotz\MtgDeckParser\UseCase\Deck\Response;

use vonZnotz\MtgDeckParser\Service\DeckCollection;

class ParseDeckResponse
{
    /** @var DeckCollection */
    private $deckCollection;

    /**
     * @return DeckCollection
     */
    public function getDeckCollection(): DeckCollection
    {
        return $this->deckCollection;
    }

    /**
     * @param DeckCollection $deckCollection
     */
    public function setDeckCollection(DeckCollection $deckCollection)
    {
        $this->deckCollection = $deckCollection;
    }
}