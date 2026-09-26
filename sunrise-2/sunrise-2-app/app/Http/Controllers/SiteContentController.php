<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use Illuminate\View\View;

class SiteContentController extends Controller
{
    public function index(string $section): View
    {
        $sectionData = $this->section($section);

        return view('site-content.index', [
            'sectionKey' => $section,
            'section' => $sectionData,
        ]);
    }

    public function show(string $section, string $slug): View
    {
        $sectionData = $this->section($section);
        $page = $sectionData['pages'][$slug] ?? null;

        abort_if($page === null, 404);

        $records = collect();
        if ($section === 'information' && $slug === 'achievements') {
            $records = Achievement::query()
                ->where('is_active', true)
                ->orderBy('sort_order')
                ->get();
        }

        return view('site-content.show', [
            'sectionKey' => $section,
            'section' => $sectionData,
            'slug' => $slug,
            'page' => $page,
            'records' => $records,
        ]);
    }

    private function section(string $section): array
    {
        $sectionData = config("site_content.{$section}");

        abort_if($sectionData === null, 404);

        return $sectionData;
    }
}
