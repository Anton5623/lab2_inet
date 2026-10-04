<?php

namespace Tests\Feature;

use Database\Seeders\CertificationExamSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CatalogTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(CertificationExamSeeder::class);
    }

    public function test_index_is_available_and_has_variant_header(): void
    {
        $response = $this->get('/' . config('lab2.route_prefix'));

        $response->assertOk()
            ->assertHeader('X-Student-Variant', (string) config('lab2.variant'))
            ->assertSee('Сертифікаційні іспити');
    }

    public function test_known_item_is_shown(): void
    {
        $response = $this->get('/' . config('lab2.route_prefix') . '/aws-saa');
        $response->assertOk()->assertSee('AWS Solutions Architect');
    }

    public function test_unknown_item_returns_404(): void
    {
        $this->get('/' . config('lab2.route_prefix') . '/missing-item')
            ->assertNotFound();
    }

    public function test_filter_by_provider_works(): void
    {
        $response = $this->get('/' . config('lab2.route_prefix') . '?provider=Amazon');
        $response->assertOk()
            ->assertSee('AWS Solutions Architect')
            ->assertDontSee('Azure Administrator');
    }

    public function test_filter_by_max_minutes_works(): void
    {
        $response = $this->get('/' . config('lab2.route_prefix') . '?max_minutes=100');
        $response->assertOk()
            ->assertSee('Azure Administrator')
            ->assertDontSee('Project Management Professional');
    }

    public function test_about_page_is_available(): void
    {
        $response = $this->get('/' . config('lab2.route_prefix') . '/about');
        $response->assertOk()->assertSee('Про застосунок');
    }
}
