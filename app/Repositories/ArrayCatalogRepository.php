<?php

namespace App\Repositories;

use App\Contracts\CatalogRepository;
use App\Models\CertificationExam;

final class ArrayCatalogRepository implements CatalogRepository
{
    /** @return list<CertificationExam> */
    public function all(): array
    {
        return array_map(
            fn(array $row) => CertificationExam::fromArray($row),
            [
                ['id' => 1, 'slug' => 'aws-saa', 'title' => 'AWS Solutions Architect', 'provider' => 'Amazon', 'questions' => 65, 'minutes' => 130],
                ['id' => 2, 'slug' => 'azure-admin', 'title' => 'Azure Administrator', 'provider' => 'Microsoft', 'questions' => 50, 'minutes' => 100],
                ['id' => 3, 'slug' => 'gcp-architect', 'title' => 'GCP Professional Architect', 'provider' => 'Google', 'questions' => 60, 'minutes' => 120],
                ['id' => 4, 'slug' => 'cisco-ccna', 'title' => 'Cisco CCNA', 'provider' => 'Cisco', 'questions' => 100, 'minutes' => 120],
                ['id' => 5, 'slug' => 'comptia-sec', 'title' => 'CompTIA Security+', 'provider' => 'CompTIA', 'questions' => 90, 'minutes' => 90],
                ['id' => 6, 'slug' => 'pmp', 'title' => 'Project Management Professional', 'provider' => 'PMI', 'questions' => 180, 'minutes' => 230],
                ['id' => 7, 'slug' => 'itil-foundation', 'title' => 'ITIL Foundation', 'provider' => 'AXELOS', 'questions' => 40, 'minutes' => 60],
                ['id' => 8, 'slug' => 'scrum-master', 'title' => 'Professional Scrum Master I', 'provider' => 'Scrum.org', 'questions' => 80, 'minutes' => 60],
                ['id' => 9, 'slug' => 'oracle-java', 'title' => 'Oracle Java SE 11', 'provider' => 'Oracle', 'questions' => 80, 'minutes' => 180],
            ],
        );
    }

    public function findBySlug(string $slug): ?CertificationExam
    {
        foreach ($this->all() as $item) {
            if ($item->slug === $slug) return $item;
        }
        return null;
    }
}
