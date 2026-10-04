<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CertificationExam extends Model
{
    protected $fillable = [
        'slug',
        'title',
        'provider',
        'questions',
        'minutes',
        'notes',
        'urgent',
        'justification',
    ];

    protected $casts = [
        'urgent' => 'boolean',
        'questions' => 'integer',
        'minutes' => 'integer',
    ];

    public function minutesPerQuestion(): float
    {
        return round($this->minutes / $this->questions, 2);
    }

    public function intensityLabel(): string
    {
        $mpq = $this->minutesPerQuestion();
        if ($mpq < 1.0) {
            return 'very-intensive';
        }
        if ($mpq < 1.5) {
            return 'intensive';
        }
        if ($mpq < 2.5) {
            return 'standard';
        }

        return 'relaxed';
    }
}
