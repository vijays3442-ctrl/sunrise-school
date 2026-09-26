<?php

namespace App\Services;

use App\Models\PageImage;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Throwable;

class PageImageRegistry
{
    private ?Collection $records = null;

    public function sync(): Collection
    {
        foreach ($this->definitions() as $key => $definition) {
            $image = PageImage::firstOrNew(['key' => $key]);
            $isNew = ! $image->exists;

            $image->fill([
                'page' => $definition['page'],
                'section' => $definition['section'],
                'label' => $definition['label'],
                'fallback_path' => $definition['fallback'],
            ]);

            if ($isNew) {
                $image->alt_text = $definition['alt'];
            }

            $image->save();
        }

        $this->records = PageImage::query()
            ->orderBy('page')
            ->orderBy('section')
            ->orderBy('label')
            ->get();

        return $this->records;
    }

    public function url(string $key): string
    {
        $definition = $this->definition($key);
        $imagePath = $this->record($key)?->image_path;

        if ($imagePath) {
            return Storage::disk('public')->url($imagePath);
        }

        return $this->toUrl($definition['fallback']);
    }

    public function alt(string $key): string
    {
        $definition = $this->definition($key);

        return $this->record($key)?->alt_text ?: $definition['alt'];
    }

    public function definitions(): array
    {
        return config('page_images', []);
    }

    private function definition(string $key): array
    {
        $definition = $this->definitions()[$key] ?? null;

        if ($definition === null) {
            throw new \InvalidArgumentException("Unknown page image key [{$key}].");
        }

        return $definition;
    }

    private function record(string $key): ?PageImage
    {
        if ($this->records === null) {
            try {
                $this->records = Schema::hasTable('page_images')
                    ? PageImage::all()
                    : new Collection();
            } catch (Throwable) {
                $this->records = new Collection();
            }
        }

        return $this->records->firstWhere('key', $key);
    }

    private function toUrl(string $path): string
    {
        if (Str::startsWith($path, ['http://', 'https://', '//', 'data:'])) {
            return $path;
        }

        return asset(ltrim($path, '/'));
    }
}
