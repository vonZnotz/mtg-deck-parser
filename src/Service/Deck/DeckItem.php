<?php

declare(strict_types=1);

namespace vonZnotz\MtgDeckParser\Service\Deck;

class DeckItem
{
    /** @var int */
    private $multiverseId;

    /** @var string */
    private $name;

    /** @var string */
    private $language;

    /** @var int */
    private $amount;

    /** @var int */
    private $deckValue;

    /**
     * @return int
     */
    public function getMultiverseId():? int
    {
        return $this->multiverseId;
    }

    /**
     * @param int $multiverseId
     */
    public function setMultiverseId(int $multiverseId)
    {
        $this->multiverseId = $multiverseId;
    }

    /**
     * @return string
     */
    public function getName():? string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getLanguage():? string
    {
        return $this->language;
    }

    /**
     * @param string $language
     */
    public function setLanguage(string $language)
    {
        $this->language = $language;
    }

    /**
     * @return int
     */
    public function getAmount():? int
    {
        return $this->amount;
    }

    /**
     * @param int $amount
     */
    public function setAmount(int $amount)
    {
        $this->amount = $amount;
    }

    /**
     * @return int
     */
    public function getDeckValue(): int
    {
        return $this->deckValue;
    }

    /**
     * @param int $deckValue
     */
    public function setDeckValue(int $deckValue)
    {
        $this->deckValue = $deckValue;
    }
}