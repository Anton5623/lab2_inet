<?php

namespace App\Contracts;

use App\Models\CertificationExam;
use Illuminate\Support\Collection;

interface CatalogRepository
{
    public function all(): Collection;

    public function findBySlug(string $slug): ?CertificationExam;

    public function create(array $data): CertificationExam;

    public function update(CertificationExam $exam, array $data): CertificationExam;

    public function delete(CertificationExam $exam): bool;
}
