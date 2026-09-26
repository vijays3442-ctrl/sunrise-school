<?php

$image = static fn (string $page, string $section, string $label, string $fallback, string $alt): array => compact(
    'page',
    'section',
    'label',
    'fallback',
    'alt',
);

$images = [
    'site.logo' => $image('Global', 'Branding', 'School Logo', 'images/logo.png', 'Sunrise English Medium School'),
    'site.header_top' => $image('Global', 'Decorative Borders', 'Top Cloud Border', 'kider/img/bg-header-top.png', 'Decorative top border'),
    'site.header_bottom' => $image('Global', 'Decorative Borders', 'Bottom Cloud Border', 'kider/img/bg-header-bottom.png', 'Decorative bottom border'),

    'home.hero_fallback_campus' => $image('Home', 'Hero Fallback Slides', 'Campus Slide', 'https://images.unsplash.com/photo-1541339907198-e08756dedf3f?q=80&w=2070', 'School campus'),
    'home.hero_fallback_students' => $image('Home', 'Hero Fallback Slides', 'Students Slide', 'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?q=80&w=2070', 'Students learning'),
    'home.about' => $image('Home', 'About Section', 'About Us Image', 'https://images.unsplash.com/photo-1577896851231-70ef18881754?q=80&w=1000', 'Students in a classroom'),
    'home.admission' => $image('Home', 'Admission Section', 'Admission Image', 'https://images.unsplash.com/photo-1427504494785-3a9ca7044f45?q=80&w=1000', 'Students at school'),
    'home.program_primary' => $image('Home', 'Academic Programs', 'Pre-Primary & Primary', 'https://images.unsplash.com/photo-1523240795612-9a054b0db644?q=80&w=2070', 'Primary students'),
    'home.program_upper_primary' => $image('Home', 'Academic Programs', 'Upper Primary', 'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?q=80&w=2070', 'Upper primary students'),
    'home.program_secondary' => $image('Home', 'Academic Programs', 'Secondary', 'https://images.unsplash.com/photo-1509062522246-3755977927d7?q=80&w=2064', 'Secondary students'),
    'home.appointment' => $image('Home', 'Appointment Section', 'Appointment Image', 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?q=80&w=400&fit=crop', 'School representative'),
    'home.founder' => $image('Home', 'Leadership', 'Founder Portrait', 'kider/img/team-1.jpg', 'School founder'),
    'home.secretary' => $image('Home', 'Leadership', 'Secretary Portrait', 'images/secretary.jpg', 'School secretary'),
    'home.principal' => $image('Home', 'Leadership', 'Principal Portrait', 'kider/img/team-3.jpg', 'School principal'),

    'about.header' => $image('About', 'Page Header', 'Header Background', 'https://images.unsplash.com/photo-1577896851231-70ef18881754?q=80&w=2070', 'School classroom'),
    'about.history' => $image('About', 'School History', 'History Image', 'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?q=80&w=2070', 'School history'),
    'academics.header' => $image('Academics', 'Page Header', 'Header Background', 'https://images.unsplash.com/photo-1503676260728-1c00da094a0b?q=80&w=2022', 'Academic learning'),
    'admissions.header' => $image('Admissions', 'Page Header', 'Header Background', 'https://images.unsplash.com/photo-1577896851231-70ef18881754?q=80&w=2070', 'School admissions'),
    'contact.header' => $image('Contact', 'Page Header', 'Header Background', 'https://images.unsplash.com/photo-1577896851231-70ef18881754?q=80&w=2070', 'Contact the school'),
    'disclosure.header' => $image('Disclosure', 'Page Header', 'Header Background', 'https://images.unsplash.com/photo-1577896851231-70ef18881754?q=80&w=2070', 'School disclosure'),
    'notices.header' => $image('Notices', 'Page Header', 'Header Background', 'https://images.unsplash.com/photo-1577896851231-70ef18881754?q=80&w=2070', 'School notice board'),

    'educators.shahida_pathan' => $image('Educators', 'Faculty', 'Mrs. Shahida Aslam Pathan', 'images/faculty/Mrs. SHAHIDA ASLAM PATHAN Academic Director.jpeg', 'Mrs. Shahida Aslam Pathan'),
    'educators.prabhakar_benkap' => $image('Educators', 'Faculty', 'Mr. Prabhakar Benkap', 'images/faculty/Mr. Prabhakar Benkap Head Master.jpeg', 'Mr. Prabhakar Benkap'),
    'educators.ajay_shinde' => $image('Educators', 'Faculty', 'Mr. Ajay Shinde', 'images/faculty/Mr Ajay Shinde Secondary Coordinator.jpeg', 'Mr. Ajay Shinde'),
    'educators.ajit_ghorpade' => $image('Educators', 'Faculty', 'Mr. Ajit Ghorpade', 'images/faculty/Mr. Ajit Ghorpade Primary & LEAD Coordinator.jpeg', 'Mr. Ajit Ghorpade'),
    'educators.supriya_kale' => $image('Educators', 'Faculty', 'Ms. Supriya Kale', 'images/faculty/Ms. Supriya Kale Pre-School Coordinator.jpeg', 'Ms. Supriya Kale'),
    'educators.ganesh_devkate' => $image('Educators', 'Faculty', 'Mr. Ganesh Devkate', 'images/faculty/Ganesh Devkate Sport Teacher.jpeg', 'Mr. Ganesh Devkate'),
    'educators.balu_ranpise' => $image('Educators', 'Faculty', 'Mr. Balu Ranpise', 'images/faculty/Mr. Balu Ranpise.jpeg', 'Mr. Balu Ranpise'),
    'educators.naushad_pathan' => $image('Educators', 'Faculty', 'Mr. Naushad Pathan', 'images/faculty/Mr. Naushad Pathan.jpeg', 'Mr. Naushad Pathan'),
    'educators.dhananjay_altekar' => $image('Educators', 'Faculty', 'Mr. Dhananjay Altekar', 'images/faculty/Mr. dhanajay Altekar.jpeg', 'Mr. Dhananjay Altekar'),
    'educators.dipali_satav' => $image('Educators', 'Faculty', 'Ms. Dipali Satav', 'images/faculty/Ms. Dipali Satav.jpeg', 'Ms. Dipali Satav'),
    'educators.jyoti_ajetrao' => $image('Educators', 'Faculty', 'Ms. Jyoti Ajetrao', 'images/faculty/Ms. Jyoti Ajetrao.jpeg', 'Ms. Jyoti Ajetrao'),
    'educators.manjusha_nadgauda' => $image('Educators', 'Faculty', 'Ms. Manjusha Nadgauda', 'images/faculty/Ms. Manjusha Nadgauda.jpeg', 'Ms. Manjusha Nadgauda'),
    'educators.monali_anantwar' => $image('Educators', 'Faculty', 'Ms. Monali Anantwar', 'images/faculty/Ms. Monali Anantwar.jpeg', 'Ms. Monali Anantwar'),
    'educators.pranali_kute' => $image('Educators', 'Faculty', 'Ms. Pranali Kute', 'images/faculty/Ms. Pranali Kute.jpeg', 'Ms. Pranali Kute'),
    'educators.shital_tanpure' => $image('Educators', 'Faculty', 'Ms. Shital Tanpure', 'images/faculty/Ms. Shital Tanpure.jpeg', 'Ms. Shital Tanpure'),
    'educators.shruti_patil' => $image('Educators', 'Faculty', 'Ms. Shruti Patil', 'images/faculty/Ms. Shruti Patil.jpeg', 'Ms. Shruti Patil'),
    'educators.shubhangi_mali' => $image('Educators', 'Faculty', 'Ms. Shubhangi Mali', 'images/faculty/Ms. Shubhangi Mali.jpeg', 'Ms. Shubhangi Mali'),
    'educators.suvarna_swami' => $image('Educators', 'Faculty', 'Ms. Suvarna Swami', 'images/faculty/Ms. Suvarna Swami.jpeg', 'Ms. Suvarna Swami'),
];

$siteContent = require __DIR__.'/site_content.php';

foreach ($siteContent as $sectionKey => $section) {
    $pageLabel = $section['label'];
    $images["content.{$sectionKey}.overview"] = $image(
        $pageLabel,
        'Overview Page',
        "{$pageLabel} Header",
        $section['fallback'],
        $pageLabel,
    );

    foreach ($section['pages'] as $slug => $page) {
        $images["content.{$sectionKey}.{$slug}"] = $image(
            $pageLabel,
            'Submenu Pages',
            "{$page['title']} Header",
            $section['fallback'],
            $page['title'],
        );
    }
}

return $images;
