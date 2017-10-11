<?php

namespace vonZnotz\MtgDeckParser\UseCase;

interface UseCaseInterface
{
    public function run(RequestInterface $request, ResponseInterface $response) : ResponseInterface;
}