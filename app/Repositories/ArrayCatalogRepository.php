<?php

namespace App\Repositories;

use App\Contracts\CatalogRepository;
use App\Models\CertificationExam;
use Illuminate\Support\Collection;

class ArrayCatalogRepository implements CatalogRepository
{
    public function all(): Collection
    {
        return CertificationExam::query()->orderBy('id')->get();
    }

    public function findBySlug(string $slug): ?CertificationExam
    {
        return CertificationExam::where('slug', $slug)->first();
    }

    public function create(array $data): CertificationExam
    {
        return CertificationExam::create($data);
    }

    public function update(CertificationExam $exam, array $data): CertificationExam
    {
        $exam->update($data);
        return $exam->fresh();
    }

    public function delete(CertificationExam $exam): bool
    {
        return $exam->delete();
    }
}
