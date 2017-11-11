<?php

declare(strict_types=1);

namespace vonZnotz\MtgDeckParser\Service\Cards;

use vonZnotz\MtgDeckParser\Service\Deck\DeckItem;

class CardValueProvider implements CardValueProviderInterface
{
    public function updateCardValue(DeckItem $deckItem): void
    {
        $jsonFile = __DIR__ . "/../../../app/points/all.json";
        $jsonData = file_get_contents($jsonFile);
        $pointItems = json_decode($jsonData);

        if (property_exists($pointItems, $deckItem->getName())) {
            $pointItem = $pointItems->{$deckItem->getName()};
        } else {
            $pointItem = $this->getDefaultItem();
        }

        $deckItem->setDeckValue(
            $this->getDeckValue($pointItem)
        );
    }

    private function getDeckValue($pointItem): int
    {
        $costValue = $pointItem->deckValue->commander->cost;
        $deckRestrictionValue = $pointItem->deckValue->commander->deckRestriction;
        $symmetryValue = $pointItem->deckValue->commander->symmetry;

        return ($costValue + $deckRestrictionValue + $symmetryValue) / 3;
    }

    private function getDefaultItem()
    {
        $jsonFile = __DIR__ . "/../../../app/points/default.json";
        $jsonData = file_get_contents($jsonFile);
        $pointItems = json_decode($jsonData);
        return $pointItems->Default;
    }
}