<?php

namespace App\DTO;

use DateTime;
use DateTimeImmutable;

class CategoryWithCountDTO
{
    public function __construct(
        public readonly int $id,
        public readonly string $name,
        public readonly string $slug,
        public readonly DateTimeImmutable $createdAt,
        public readonly int $count
    ) {}
}
