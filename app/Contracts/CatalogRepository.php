<?php

namespace App\Contracts;

interface CatalogRepository
{
    /** @return list<\App\Models\CertificationExam> */
    public function all(): array;

    public function findBySlug(string $slug): ?\App\Models\CertificationExam;
}

