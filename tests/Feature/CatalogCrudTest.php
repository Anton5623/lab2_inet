<?php

namespace Tests\Feature;

use App\Models\CertificationExam;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CatalogCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_returns_200(): void
    {
        $response = $this->get('/certifications');
        $response->assertOk();
        $response->assertSee('Сертифікаційні іспити');
    }

    public function test_index_has_variant_header(): void
    {
        $response = $this->get('/certifications');
        $response->assertHeader('X-Student-Variant', '72');
    }

    public function test_create_page_returns_200(): void
    {
        $response = $this->get('/certifications/create');
        $response->assertOk();
        $response->assertSee('Створити іспит');
    }

    public function test_store_creates_exam(): void
    {
        $data = [
            'title' => 'Test Exam',
            'provider' => 'Amazon',
            'questions' => 50,
            'minutes' => 100,
            'notes' => 'Це тестовий опис для перевірки валідації',
        ];

        $response = $this->post('/certifications', $data);
        $response->assertRedirect('/certifications');
        $this->assertDatabaseHas('certification_exams', ['title' => 'Test Exam']);
    }

    public function test_show_returns_200(): void
    {
        $exam = CertificationExam::create([
            'slug' => 'test-show',
            'title' => 'Show Test',
            'provider' => 'Google',
            'questions' => 30,
            'minutes' => 60,
        ]);

        $response = $this->get('/certifications/' . $exam->slug);
        $response->assertOk();
        $response->assertSee('Show Test');
    }

    public function test_show_returns_404_for_unknown(): void
    {
        $response = $this->get('/certifications/not-found');
        $response->assertNotFound();
    }

    public function test_edit_returns_200(): void
    {
        $exam = CertificationExam::create([
            'slug' => 'test-edit',
            'title' => 'Edit Test',
            'provider' => 'Cisco',
            'questions' => 20,
            'minutes' => 40,
        ]);

        $response = $this->get('/certifications/' . $exam->slug . '/edit');
        $response->assertOk();
        $response->assertSee('Edit Test');
    }

    public function test_update_modifies_exam(): void
    {
        $exam = CertificationExam::create([
            'slug' => 'test-update',
            'title' => 'Old Title',
            'provider' => 'Oracle',
            'questions' => 25,
            'minutes' => 50,
        ]);

        $response = $this->patch('/certifications/' . $exam->slug, [
            'title' => 'New Title',
            'provider' => 'Oracle',
            'questions' => 25,
            'minutes' => 50,
        ]);

        $response->assertRedirect('/certifications/' . $exam->slug);
        $this->assertDatabaseHas('certification_exams', ['title' => 'New Title']);
    }

    public function test_confirm_delete_returns_200(): void
    {
        $exam = CertificationExam::create([
            'slug' => 'test-delete',
            'title' => 'Delete Test',
            'provider' => 'PMI',
            'questions' => 40,
            'minutes' => 80,
        ]);

        $response = $this->get('/certifications/' . $exam->slug . '/confirm-delete');
        $response->assertOk();
        $response->assertSee('Видалити іспит');
    }

    public function test_destroy_deletes_exam(): void
    {
        $exam = CertificationExam::create([
            'slug' => 'test-destroy',
            'title' => 'Destroy Test',
            'provider' => 'CompTIA',
            'questions' => 10,
            'minutes' => 20,
        ]);

        $response = $this->delete('/certifications/' . $exam->slug);
        $response->assertRedirect('/certifications');
        $this->assertDatabaseMissing('certification_exams', ['slug' => 'test-destroy']);
    }

    public function test_about_page_returns_200(): void
    {
        $response = $this->get('/certifications/about');
        $response->assertOk();
        $response->assertSee('Про застосунок');
    }

    public function test_root_redirects_to_index(): void
    {
        $response = $this->get('/');
        $response->assertRedirect('/certifications');
    }

    public function test_filter_by_provider(): void
    {
        CertificationExam::create(['slug' => 'a1', 'title' => 'A1', 'provider' => 'Amazon', 'questions' => 10, 'minutes' => 20]);
        CertificationExam::create(['slug' => 'a2', 'title' => 'A2', 'provider' => 'Google', 'questions' => 10, 'minutes' => 20]);

        $response = $this->get('/certifications?provider=Amazon');
        $response->assertSee('A1');
        $response->assertDontSee('A2');
    }

    public function test_filter_by_max_minutes(): void
    {
        CertificationExam::create(['slug' => 'm1', 'title' => 'Short', 'provider' => 'Amazon', 'questions' => 10, 'minutes' => 50]);
        CertificationExam::create(['slug' => 'm2', 'title' => 'Long', 'provider' => 'Amazon', 'questions' => 10, 'minutes' => 300]);

        $response = $this->get('/certifications?max_minutes=100');
        $response->assertSee('Short');
        $response->assertDontSee('Long');
    }

    public function test_search_by_title(): void
    {
        CertificationExam::create(['slug' => 's1', 'title' => 'AWS Solutions', 'provider' => 'Amazon', 'questions' => 10, 'minutes' => 20]);

        $response = $this->get('/certifications?q=AWS');
        $response->assertSee('AWS Solutions');
    }

    public function test_flash_success_after_create(): void
    {
        $response = $this->post('/certifications', [
            'title' => 'Flash Test',
            'provider' => 'Amazon',
            'questions' => 10,
            'minutes' => 20,
        ]);

        $response->assertSessionHas('success');
    }
}
