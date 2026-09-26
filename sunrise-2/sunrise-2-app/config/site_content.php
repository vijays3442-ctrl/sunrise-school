<?php

$page = static function (
    string $title,
    string $summary,
    string $icon,
    array $details = [],
    array $highlights = [],
    ?string $intro = null,
    ?string $note = null,
): array {
    return [
        'title' => $title,
        'summary' => $summary,
        'icon' => $icon,
        'details' => $details,
        'highlights' => $highlights,
        'intro' => $intro ?: "This page presents Sunrise English Medium School's approach to {$title} and the support available to every learner.",
        'note' => $note,
    ];
};

$sections = [
    'about' => [
        'label' => 'About Us',
        'summary' => 'Know our purpose, leadership, journey and learning environment.',
        'icon' => 'fa-school',
        'fallback' => 'https://images.unsplash.com/photo-1577896851231-70ef18881754?q=80&w=2070',
        'pages' => [
            'vision-mission-values' => $page(
                'Vision, Mission & Values',
                'The principles that guide learning, relationships and school life at Sunrise.',
                'fa-compass',
                ['Vision' => 'Confident, compassionate and capable lifelong learners.', 'Mission' => 'A safe, engaging and values-led CBSE learning environment.', 'Values' => 'Integrity, respect, curiosity, responsibility and excellence.'],
                ['Child-centred learning' => 'Every learner is known, supported and encouraged.', 'Strong character' => 'Values are practised through everyday choices and relationships.', 'Future readiness' => 'Communication, creativity and problem solving complement academics.'],
            ),
            'chairman-message' => $page(
                "Chairman's Message",
                'A message on the purpose of education and the school’s commitment to families.',
                'fa-user-tie',
                [],
                ['Purpose before marks' => 'Education should develop character as well as academic confidence.', 'Partnership' => 'School and family progress is strongest when both work together.', 'Opportunity' => 'Every child deserves the support and opportunity to grow.'],
                'Our institution was founded with the belief that quality education can transform children, families and communities. Sunrise continues to invest in responsible teaching, thoughtful guidance and meaningful learning experiences.',
            ),
            'secretary-message' => $page(
                "Secretary's Message",
                'A commitment to consistent systems, student welfare and continuous improvement.',
                'fa-user-pen',
                [],
                ['Transparent administration' => 'Clear communication and dependable processes for families.', 'Student welfare' => 'Safety, dignity and wellbeing remain central to decisions.', 'Continuous improvement' => 'Facilities, teaching practices and programmes evolve with learner needs.'],
            ),
            'management-committee' => $page(
                'Management Committee',
                'The governance structure supporting accountability and school development.',
                'fa-people-group',
                ['Role' => 'Governance, policy direction and institutional oversight.', 'Focus' => 'Student welfare, academic standards, compliance and responsible growth.'],
                ['Governance' => 'Review policies, priorities and statutory responsibilities.', 'Academic support' => 'Enable school leadership to maintain teaching standards.', 'Community partnership' => 'Represent the long-term interests of students and families.'],
                null,
                'The current committee list and statutory records are published in the Mandatory Public Disclosure section.',
            ),
            'principal-welcome' => $page(
                "Principal's Welcome",
                'A warm introduction to the culture of learning and care at Sunrise.',
                'fa-chalkboard-user',
                [],
                ['Belonging' => 'A respectful environment where children feel safe to participate.', 'Learning' => 'Clear foundations, active exploration and purposeful practice.', 'Growth' => 'Academic, social, emotional and physical development are connected.'],
                'Welcome to Sunrise English Medium School. We believe children flourish when high expectations are matched with encouragement, thoughtful teaching and genuine care.',
            ),
            'school-history' => $page(
                'School History',
                'The journey, purpose and milestones that have shaped Sunrise.',
                'fa-landmark',
                ['Affiliation' => 'CBSE Affiliation No. 1131023', 'Location' => 'Nagorli Road, Tembhurni, Solapur'],
                ['A clear purpose' => 'The school began with a commitment to accessible, values-led English-medium education.', 'Steady development' => 'Programmes and facilities have grown in response to learner needs.', 'Community trust' => 'Families and educators continue to shape the Sunrise journey together.'],
            ),
            'campus' => $page(
                'Campus',
                'A secure and welcoming environment designed for learning, play and participation.',
                'fa-building-columns',
                [],
                ['Learning spaces' => 'Classrooms and activity areas support focused and collaborative work.', 'Student safety' => 'Supervision and clear routines support a secure school day.', 'Active campus' => 'Indoor and outdoor spaces encourage exploration, creativity and movement.'],
            ),
        ],
    ],
    'academics' => [
        'label' => 'Academics',
        'summary' => 'A coherent CBSE learning journey aligned with the stages of NEP 2020.',
        'icon' => 'fa-book-open-reader',
        'fallback' => 'https://images.unsplash.com/photo-1503676260728-1c00da094a0b?q=80&w=2070',
        'pages' => [],
    ],
    'admissions' => [
        'label' => 'Admissions',
        'summary' => 'Clear guidance for families considering Sunrise.',
        'icon' => 'fa-file-signature',
        'fallback' => 'https://images.unsplash.com/photo-1427504494785-3a9ca7044f45?q=80&w=2070',
        'pages' => [],
    ],
    'facilities' => [
        'label' => 'Facilities',
        'summary' => 'Spaces and services that support safe, practical and joyful learning.',
        'icon' => 'fa-building',
        'fallback' => 'https://images.unsplash.com/photo-1562774053-701939374585?q=80&w=2070',
        'pages' => [],
    ],
    'educators' => [
        'label' => 'Educators',
        'summary' => 'Meet the teams guiding learners through every developmental stage.',
        'icon' => 'fa-people-roof',
        'fallback' => 'https://images.unsplash.com/photo-1544717305-2782549b5136?q=80&w=2070',
        'pages' => [],
    ],
    'student-enrichment' => [
        'label' => 'Student Enrichment',
        'summary' => 'Targeted support, advanced opportunities and future-ready experiences.',
        'icon' => 'fa-seedling',
        'fallback' => 'https://images.unsplash.com/photo-1509062522246-3755977927d7?q=80&w=2070',
        'pages' => [],
    ],
    'information' => [
        'label' => 'Information',
        'summary' => 'Current school news, announcements, events and achievements.',
        'icon' => 'fa-circle-info',
        'fallback' => 'https://images.unsplash.com/photo-1457369804613-52c61a468e7d?q=80&w=2070',
        'pages' => [],
    ],
    'disclosure' => [
        'label' => 'Mandatory Disclosure',
        'summary' => 'CBSE-required school information, documents and institutional records.',
        'icon' => 'fa-file-shield',
        'fallback' => 'https://images.unsplash.com/photo-1450101499163-c8848c66ca85?q=80&w=2070',
        'pages' => [],
    ],
];

$academicStages = [
    'foundational-stage' => ['Foundational Stage', '3–8 years', 'Nursery to Grade 2', 'Play, discovery, language, early numeracy and wellbeing', 'Play-based, activity-based and multi-sensory learning', 'fa-shapes'],
    'preparatory-stage' => ['Preparatory Stage', '8–11 years', 'Grades 3 to 5', 'Reading fluency, conceptual understanding and confident expression', 'Interactive classroom learning with projects and exploration', 'fa-puzzle-piece'],
    'middle-stage' => ['Middle Stage', '11–14 years', 'Grades 6 to 8', 'Subject depth, analysis, collaboration and practical application', 'Experiential learning across sciences, mathematics, languages, arts and social studies', 'fa-microscope'],
    'secondary-stage' => ['Secondary Stage', '14–18 years', 'Grades 9 to 12', 'Academic rigour, choice, board readiness and career awareness', 'Discussion, investigation, application and structured assessment', 'fa-graduation-cap'],
];

foreach ($academicStages as $slug => [$title, $age, $classes, $focus, $curriculum, $icon]) {
    $sections['academics']['pages'][$slug] = $page(
        $title,
        "A stage-specific learning programme for {$classes}.",
        $icon,
        ['Age' => $age, 'Classes' => $classes, 'Focus' => $focus, 'Curriculum' => $curriculum],
        ['Strong foundations' => 'Lessons connect prior understanding with age-appropriate challenges.', 'Active learning' => 'Students learn through discussion, activities, practice and reflection.', 'Progress monitoring' => 'Teachers use regular feedback to identify support and extension needs.'],
    );
}

$sections['admissions']['pages'] = [
    'admission-process' => $page('Admission Process', 'A simple step-by-step path from enquiry to confirmed admission.', 'fa-list-check', ['Step 1' => 'Enquiry and school interaction', 'Step 2' => 'Application submission', 'Step 3' => 'Age-appropriate interaction or assessment', 'Step 4' => 'Document verification and fee confirmation'], ['Speak with us' => 'Discuss the class, availability and learner needs.', 'Submit details' => 'Complete the prescribed application with accurate information.', 'Confirmation' => 'The office communicates the next steps after review.']),
    'eligibility' => $page('Eligibility', 'Age, previous schooling and class-readiness guidance for applicants.', 'fa-user-check', [], ['Age criteria' => 'Admission follows applicable age guidelines for the requested class.', 'Previous records' => 'Transfer cases require the relevant previous-school documents.', 'Availability' => 'Admission is subject to seats and completion of the school process.'], null, 'Please confirm current session-specific age cut-offs and seat availability with the admissions office.'),
    'fee-structure' => $page('Fee Structure', 'Access class-wise fee information and payment guidance.', 'fa-indian-rupee-sign', [], ['Transparent information' => 'Applicable fee components are communicated before admission confirmation.', 'Payment schedule' => 'The office provides current instalment dates and accepted payment methods.', 'Official receipts' => 'Payments should be made only through approved school channels.'], null, 'For the latest approved fee schedule, use the published disclosure documents or contact the school office.'),
    'documents-required' => $page('Documents Required', 'Prepare the records normally requested during admission.', 'fa-folder-open', [], ['Student records' => 'Birth certificate, identity details and recent photographs.', 'Previous school' => 'Report card and Leaving/Transfer Certificate where applicable.', 'Parent records' => 'Parent or guardian identity, address and contact information.', 'Additional documents' => 'Category or statutory documents where applicable.']),
    'online-enquiry' => $page('Online Enquiry', 'Start a conversation with the admissions team.', 'fa-comments', ['Phone' => '+91 9767644720', 'Email' => 'Hmsunrisegurukul@gmail.com', 'Campus' => 'Nagorli Road, Tembhurni, Solapur – 413211'], ['Share learner details' => 'Tell us the child’s name, age and class of interest.', 'Ask questions' => 'Clarify curriculum, facilities, transport and the admission timeline.', 'Plan a visit' => 'Request a convenient time to meet the school team.'], null, 'Use the Contact page to send your enquiry or call the admissions office during school hours.'),
    'download-prospectus' => $page('Download Prospectus', 'Find programme information and request the current school prospectus.', 'fa-file-arrow-down', [], ['School overview' => 'Learn about the educational approach and student experience.', 'Programme details' => 'Review academic stages, facilities and enrichment opportunities.', 'Admissions guidance' => 'Understand the process and documents before applying.'], null, 'The current-session prospectus will be published here after approval. Contact the admissions office for the latest copy.'),
    'faqs' => $page('Admission FAQs', 'Quick answers to common questions from prospective families.', 'fa-circle-question', [], ['When should we enquire?' => 'Early enquiry is recommended because availability varies by class.', 'Is an interaction required?' => 'The school may arrange an age-appropriate interaction or assessment.', 'Can we visit the campus?' => 'Yes. Contact the office to arrange a suitable visit.', 'Where are current fees published?' => 'Use the Fee Structure page and Mandatory Disclosure documents.']),
];

$facilities = [
    'stem-lab' => ['STEM Lab', 'Hands-on exploration of science, technology, engineering and mathematics.', 'fa-flask-vial', ['Experiments' => 'Structured activities connect classroom concepts with observation.', 'Design thinking' => 'Students identify problems, build ideas and improve solutions.', 'Collaboration' => 'Team tasks strengthen communication and practical reasoning.']],
    'library' => ['Library', 'A reading and research environment that encourages independent discovery.', 'fa-book', ['Reading culture' => 'Age-appropriate literature supports language and imagination.', 'Reference skills' => 'Students learn to locate, compare and use information responsibly.', 'Quiet learning' => 'A focused setting supports reading and self-directed study.']],
    'transport' => ['Transport', 'Coordinated school transport information for eligible routes.', 'fa-bus-school', ['Route planning' => 'Routes and stops are communicated for each academic session.', 'Supervision' => 'Clear boarding and dispersal routines support student safety.', 'Communication' => 'Families receive applicable timing and contact guidance.']],
    'cctv' => ['CCTV & Campus Safety', 'Safety systems and responsible supervision across key campus areas.', 'fa-video', ['Monitored areas' => 'Coverage supports supervision in identified common spaces.', 'Controlled access' => 'Visitor and student-movement procedures support campus safety.', 'Responsible use' => 'Security systems are operated with appropriate privacy safeguards.']],
    'medical' => ['Medical Support', 'First-response support and health-conscious school routines.', 'fa-kit-medical', ['First aid' => 'Basic first-response resources are available for minor incidents.', 'Parent communication' => 'Families are contacted when further care or collection is needed.', 'Wellbeing awareness' => 'Age-appropriate health, hygiene and safety habits are reinforced.']],
    'hostel' => ['Hostel', 'Information for families enquiring about residential support.', 'fa-bed', ['Availability' => 'Current residential availability must be confirmed with the office.', 'Care' => 'Student routines should balance safety, study, rest and wellbeing.', 'Family guidance' => 'Rules, fees and required items are shared before enrolment.']],
    'sports' => ['Sports', 'Physical education, teamwork and active participation for healthy growth.', 'fa-medal', ['Physical fitness' => 'Regular activity supports strength, coordination and endurance.', 'Team spirit' => 'Games teach cooperation, resilience and fair play.', 'Participation' => 'Students are encouraged to explore activities suited to their interests.']],
];

foreach ($facilities as $slug => [$title, $summary, $icon, $highlights]) {
    $sections['facilities']['pages'][$slug] = $page($title, $summary, $icon, [], $highlights);
}

$educatorGroups = [
    'foundational-school' => ['Foundational School Educators', 'Nursery to Grade 2', 'Early language, numeracy, play and wellbeing', 'fa-child-reaching'],
    'preparatory-school' => ['Preparatory School Educators', 'Grades 3 to 5', 'Concept building, expression and learning confidence', 'fa-person-chalkboard'],
    'middle-school' => ['Middle School Educators', 'Grades 6 to 8', 'Subject understanding, inquiry and application', 'fa-book-open'],
    'secondary-school' => ['Secondary School Educators', 'Grades 9 to 10', 'Academic depth, assessment readiness and guidance', 'fa-graduation-cap'],
    'arts-music-dance-drama' => ['Arts, Music, Dance & Drama', 'Co-curricular learning', 'Creativity, performance, expression and cultural appreciation', 'fa-masks-theater'],
    'sports-yoga-technology' => ['Sports, Yoga & Technology', 'Specialist learning', 'Fitness, mindfulness, digital confidence and practical skills', 'fa-laptop-code'],
];

foreach ($educatorGroups as $slug => [$title, $classes, $focus, $icon]) {
    $sections['educators']['pages'][$slug] = $page(
        $title,
        "Meet the teaching team supporting {$classes}.",
        $icon,
        ['Learning group' => $classes, 'Primary focus' => $focus],
        ['Learner relationships' => 'Teachers create respectful classrooms where students can ask and contribute.', 'Responsive teaching' => 'Planning considers readiness, progress and individual support.', 'Family partnership' => 'Constructive communication connects classroom learning with home support.'],
    );
}

$enrichmentPages = [
    'remedial' => ['Remedial Support', 'Focused help for learners who need more time, practice or a different explanation.', 'fa-hands-holding-child', 'Student Support'],
    'counselling' => ['Counselling', 'Age-appropriate guidance supporting emotional wellbeing and responsible choices.', 'fa-heart', 'Student Support'],
    'career-guidance' => ['Career Guidance', 'Structured awareness of strengths, study pathways and future possibilities.', 'fa-route', 'Student Support'],
    'scholarship' => ['Scholarship Preparation', 'Guidance for identifying and preparing for suitable scholarship opportunities.', 'fa-award', 'Competitive Programmes'],
    'olympiad' => ['Olympiad Preparation', 'Challenge and practice for subject-focused Olympiad participation.', 'fa-trophy', 'Competitive Programmes'],
    'competitive-exams' => ['Competitive Exam Preparation', 'Foundation skills, habits and strategies for competitive assessments.', 'fa-ranking-star', 'Competitive Programmes'],
    'foundation' => ['Foundation Programme', 'Strong conceptual preparation connecting school learning with future pathways.', 'fa-layer-group', 'Competitive Programmes'],
    'neet-jee-cet' => ['NEET / JEE / CET Orientation', 'Early awareness and foundation planning for major entrance examinations.', 'fa-atom', 'Competitive Programmes'],
    'artificial-intelligence' => ['Artificial Intelligence', 'An accessible introduction to data, intelligent systems and responsible AI use.', 'fa-brain', 'Technology'],
    'robotics' => ['Robotics', 'Build-and-test activities combining mechanics, electronics and coding.', 'fa-robot', 'Technology'],
    'machine-learning' => ['Machine Learning', 'Age-appropriate exploration of patterns, data and model-based problem solving.', 'fa-diagram-project', 'Technology'],
    'computer-coding' => ['Computer Coding', 'Logical thinking and creative problem solving through programming.', 'fa-code', 'Technology'],
];

foreach ($enrichmentPages as $slug => [$title, $summary, $icon, $group]) {
    $sections['student-enrichment']['pages'][$slug] = $page(
        $title,
        $summary,
        $icon,
        ['Programme group' => $group],
        ['Discover' => 'Introduce the purpose, language and possibilities of the programme.', 'Practise' => 'Develop confidence through guided, age-appropriate activities.', 'Apply' => 'Use learning in projects, challenges or real-world situations.'],
    ) + ['group' => $group];
}

$sections['information']['pages'] = [
    'news' => $page('School News', 'Stories and updates from across the Sunrise community.', 'fa-newspaper', [], ['Campus updates' => 'Important developments from school life.', 'Student stories' => 'Learning experiences, participation and community contribution.', 'Programme updates' => 'Highlights from academic and enrichment initiatives.'], null, 'Published news items will appear here as they are approved.'),
    'announcements' => $page('Announcements', 'Important operational and academic messages for families.', 'fa-bullhorn', [], ['Academic updates' => 'Schedules, assessments and programme information.', 'Administrative messages' => 'Office notices, required actions and deadline reminders.', 'Timely communication' => 'Check this page regularly for current information.'], null, 'Official announcements will appear here as they are approved.'),
    'upcoming-events' => $page('Upcoming Events', 'A forward look at school programmes, activities and important dates.', 'fa-calendar-days', [], ['Academic events' => 'Exhibitions, orientations and learning celebrations.', 'Community events' => 'Meetings and opportunities for family participation.', 'Student activities' => 'Sports, arts, competitions and special programmes.'], null, 'Confirmed event dates and participation details will be published here.'),
    'achievements' => $page('Achievements', 'Celebrating student effort, progress and participation.', 'fa-trophy', [], ['Academic' => 'Recognition for learning progress and academic performance.', 'Sports and arts' => 'Celebrating participation, teamwork and creative expression.', 'Community' => 'Acknowledging leadership, service and positive contribution.']),
];

$sections['disclosure']['pages'] = [
'general-information' => $page('General Information', 'Core CBSE affiliation, contact and institutional information.', 'fa-circle-info', ['CBSE Affiliation No.' => '1131023', 'School Code' => '30991', 'Address' => 'Nagorli Road, Tembhurni, Solapur – 413211'], ['School identity' => 'Official name, affiliation and school code.', 'Leadership' => 'Principal and institutional contact details.', 'Contact' => 'Address, email and telephone information.'], null, 'Use the complete Mandatory Public Disclosure page for the official table.'),
    'documents-certificates' => $page('Documents & Certificates', 'Access statutory certificates and required school documents.', 'fa-file-circle-check', [], ['Recognition' => 'Affiliation and recognition records.', 'Safety' => 'Applicable building, fire, water, health and sanitation records.', 'Governance' => 'Trust or society registration and related documents.'], null, 'Available documents are linked from the complete Mandatory Public Disclosure page.'),
    'results-academics' => $page('Results & Academics', 'Academic calendar, fee documents, committee lists and result information.', 'fa-square-poll-vertical', [], ['Fees' => 'Published class-wise fee documents.', 'Academic records' => 'Calendar and applicable board-result information.', 'Committees' => 'School Management Committee and Parent Teacher Association records.'], null, 'Use the complete Mandatory Public Disclosure page to open published files.'),
    'staff-infrastructure' => $page('Staff & Infrastructure', 'Required staffing and campus-infrastructure information.', 'fa-people-roof', [], ['Teaching staff' => 'Published counts and required staff information.', 'Student support' => 'Special educator and counsellor information.', 'Infrastructure' => 'Campus, classroom, laboratory and digital-facility details.'], null, 'Use the complete Mandatory Public Disclosure page for the current official figures.'),
];

return $sections;
