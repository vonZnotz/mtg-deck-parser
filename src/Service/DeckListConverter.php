<?php

declare(strict_types=1);

namespace vonZnotz\MtgDeckParser\Service;

use vonZnotz\MtgDeckParser\Service\Cards\CardValueProviderInterface;
use vonZnotz\MtgDeckParser\Service\Deck\DeckCollection;
use vonZnotz\MtgDeckParser\Service\Deck\DeckItem;

class DeckListConverter implements DeckListConverterInterface
{
    const DECKLIST_ITEM_AMOUNT = 1;
    const DECKLIST_ITEM_NAME = 2;

    /** @var CardValueProviderInterface */
    private $cardValueProvider;

    public function __construct(
        CardValueProviderInterface $cardValueProvider
    ) {
        $this->cardValueProvider = $cardValueProvider;
    }

    public function convertList(string $deckList): DeckCollection
    {
        $deckListArray = $this->getListArray($deckList);
        $deckCollection = new DeckCollection();

        foreach ($deckListArray as $deckListItem) {
            $deckListItemInformation = $this->extractItemInformation($deckListItem);
            $deckItem = new DeckItem();
            $deckItem->setAmount($deckListItemInformation[self::DECKLIST_ITEM_AMOUNT]);
            $deckItem->setName($deckListItemInformation[self::DECKLIST_ITEM_NAME]);
            $this->cardValueProvider->updateCardValue($deckItem);
            $deckCollection->addDeckItem($deckItem);
        }
        return $deckCollection;
    }

    private function getListArray(string $deckList)
    {
        $deckList = trim($deckList);
        $deckListArray = explode("\n", $deckList);
        return $deckListArray;
    }

    private function extractItemInformation(string $deckListItem)
    {
        $deckListItem = trim($deckListItem);

        $deckListItemInformation = [];
        if (preg_match('/(([0-9]{1,2})([\ ]{0,1}))(.*)/', $deckListItem, $matches)) {
            $deckListItemInformation[self::DECKLIST_ITEM_AMOUNT] = (int)trim($matches[1]);
            $deckListItemInformation[self::DECKLIST_ITEM_NAME] = trim($matches[4]);
        } else {
            $deckListItemInformation[self::DECKLIST_ITEM_AMOUNT] = 1;
            $deckListItemInformation[self::DECKLIST_ITEM_NAME] = $deckListItem;
        }

        return $deckListItemInformation;
    }
}