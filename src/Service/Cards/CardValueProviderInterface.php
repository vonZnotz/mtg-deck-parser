<?php

namespace vonZnotz\MtgDeckParser\Service\Cards;

use vonZnotz\MtgDeckParser\Service\Deck\DeckItem;

interface CardValueProviderInterface
{
    public function updateCardValue(DeckItem $deckItem): void;

}