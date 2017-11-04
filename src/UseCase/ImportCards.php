<?php

declare(strict_types=1);

namespace vonZnotz\MtgDeckParser\UseCase;

use vonZnotz\MtgDeckParser\Service\Cards\ExternalCardDatabaseProviderInterface;

class ImportCards extends AbstractUseCase
{
    /** @var ExternalCardDatabaseProviderInterface */
    private $externalDatabaseProvider;

    public function __construct(ExternalCardDatabaseProviderInterface $externalCardDatabaseProvider)
    {
        $this->externalDatabaseProvider = $externalCardDatabaseProvider;
    }

    public function import()
    {
        $this->externalDatabaseProvider->downloadDatabase();
        $this->externalDatabaseProvider->extractDatabase();
        $this->externalDatabaseProvider->importDatabase();
    }
}