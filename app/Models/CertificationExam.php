<?php

namespace App\Models;

final readonly class CertificationExam
{
    public function __construct(
        public int $id,
        public string $slug,
        public string $title,
        public string $provider,
        public int $questions,
        public int $minutes,
    ) {}

    public function minutesPerQuestion(): float
    {
        return round($this->minutes / $this->questions, 2);
    }

    public function intensityLabel(): string
    {
        $mpq = $this->minutesPerQuestion();
        if ($mpq < 1.0) return 'very-intensive';
        if ($mpq < 1.5) return 'intensive';
        if ($mpq < 2.5) return 'standard';
        return 'relaxed';
    }

    public static function fromArray(array $data): self
    {
        return new self(...$data);
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'slug' => $this->slug,
            'title' => $this->title,
            'provider' => $this->provider,
            'questions' => $this->questions,
            'minutes' => $this->minutes,
        ];
    }
}
