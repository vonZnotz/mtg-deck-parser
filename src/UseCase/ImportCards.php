<?php

declare(strict_types=1);

namespace vonZnotz\MtgDeckParser\UseCase;

use vonZnotz\MtgDeckParser\Service\Cards\ExternalCardDatabaseProviderInterface;
use vonZnotz\MtgDeckParser\UseCase\Request\ImportCardsRequest;
use vonZnotz\MtgDeckParser\UseCase\Response\ImportCardsResponse;

class ImportCards extends AbstractUseCase
{
    /** @var ExternalCardDatabaseProviderInterface */
    private $externalDatabaseProvider;

    public function __construct(ExternalCardDatabaseProviderInterface $externalCardDatabaseProvider)
    {
        $this->externalDatabaseProvider = $externalCardDatabaseProvider;
    }

    public function run(ImportCardsRequest $importCardsRequest, ImportCardsResponse $importCardsResponse)
    {
        $this->externalDatabaseProvider->downloadDatabase();
        $this->externalDatabaseProvider->extractDatabase();
        $this->externalDatabaseProvider->importDatabase();
    }
}