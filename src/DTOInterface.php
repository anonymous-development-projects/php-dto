<?php

declare(strict_types=1);

namespace ADP\DataTransferObject;

interface DTOInterface
{
    public function toArray(): array;

    public function toJson(): string;
}
