<?php
/**
 * Created by PhpStorm.
 * User: tneumann
 * Date: 11/4/17
 * Time: 8:53 PM
 */

namespace vonZnotz\MtgDeckParser\Service\Cards;


use vonZnotz\MtgDeckParser\Service\Deck\DeckItem;

interface CardDataProviderInterface
{
    public function updateCardInformationByMultiverseId(DeckItem $deckItem):void;
}