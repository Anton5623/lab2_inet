<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CatalogValidationTest extends TestCase
{
    use RefreshDatabase;

    public function test_title_is_required(): void
    {
        $response = $this->post('/certifications', [
            'title' => '',
            'provider' => 'Amazon',
            'questions' => 10,
            'minutes' => 20,
        ]);

        $response->assertSessionHasErrors('title');
    }

    public function test_title_max_length(): void
    {
        $response = $this->post('/certifications', [
            'title' => str_repeat('a', 101),
            'provider' => 'Amazon',
            'questions' => 10,
            'minutes' => 20,
        ]);

        $response->assertSessionHasErrors('title');
    }

    public function test_provider_must_be_in_whitelist(): void
    {
        $response = $this->post('/certifications', [
            'title' => 'Test',
            'provider' => 'UnknownProvider',
            'questions' => 10,
            'minutes' => 20,
        ]);

        $response->assertSessionHasErrors('provider');
    }

    public function test_questions_min_boundary(): void
    {
        $response = $this->post('/certifications', [
            'title' => 'Test',
            'provider' => 'Amazon',
            'questions' => 9,
            'minutes' => 20,
        ]);

        $response->assertSessionHasErrors('questions');
    }

    public function test_minutes_min_boundary(): void
    {
        $response = $this->post('/certifications', [
            'title' => 'Test',
            'provider' => 'Amazon',
            'questions' => 10,
            'minutes' => 14,
        ]);

        $response->assertSessionHasErrors('minutes');
    }

    public function test_notes_min_length(): void
    {
        $response = $this->post('/certifications', [
            'title' => 'Test',
            'provider' => 'Amazon',
            'questions' => 10,
            'minutes' => 20,
            'notes' => 'short',
        ]);

        $response->assertSessionHasErrors('notes');
    }

    public function test_urgent_requires_justification(): void
    {
        $response = $this->post('/certifications', [
            'title' => 'Test',
            'provider' => 'Amazon',
            'questions' => 10,
            'minutes' => 20,
            'urgent' => '1',
            'justification' => '',
        ]);

        $response->assertSessionHasErrors('justification');
    }

    public function test_valid_data_passes(): void
    {
        $response = $this->post('/certifications', [
            'title' => 'Valid Exam',
            'provider' => 'Amazon',
            'questions' => 50,
            'minutes' => 100,
            'notes' => 'Це достатньо довгий опис для проходження валідації',
        ]);

        $response->assertSessionHasNoErrors();
    }
}
