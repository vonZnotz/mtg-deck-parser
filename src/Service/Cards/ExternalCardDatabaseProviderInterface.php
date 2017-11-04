<?php

namespace vonZnotz\MtgDeckParser\Service\Cards;

interface ExternalCardDatabaseProviderInterface
{
    public function downloadDatabase();
    public function extractDatabase();
    public function importDatabase();
}