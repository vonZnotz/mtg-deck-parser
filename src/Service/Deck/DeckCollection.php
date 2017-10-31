<?php

declare(strict_types=1);

namespace vonZnotz\MtgDeckParser\Service\Deck;


class DeckCollection implements \Iterator
{
    /** @var DeckItem[] */
    private $deckItems = [];

    /** @var int */
    private $current = 0;

    public function addDeckItem(DeckItem $deckItem)
    {
        $this->deckItems[] = $deckItem;
    }

    public function getDeckItem(int $offset):DeckItem
    {
        return $this->deckItems[$offset];
    }

    public function current()
    {
        return $this->deckItems[$this->current];
    }

    public function next()
    {
        $this->current++;
    }

    public function key()
    {
        return $this->current;
    }

    public function valid()
    {
        return count($this->deckItems) > $this->current;
    }

    public function rewind()
    {
        $this->current = 0;
    }
}