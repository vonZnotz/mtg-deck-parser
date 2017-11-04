<?php

declare(strict_types=1);

namespace vonZnotz\MtgDeckParser\Service\Deck;

use vonZnotz\MtgDeckParser\Service\Cards\CardDataProviderInterface;

class CardDataUpdater
{
    /** @var CardDataProviderInterface */
    private $cardDataProvider;

    public function __construct(CardDataProviderInterface $cardDataProvider)
    {
        $this->cardDataProvider = $cardDataProvider;
    }

    public function update(DeckCollection $deckCollection)
    {
        foreach ($deckCollection as $deckItem) {
            $multiverseId = $deckItem->getMultiverseId();
            if ($multiverseId !== null) {
                $this->cardDataProvider->updateCardInformationByMultiverseId($deckItem);
            }
        }

        return $deckCollection;
    }
}