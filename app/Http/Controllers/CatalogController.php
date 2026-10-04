<?php

namespace App\Http\Controllers;

use App\Contracts\CatalogRepository;
use App\Http\Requests\StoreCertificationRequest;
use App\Http\Requests\UpdateCertificationRequest;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
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

        $items = $this->repository->all()
            ->filter(fn($item) => $query === ''
                || str_contains(mb_strtolower($item->title), mb_strtolower($query)))
            ->filter(fn($item) => $provider === '' || $item->provider === $provider)
            ->filter(fn($item) => $maxMinutes === 0 || $item->minutes <= $maxMinutes)
            ->values();

        return view('catalog.index', compact('items', 'query', 'provider', 'maxMinutes'));
    }

    public function create(): View
    {
        return view('catalog.create');
    }

    public function store(StoreCertificationRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['title']) . '-' . time();
        $data['urgent'] = $request->boolean('urgent');

        $this->repository->create($data);

        return redirect()
            ->route('catalog.index')
            ->with('success', 'Іспит успішно створено!');
    }

    public function show(string $slug): View
    {
        $item = $this->repository->findBySlug($slug);
        abort_if($item === null, 404);

        return view('catalog.show', compact('item'));
    }

    public function edit(string $slug): View
    {
        $item = $this->repository->findBySlug($slug);
        abort_if($item === null, 404);

        return view('catalog.edit', compact('item'));
    }

    public function update(UpdateCertificationRequest $request, string $slug): RedirectResponse
    {
        $item = $this->repository->findBySlug($slug);
        abort_if($item === null, 404);

        $data = $request->validated();
        $data['urgent'] = $request->boolean('urgent');

        $this->repository->update($item, $data);

        return redirect()
            ->route('catalog.show', $slug)
            ->with('success', 'Іспит оновлено!');
    }

    public function confirmDelete(string $slug): View
    {
        $item = $this->repository->findBySlug($slug);
        abort_if($item === null, 404);

        return view('catalog.confirm-delete', compact('item'));
    }

    public function destroy(string $slug): RedirectResponse
    {
        $item = $this->repository->findBySlug($slug);
        abort_if($item === null, 404);

        $this->repository->delete($item);

        return redirect()
            ->route('catalog.index')
            ->with('success', 'Іспит видалено!');
    }

    public function about(): View
    {
        return view('catalog.about');
    }
}
