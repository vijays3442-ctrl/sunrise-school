<?php

$image = static fn (string $page, string $section, string $label, string $fallback, string $alt): array => compact(
    'page',
    'section',
    'label',
    'fallback',
    'alt',
);

return [
    // 1. School Branding
    'site.logo' => $image('Global', 'Branding', 'School Official Logo', 'images/logo.png', 'Sunrise English Medium School'),

    // 2. Home Page Main Sections & Content
    'home.about' => $image('Home', 'About Section', 'About Section Image', 'https://images.unsplash.com/photo-1577896851231-70ef18881754?q=80&w=1000', 'Students in a classroom'),
    'home.admission' => $image('Home', 'Admission Section', 'Admission Section Image', 'https://images.unsplash.com/photo-1427504494785-3a9ca7044f45?q=80&w=1000', 'Students at school'),
    'home.appointment' => $image('Home', 'Appointment Section', 'Appointment Section Image', 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?q=80&w=400&fit=crop', 'School representative'),
    'home.program_primary' => $image('Home', 'Academic Programs', 'Pre-Primary & Primary Program', 'https://images.unsplash.com/photo-1523240795612-9a054b0db644?q=80&w=2070', 'Primary students'),
    'home.program_upper_primary' => $image('Home', 'Academic Programs', 'Upper Primary Program', 'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?q=80&w=2070', 'Upper primary students'),
    'home.program_secondary' => $image('Home', 'Academic Programs', 'Secondary Program', 'https://images.unsplash.com/photo-1509062522246-3755977927d7?q=80&w=2064', 'Secondary students'),

    // 3. Home Page Visionaries (Founder, Secretary, Principal)
    'home.founder' => $image('Home', 'Leadership', 'Founder Portrait (Mr. Yogesh Bobade)', 'images/leadership/chairman.jpeg', 'Mr. Yogesh Bobade - Founder'),
    'home.secretary' => $image('Home', 'Leadership', 'Secretary Portrait (Mrs. Suruja Yogesh Bobade)', 'images/leadership/secretary.jpg', 'Mrs. Suruja Yogesh Bobade - Secretary'),
    'home.principal' => $image('Home', 'Leadership', 'Principal Portrait (Mrs. Shahida Aslam Pathan)', 'images/leadership/director.jpeg', 'Mrs. Shahida Aslam Pathan - Principal'),

    // 4. Main Page Header Banners
    'about.header' => $image('About', 'Page Header', 'About Page Banner Header', 'https://images.unsplash.com/photo-1577896851231-70ef18881754?q=80&w=2070', 'School classroom'),
    'about.history' => $image('About', 'School History', 'School History Image', 'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?q=80&w=2070', 'School history'),
    'academics.header' => $image('Academics', 'Page Header', 'Academics Page Banner Header', 'https://images.unsplash.com/photo-1503676260728-1c00da094a0b?q=80&w=2022', 'Academic learning'),
    'admissions.header' => $image('Admissions', 'Page Header', 'Admissions Page Banner Header', 'https://images.unsplash.com/photo-1577896851231-70ef18881754?q=80&w=2070', 'School admissions'),
    'contact.header' => $image('Contact', 'Page Header', 'Contact Page Banner Header', 'https://images.unsplash.com/photo-1577896851231-70ef18881754?q=80&w=2070', 'Contact the school'),
    'notices.header' => $image('Notices', 'Page Header', 'Notices Page Banner Header', 'https://images.unsplash.com/photo-1577896851231-70ef18881754?q=80&w=2070', 'School notice board'),

    // 5. Major Section Overview Headers
    'content.about.overview' => $image('About', 'Overview Page', 'About Header Banner', 'https://images.unsplash.com/photo-1577896851231-70ef18881754?q=80&w=2070', 'About Us'),
    'content.academics.overview' => $image('Academics', 'Overview Page', 'Academics Header Banner', 'https://images.unsplash.com/photo-1503676260728-1c00da094a0b?q=80&w=2022', 'Academics'),
    'content.admissions.overview' => $image('Admissions', 'Overview Page', 'Admissions Header Banner', 'https://images.unsplash.com/photo-1577896851231-70ef18881754?q=80&w=2070', 'School admissions'),
    'content.facilities.overview' => $image('Facilities', 'Overview Page', 'Facilities Header Banner', 'https://images.unsplash.com/photo-1562774053-701939374585?q=80&w=2086', 'Facilities'),
    'content.educators.overview' => $image('Educators', 'Overview Page', 'Educators Header Banner', 'https://images.unsplash.com/photo-1524178232363-1fb2b075b655?q=80&w=2070', 'Educators'),
    'content.student-enrichment.overview' => $image('Student Enrichment', 'Overview Page', 'Student Enrichment Header Banner', 'https://images.unsplash.com/photo-1509062522246-3755977927d7?q=80&w=2064', 'Student Enrichment'),
    'content.information.overview' => $image('Information', 'Overview Page', 'Information Header Banner', 'https://images.unsplash.com/photo-1497633762265-9d179a990aa6?q=80&w=2073', 'Information'),
    'content.disclosure.overview' => $image('Mandatory Disclosure', 'Overview Page', 'Mandatory Disclosure Header Banner', 'https://images.unsplash.com/photo-1450133064473-71024230f91b?q=80&w=2070', 'Mandatory Disclosure'),
];
