<?php

namespace vonZnotz\MtgDeckParser\UseCase\Deck\Request;

use vonZnotz\MtgDeckParser\Service\Deck\DeckCollection;

class ParseDeckRequest
{
    /**
     * Should be anything, that could be identified as a deck
     *
     * @var DeckCollection
     */
    private $collection;

    /**
     * @return DeckCollection
     */
    public function getCollection(): DeckCollection
    {
        return $this->collection;
    }

    /**
     * @param DeckCollection $collection
     */
    public function setCollection(DeckCollection $collection)
    {
        $this->collection = $collection;
    }
}