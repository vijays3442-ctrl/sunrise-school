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
        $definedKeys = array_keys($this->definitions());

        // Prune DB records that are not in current definitions and have no custom uploaded image
        PageImage::whereNotIn('key', $definedKeys)
            ->whereNull('image_path')
            ->delete();

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
            // Check if key is a submenu like content.{section}.{slug}
            if (Str::startsWith($key, 'content.')) {
                $parts = explode('.', $key);
                if (count($parts) >= 3) {
                    $sectionKey = $parts[1];
                    $overviewKey = "content.{$sectionKey}.overview";
                    if (isset($this->definitions()[$overviewKey])) {
                        return $this->definitions()[$overviewKey];
                    }

                    // Check if section header exists (e.g. admissions.header, about.header, academics.header)
                    $headerKey = "{$sectionKey}.header";
                    if (isset($this->definitions()[$headerKey])) {
                        return $this->definitions()[$headerKey];
                    }

                    // Check site_content.php config fallback
                    $siteContent = config('site_content');
                    if (is_array($siteContent) && isset($siteContent[$sectionKey]['fallback'])) {
                        return [
                            'page' => $siteContent[$sectionKey]['label'] ?? ucfirst($sectionKey),
                            'section' => 'Overview Page',
                            'label' => ($siteContent[$sectionKey]['label'] ?? ucfirst($sectionKey)) . ' Header',
                            'fallback' => $siteContent[$sectionKey]['fallback'],
                            'alt' => $siteContent[$sectionKey]['label'] ?? ucfirst($sectionKey),
                        ];
                    }
                }
            }

            // Fallback for decorative borders
            if ($key === 'site.header_top') {
                return ['page' => 'Global', 'section' => 'Decorative', 'label' => 'Top Border', 'fallback' => 'kider/img/bg-header-top.png', 'alt' => 'Top border'];
            }
            if ($key === 'site.header_bottom') {
                return ['page' => 'Global', 'section' => 'Decorative', 'label' => 'Bottom Border', 'fallback' => 'kider/img/bg-header-bottom.png', 'alt' => 'Bottom border'];
            }

            // Fallback for hero slides
            if (Str::startsWith($key, 'home.hero_fallback_')) {
                return ['page' => 'Home', 'section' => 'Hero', 'label' => 'Hero Fallback', 'fallback' => 'https://images.unsplash.com/photo-1541339907198-e08756dedf3f?q=80&w=2070', 'alt' => 'School campus'];
            }

            // Fallback for educator photos
            if (Str::startsWith($key, 'educators.')) {
                $slug = Str::after($key, 'educators.');
                return ['page' => 'Educators', 'section' => 'Faculty', 'label' => $slug, 'fallback' => $this->facultyFallback($slug), 'alt' => 'Faculty member'];
            }

            // Safe universal fallback so page never crashes with unhandled exception
            return [
                'page' => 'General',
                'section' => 'Default',
                'label' => $key,
                'fallback' => 'images/sliders/carousel-1.jpg',
                'alt' => 'Sunrise English Medium School',
            ];
        }

        return $definition;
    }

    private function facultyFallback(string $slug): string
    {
        $map = [
            'shahida_pathan' => 'images/faculty/Mrs. SHAHIDA ASLAM PATHAN Academic Director.jpeg',
            'prabhakar_benkap' => 'images/faculty/Mr. Prabhakar Benkap Head Master.jpeg',
            'ajay_shinde' => 'images/faculty/Mr Ajay Shinde Secondary Coordinator.jpeg',
            'ajit_ghorpade' => 'images/faculty/Mr. Ajit Ghorpade Primary & LEAD Coordinator.jpeg',
            'supriya_kale' => 'images/faculty/Ms. Supriya Kale Pre-School Coordinator.jpeg',
            'ganesh_devkate' => 'images/faculty/Ganesh Devkate Sport Teacher.jpeg',
            'balu_ranpise' => 'images/faculty/Mr. Balu Ranpise.jpeg',
            'naushad_pathan' => 'images/faculty/Mr. Naushad Pathan.jpeg',
            'dhananjay_altekar' => 'images/faculty/Mr. dhanajay Altekar.jpeg',
            'dipali_satav' => 'images/faculty/Ms. Dipali Satav.jpeg',
            'jyoti_ajetrao' => 'images/faculty/Ms. Jyoti Ajetrao.jpeg',
            'manjusha_nadgauda' => 'images/faculty/Ms. Manjusha Nadgauda.jpeg',
            'monali_anantwar' => 'images/faculty/Ms. Monali Anantwar.jpeg',
            'pranali_kute' => 'images/faculty/Ms. Pranali Kute.jpeg',
            'shital_tanpure' => 'images/faculty/Ms. Shital Tanpure.jpeg',
            'shruti_patil' => 'images/faculty/Ms. Shruti Patil.jpeg',
            'shubhangi_mali' => 'images/faculty/Ms. Shubhangi Mali.jpeg',
            'suvarna_swami' => 'images/faculty/Ms. Suvarna Swami.jpeg',
        ];

        return $map[$slug] ?? 'images/faculty/Mr. Prabhakar Benkap Head Master.jpeg';
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
