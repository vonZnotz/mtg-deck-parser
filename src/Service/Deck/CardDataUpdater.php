<?php

declare(strict_types=1);

namespace vonZnotz\MtgDeckParser\Service\Deck;

use vonZnotz\MtgDeckParser\Service\Cards\CardDataProviderInterface;
use vonZnotz\MtgDeckParser\Service\Cards\CardValueProviderInterface;

class CardDataUpdater
{
    /** @var CardDataProviderInterface */
    private $cardDataProvider;

    public function __construct(
        CardDataProviderInterface $cardDataProvider,
        CardValueProviderInterface $cardValueProvider
    ) {
        $this->cardDataProvider = $cardDataProvider;
        $this->cardValueProvider = $cardValueProvider;
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

    public function updatePoints(DeckCollection $deckCollection)
    {
        foreach ($deckCollection as $deckItem) {
            $this->cardValueProvider->updateCardValue($deckItem);
        }

        return $deckCollection;
    }
}