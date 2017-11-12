<?php

declare(strict_types=1);

namespace vonZnotz\MtgDeckParser\Service;

use vonZnotz\MtgDeckParser\Service\Deck\DeckCollection;

interface DeckListConverterInterface
{
    public function convertList(string $deckList):DeckCollection;
}