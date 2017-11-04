<?php

namespace vonZnotz\MtgDeckParser\Plugin;

use vonZnotz\MtgDeckParser\Service\Deck\DeckItem;

class CardDataProvider implements CardDataProviderInterface
{
    public function updateCardInformationByMultiverseId(DeckItem $deckItem): void
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