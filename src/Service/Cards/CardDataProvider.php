<?php

namespace vonZnotz\MtgDeckParser\Service\Cards;

use vonZnotz\MtgDeckParser\Service\Deck\DeckItem;

class CardDataProvider implements CardDataProviderInterface
{
    public function updateCardInformationByMultiverseId(DeckItem $deckItem): void
    {
        $mulitverseId = $deckItem->getMultiverseId();
        $jsonFile = __DIR__ . "/../../../app/cache/cards/" . $mulitverseId . ".json";

        $jsonData = file_get_contents($jsonFile);
        $cardItem = json_decode($jsonData);

        $deckItem->setName($cardItem->name);

        if ($deckItem->getAmount() === null) {
            $deckItem->setAmount(1);
        }
    }
}