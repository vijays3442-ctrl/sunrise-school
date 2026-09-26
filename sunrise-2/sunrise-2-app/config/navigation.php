<?php

$page = static fn (string $label, string $section, string $slug, ?string $group = null): array => array_filter([
    'label' => $label,
    'route' => 'site.page',
    'parameters' => ['section' => $section, 'slug' => $slug],
    'group' => $group,
]);

$route = static fn (string $label, string $name, ?string $group = null): array => array_filter([
    'label' => $label,
    'route' => $name,
    'group' => $group,
]);

$disclosure = [
    'label' => 'Mandatory Disclosure',
    'route' => 'disclosure',
    'match' => 'disclosure*',
    'children' => [
        $page('General Information', 'disclosure', 'general-information'),
        $page('Documents & Certificates', 'disclosure', 'documents-certificates'),
        $page('Results & Academics', 'disclosure', 'results-academics'),
        $page('Staff & Infrastructure', 'disclosure', 'staff-infrastructure'),
    ],
];

return [
    'primary' => [
        [
            'label' => 'Home',
            'route' => 'home',
            'match' => '/',
        ],
        [
            'label' => 'About Us',
            'route' => 'about',
            'match' => 'about*',
            'columns' => 2,
            'children' => [
                $page('Vision, Mission & Values', 'about', 'vision-mission-values'),
                $page("Chairman's Message", 'about', 'chairman-message'),
                $page("Secretary's Message", 'about', 'secretary-message'),
                $page('Management Committee', 'about', 'management-committee'),
                $page("Principal's Welcome", 'about', 'principal-welcome'),
                $page('School History', 'about', 'school-history'),
                $page('Campus', 'about', 'campus'),
            ],
        ],
        $disclosure,
        [
            'label' => 'Academics',
            'route' => 'academics',
            'match' => 'academics*',
            'columns' => 1,
            'children' => [
                $route('Academic Overview', 'academics'),
                $page('Foundational Stage', 'academics', 'foundational-stage'),
                $page('Preparatory Stage', 'academics', 'preparatory-stage'),
                $page('Middle Stage', 'academics', 'middle-stage'),
                $page('Secondary Stage', 'academics', 'secondary-stage'),
            ],
        ],
        [
            'label' => 'Admissions',
            'route' => 'admissions',
            'match' => 'admissions*',
            'columns' => 2,
            'children' => [
                $page('Admission Process', 'admissions', 'admission-process'),
                $page('Eligibility', 'admissions', 'eligibility'),
                $page('Fee Structure', 'admissions', 'fee-structure'),
                $page('Documents Required', 'admissions', 'documents-required'),
                $page('Online Enquiry', 'admissions', 'online-enquiry'),
                $page('Download Prospectus', 'admissions', 'download-prospectus'),
                $page('FAQs', 'admissions', 'faqs'),
            ],
        ],
        [
            'label' => 'Facilities',
            'route' => 'site.section',
            'parameters' => ['section' => 'facilities'],
            'match' => 'facilities*',
            'columns' => 3,
            'children' => [
                $page('STEM Lab', 'facilities', 'stem-lab', 'Learning'),
                $page('Library', 'facilities', 'library', 'Learning'),
                $page('Transport', 'facilities', 'transport', 'Safety & Support'),
                $page('CCTV & Campus Safety', 'facilities', 'cctv', 'Safety & Support'),
                $page('Medical Support', 'facilities', 'medical', 'Safety & Support'),
                $page('Hostel', 'facilities', 'hostel', 'Safety & Support'),
                $page('Sports', 'facilities', 'sports', 'Activities'),
            ],
        ],
        [
            'label' => 'Educators',
            'route' => 'educators',
            'match' => 'educators*',
            'columns' => 2,
            'children' => [
                $route('Faculty Overview', 'educators'),
                $page('Foundational School', 'educators', 'foundational-school'),
                $page('Preparatory School', 'educators', 'preparatory-school'),
                $page('Middle School', 'educators', 'middle-school'),
                $page('Secondary School', 'educators', 'secondary-school'),
                $page('Arts, Music, Dance & Drama', 'educators', 'arts-music-dance-drama'),
                $page('Sports, Yoga & Technology', 'educators', 'sports-yoga-technology'),
            ],
        ],
        [
            'label' => 'Student Enrichment',
            'route' => 'site.section',
            'parameters' => ['section' => 'student-enrichment'],
            'match' => 'student-enrichment*',
            'columns' => 3,
            'children' => [
                $page('Remedial Support', 'student-enrichment', 'remedial', 'Student Support'),
                $page('Counselling', 'student-enrichment', 'counselling', 'Student Support'),
                $page('Career Guidance', 'student-enrichment', 'career-guidance', 'Student Support'),
                $page('Scholarship Preparation', 'student-enrichment', 'scholarship', 'Competitive Programmes'),
                $page('Olympiad Preparation', 'student-enrichment', 'olympiad', 'Competitive Programmes'),
                $page('Competitive Exams', 'student-enrichment', 'competitive-exams', 'Competitive Programmes'),
                $page('Foundation Programme', 'student-enrichment', 'foundation', 'Competitive Programmes'),
                $page('NEET / JEE / CET', 'student-enrichment', 'neet-jee-cet', 'Competitive Programmes'),
                $page('Artificial Intelligence', 'student-enrichment', 'artificial-intelligence', 'Technology'),
                $page('Robotics', 'student-enrichment', 'robotics', 'Technology'),
                $page('Machine Learning', 'student-enrichment', 'machine-learning', 'Technology'),
                $page('Computer Coding', 'student-enrichment', 'computer-coding', 'Technology'),
            ],
        ],
        [
            'label' => 'Information',
            'route' => 'site.section',
            'parameters' => ['section' => 'information'],
            'match' => 'information*|notices*|gallery*',
            'columns' => 2,
            'children' => [
                $route('Notices', 'notices.index'),
                $page('School News', 'information', 'news'),
                $page('Announcements', 'information', 'announcements'),
                $page('Upcoming Events', 'information', 'upcoming-events'),
                $page('Achievements', 'information', 'achievements'),
                $route('Photo Gallery', 'gallery'),
            ],
        ],
    ],
    'utility' => [
        $route('Notices', 'notices.index'),
        $route('Gallery', 'gallery'),
    ],
    'disclosure' => $disclosure,
    'cta' => $page('Admission Enquiry', 'admissions', 'online-enquiry'),
];
