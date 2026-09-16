<?php

namespace App\Http\Controllers;

use App\Contracts\CatalogRepository;
use Illuminate\Http\Request;
use Illuminate\View\View;

final class CatalogController extends Controller
{
    public function __construct(
        private readonly CatalogRepository $repository,
    ) {}

    public function index(Request $request): View
    {
        $query = trim($request->string('q')->toString());
        $provider = trim($request->string('provider')->toString());
        $maxMinutes = $request->integer('max_minutes', 0);

        $items = collect($this->repository->all())
            ->filter(fn($item) => $query === ''
                || str_contains(mb_strtolower($item->title), mb_strtolower($query)))
            ->filter(fn($item) => $provider === '' || $item->provider === $provider)
            ->filter(fn($item) => $maxMinutes === 0 || $item->minutes <= $maxMinutes)
            ->values();

        return view('catalog.index', compact('items', 'query', 'provider', 'maxMinutes'));
    }

    public function show(string $slug): View
    {
        $item = $this->repository->findBySlug($slug);
        abort_if($item === null, 404);
        return view('catalog.show', compact('item'));
    }

    public function about(): View
    {
        return view('catalog.about');
    }
}
