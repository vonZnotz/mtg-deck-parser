<?php

declare(strict_types=1);

namespace vonZnotz\MtgDeckParser\Service\Deck;

class CardDataUpdater
{
    public function update(DeckCollection $deckCollection)
    {
        foreach ($deckCollection as $deckItem) {
            $multiverseId = $deckItem->getMultiverseId();
            if ($multiverseId !== null) {
                $this->getCardInformationByMultiverseId($deckItem);
            }
        }

        return $deckCollection;
    }

    public function getCardInformationByMultiverseId(DeckItem $deckItem)
    {
        $baseUrl = 'http://gatherer.wizards.com/Pages/Card/Details.aspx?multiverseid=' . $deckItem->getMultiverseId();
        $html = file_get_contents($baseUrl);

        $deckItem->setName($this->getCardName($html));

        if ($deckItem->getAmount() === null) {
            $deckItem->setAmount(1);
        }

    }

    private function getCardName(string $html):string
    {
        $startString = 'Card Name:</div>';
        $start = strpos($html, 'Card Name:</div>');
        $start += strlen($startString);
        $startString2 = '<div class="value">';
        $start2 = strpos($html, $startString2, $start) + strlen($startString2);

        $startHtml = trim(substr($html, $start2));
        $cardName = substr($startHtml, 0, strpos($startHtml, '</div>'));
        return $cardName;
    }
}