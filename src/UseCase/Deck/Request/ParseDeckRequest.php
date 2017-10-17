<?php

namespace vonZnotz\MtgDeckParser\UseCase\Deck\Request;

use vonZnotz\MtgDeckParser\UseCase\Deck\DeckItem;

class ParseDeckRequest
{
    /**
     * Should be anything, that could be identified as a deck
     *
     * @var array
     */
    private $postCollection;

    /**
     * @return array
     */
    public function getPostCollection(): array
    {
        return $this->postCollection;
    }

    /**
     * @param array $postCollection
     */
    public function setPostCollection(array $postCollection)
    {
        $this->postCollection = $postCollection;
    }
}