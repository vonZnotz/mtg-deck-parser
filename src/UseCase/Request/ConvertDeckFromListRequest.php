<?php

declare(strict_types=1);

namespace vonZnotz\MtgDeckParser\UseCase\Request;

class ConvertDeckFromListRequest
{
    /** @var string */
    private $deckList;

    public function getDeckList():? string
    {
        return $this->deckList;
    }

    public function setDeckList(string $deckList)
    {
        $this->deckList = $deckList;
    }
}