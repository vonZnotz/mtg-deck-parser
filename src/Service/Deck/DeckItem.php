<?php

namespace vonZnotz\MtgDeckParser\Service\Deck;

class DeckItem
{
    /** @var int */
    private $multiverseId;

    /** @var string */
    private $name;

    /** @var string */
    private $language;

    /**
     * @return int
     */
    public function getMultiverseId(): int
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
    public function getName(): string
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
    public function getLanguage(): string
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
}