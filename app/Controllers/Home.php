<?php

namespace App\Controllers;

use App\Models\ActivityModel;
use App\Models\CategoryModel;
use CodeIgniter\Exceptions\PageNotFoundException;
use DateTime;

class Home extends BaseController
{
    private array $defaultCategories = [
        ['id' => 1, 'name' => 'All', 'slug' => 'all', 'icon' => 'ALL'],
        ['id' => 2, 'name' => 'Tennis', 'slug' => 'tennis', 'icon' => 'TN'],
        ['id' => 3, 'name' => 'Yoga', 'slug' => 'yoga', 'icon' => 'YG'],
        ['id' => 4, 'name' => 'Climbing', 'slug' => 'climbing', 'icon' => 'CL'],
        ['id' => 5, 'name' => 'Padel', 'slug' => 'padel', 'icon' => 'PD'],
        ['id' => 6, 'name' => 'Softball', 'slug' => 'softball', 'icon' => 'SB'],
        ['id' => 7, 'name' => 'Workout', 'slug' => 'workout', 'icon' => 'WO'],
        ['id' => 8, 'name' => 'Cycling', 'slug' => 'cycling', 'icon' => 'CY'],
        ['id' => 9, 'name' => 'Badminton', 'slug' => 'badminton', 'icon' => 'BD'],
        ['id' => 10, 'name' => 'Running', 'slug' => 'running', 'icon' => 'RN'],
        ['id' => 11, 'name' => 'Pilates', 'slug' => 'pilates', 'icon' => 'PL'],
        ['id' => 12, 'name' => 'Squash', 'slug' => 'squash', 'icon' => 'SQ'],
        ['id' => 13, 'name' => 'Art', 'slug' => 'art', 'icon' => 'AR'],
        ['id' => 14, 'name' => 'Travel', 'slug' => 'travel', 'icon' => 'TR'],
        ['id' => 15, 'name' => 'Music', 'slug' => 'music', 'icon' => 'MS'],
        ['id' => 16, 'name' => 'Social', 'slug' => 'social', 'icon' => 'SC'],
        ['id' => 17, 'name' => 'Others', 'slug' => 'others', 'icon' => 'OT'],
        ['id' => 18, 'name' => 'Service', 'slug' => 'service', 'icon' => 'SV'],
    ];

    public function index()
    {
        return view('pages/home', $this->feedData('Activities near', 'Your location', 'home'));
    }

    public function following()
    {
        $data = $this->feedData('Activities from', 'Following', 'following');
        $data['activities'] = [];

        return view('pages/following', $data);
    }

    public function search()
    {
        $data = $this->feedData('Search', 'Activities', 'search');
        $data['query'] = $this->request->getGet('q') ?? '';
        $data['suggestedUsers'] = [
            ['handle' => 'pergikuyy', 'name' => 'PergiKuyy'],
            ['handle' => 'alphatennis', 'name' => 'Alpha Tennis Club'],
            ['handle' => 'bestiestennis', 'name' => 'Besties Tennis'],
            ['handle' => 'theonetennisclub', 'name' => 'The One Tennis Club'],
        ];

        return view('pages/search', $data);
    }

    public function locationPicker()
    {
        return view('pages/location_picker', [
            'title' => 'Find activity by location - KUYY!',
            'activeNav' => 'home',
        ]);
    }

    public function chat()
    {
        return view('pages/chat', ['title' => 'Chat - KUYY!', 'activeNav' => 'chat']);
    }

    public function notifications()
    {
        return view('pages/notifications', ['title' => 'Notifications - KUYY!', 'activeNav' => 'notifications']);
    }

    public function profile()
    {
        return view('pages/profile', ['title' => 'Profile - KUYY!', 'activeNav' => 'profile']);
    }

    public function settings()
    {
        return view('pages/settings', ['title' => 'Settings - KUYY!', 'activeNav' => 'profile']);
    }

    public function addActivity()
    {
        return view('pages/add_activity', [
            'title' => 'Host Activity - KUYY!',
            'activeNav' => 'host',
            'categories' => $this->categories(),
        ]);
    }

    public function storeActivity()
    {
        $rules = [
            'title' => 'required|min_length[3]|max_length[255]',
            'category_id' => 'required|integer',
            'activity_date' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'location_name' => 'required|min_length[3]',
            'max_attendees' => 'required|integer|greater_than[0]',
        ];

        if (! $this->validate($rules)) {
            return view('pages/add_activity', [
                'title' => 'Host Activity - KUYY!',
                'activeNav' => 'host',
                'categories' => $this->categories(),
                'errors' => $this->validator->getErrors(),
                'input' => $this->request->getPost(),
            ]);
        }

        $activityDate = $this->request->getPost('activity_date') . ' ' . $this->request->getPost('start_time') . ':00';
        try {
            $model = new ActivityModel();
            $id = $model->insert([
                'title' => $this->request->getPost('title'),
                'description' => $this->request->getPost('description') ?: 'Hosted from KUYY web clone.',
                'category_id' => (int) $this->request->getPost('category_id'),
                'location_name' => $this->request->getPost('location_name'),
                'activity_date' => $activityDate,
                'image_url' => $this->request->getPost('image_url') ?: 'https://images.unsplash.com/photo-1595435934249-5df7ed86e1c0?auto=format&fit=crop&w=1200&q=80',
                'attendees_count' => 1,
                'max_attendees' => (int) $this->request->getPost('max_attendees'),
                'author_name' => 'davydyehuda196510874',
                'author_avatar' => 'https://i.pravatar.cc/150?u=davydyehuda196510874',
            ], true);
        } catch (\Throwable $e) {
            $id = 1;
        }

        return redirect()->to('/activity/' . $id);
    }

    public function activityDetail($id)
    {
        $activity = $this->activity((int) $id);

        if (! $activity) {
            throw PageNotFoundException::forPageNotFound('Activity not found');
        }

        return view('pages/activity_detail', [
            'title' => $activity['title'] . ' - KUYY!',
            'activity' => $activity,
            'activeNav' => 'home',
        ]);
    }

    public function registration($id)
    {
        $activity = $this->activity((int) $id);

        if (! $activity) {
            throw PageNotFoundException::forPageNotFound('Activity not found');
        }

        return view('pages/registration', [
            'title' => 'Registration Details - KUYY!',
            'activity' => $activity,
            'activeNav' => 'home',
        ]);
    }

    public function joinActivity($id)
    {
        $rules = [
            'name' => 'required|min_length[2]|max_length[120]',
            'email' => 'required|valid_email',
            'phone' => 'required|min_length[8]|max_length[20]',
        ];

        if (! $this->validate($rules)) {
            $activity = $this->activity((int) $id);

            if (! $activity) {
                throw PageNotFoundException::forPageNotFound('Activity not found');
            }

            return view('pages/registration', [
                'title' => 'Registration Details - KUYY!',
                'activity' => $activity,
                'activeNav' => 'home',
                'errors' => $this->validator->getErrors(),
                'input' => $this->request->getPost(),
            ]);
        }

        try {
            (new ActivityModel())->incrementAttendees((int) $id);
        } catch (\Throwable $e) {
            // Keep the demo flow working when the local database is offline.
        }

        return redirect()->to('/activity/' . $id);
    }

    public function activityDateSettings()
    {
        return view('pages/activity_date_settings', ['title' => 'Advanced Date Settings - KUYY!', 'activeNav' => 'host']);
    }

    public function activityFormSettings()
    {
        return view('pages/activity_form_settings', ['title' => 'Form Questions - KUYY!', 'activeNav' => 'host']);
    }

    public function activityAdvancedSettings()
    {
        return view('pages/activity_advanced_settings', ['title' => 'Activity Settings - KUYY!', 'activeNav' => 'host']);
    }

    public function seating()
    {
        return view('pages/seating', ['title' => 'Seating Plan - KUYY!', 'activeNav' => 'host']);
    }

    public function login()
    {
        return redirect()->to('/');
    }

    private function feedData(string $eyebrow, string $heading, string $activeNav): array
    {
        $filters = [
            'category' => $this->request->getGet('category') ?? 'all',
            'q' => $this->request->getGet('q') ?? '',
            'date' => $this->request->getGet('date') ?? '',
        ];

        try {
            $activities = (new ActivityModel())->getActivitiesWithCategory($filters);
        } catch (\Throwable $e) {
            $activities = $this->filterMockActivities($this->mockActivities(), $filters);
        }

        if (empty($activities)) {
            $activities = $this->filterMockActivities($this->mockActivities(), $filters);
        }

        return [
            'title' => 'KUYY! - Discover nearby activities',
            'activeNav' => $activeNav,
            'eyebrow' => $eyebrow,
            'heading' => $heading,
            'categories' => $this->categories(),
            'activities' => $activities,
            'filters' => $filters,
            'dates' => $this->dateRibbon(),
        ];
    }

    private function categories(): array
    {
        try {
            $categories = (new CategoryModel())->orderBy('id', 'ASC')->findAll();
        } catch (\Throwable $e) {
            return $this->defaultCategories;
        }

        return empty($categories) ? $this->defaultCategories : $categories;
    }

    private function activity(int $id): ?array
    {
        try {
            $activity = (new ActivityModel())->findActivityWithCategory($id);
            if ($activity) {
                return $activity;
            }
        } catch (\Throwable $e) {
            return $this->mockActivities()[0] ?? null;
        }

        return $this->mockActivities()[0] ?? null;
    }

    private function dateRibbon(): array
    {
        $dates = [];

        for ($i = 0; $i < 16; $i++) {
            $date = new DateTime("+{$i} days");
            $dates[] = [
                'label' => $i === 0 ? 'Today' : $date->format('D d'),
                'value' => $date->format('Y-m-d'),
            ];
        }

        return $dates;
    }

    private function filterMockActivities(array $activities, array $filters): array
    {
        return array_values(array_filter($activities, static function (array $activity) use ($filters): bool {
            if (! empty($filters['category']) && $filters['category'] !== 'all') {
                if (($activity['category_slug'] ?? '') !== $filters['category']) {
                    return false;
                }
            }

            if (! empty($filters['date'])) {
                if (date('Y-m-d', strtotime($activity['activity_date'])) !== $filters['date']) {
                    return false;
                }
            }

            if (! empty($filters['q'])) {
                $needle = strtolower(trim((string) $filters['q']));
                $haystack = strtolower(implode(' ', [
                    $activity['title'] ?? '',
                    $activity['description'] ?? '',
                    $activity['location_name'] ?? '',
                    $activity['author_name'] ?? '',
                    $activity['category_name'] ?? '',
                ]));

                if ($needle !== '' && ! str_contains($haystack, $needle)) {
                    return false;
                }
            }

            return true;
        }));
    }

    private function mockActivities(): array
    {
        $today = date('Y-m-d');

        return [
            [
                'id' => 1,
                'title' => 'BALLBOY, HITTING & COACHING',
                'description' => "Kami ingin menawarkan jasa ballboy, hitting partner, dan coaching beginner.\n\nBooking by WhatsApp tersedia untuk demo clone ini.",
                'category_id' => 2,
                'category_name' => 'Tennis',
                'category_slug' => 'tennis',
                'category_icon' => 'TN',
                'location_name' => 'DKI Jakarta & Sekitarnya',
                'activity_date' => $today . ' 22:00:00',
                'image_url' => 'https://images.unsplash.com/photo-1595435934249-5df7ed86e1c0?auto=format&fit=crop&w=1200&q=80',
                'attendees_count' => 5,
                'max_attendees' => 8,
                'author_name' => 'Ballboy Hitting',
                'author_avatar' => 'https://i.pravatar.cc/150?u=ballboy',
            ],
            [
                'id' => 2,
                'title' => 'Ballboy Reki',
                'description' => 'Open ballboy support for early morning tennis games.',
                'category_id' => 2,
                'category_name' => 'Tennis',
                'category_slug' => 'tennis',
                'category_icon' => 'TN',
                'location_name' => 'Jakarta Selatan',
                'activity_date' => date('Y-m-d 04:00:00', strtotime('+1 day')),
                'image_url' => 'https://images.unsplash.com/photo-1622163642998-1ea32b0bbc67?auto=format&fit=crop&w=1200&q=80',
                'attendees_count' => 1,
                'max_attendees' => 4,
                'author_name' => 'Ballboy Reki',
                'author_avatar' => 'https://i.pravatar.cc/150?u=reki',
            ],
            [
                'id' => 3,
                'title' => 'Rhythm Cycling - Tata',
                'description' => 'Indoor cycling class with music, sweat, and a friendly crew.',
                'category_id' => 8,
                'category_name' => 'Cycling',
                'category_slug' => 'cycling',
                'category_icon' => 'CY',
                'location_name' => 'Revel',
                'activity_date' => date('Y-m-d 06:30:00', strtotime('+1 day')),
                'image_url' => 'https://images.unsplash.com/photo-1534787238916-9ba6764efd4f?auto=format&fit=crop&w=1200&q=80',
                'attendees_count' => 2,
                'max_attendees' => 12,
                'author_name' => 'Revel',
                'author_avatar' => 'https://i.pravatar.cc/150?u=revel',
            ],
            [
                'id' => 4,
                'title' => 'Sedia Jasa Wasit Turnamen/MabaR, Jasa Hosting, Jasa Ballboy',
                'description' => 'Service support untuk turnamen tenis dan padel area Jabodetabek.',
                'category_id' => 18,
                'category_name' => 'Service',
                'category_slug' => 'service',
                'category_icon' => 'SV',
                'location_name' => 'RF Projek TenisPadel',
                'activity_date' => date('Y-m-d 23:59:00', strtotime('+1 day')),
                'image_url' => 'https://images.unsplash.com/photo-1554068865-24cecd4e34b8?auto=format&fit=crop&w=1200&q=80',
                'attendees_count' => 0,
                'max_attendees' => 10,
                'author_name' => 'RF PROJEK TENISPADEL',
                'author_avatar' => 'https://i.pravatar.cc/150?u=rfprojek',
            ],
            [
                'id' => 5,
                'title' => 'Jasa Hittingpartner Dan Ballboy Tenis',
                'description' => 'Partner hitting dan ballboy untuk latihan privat atau grup kecil.',
                'category_id' => 2,
                'category_name' => 'Tennis',
                'category_slug' => 'tennis',
                'category_icon' => 'TN',
                'location_name' => 'QMAY',
                'activity_date' => date('Y-m-d 00:00:00', strtotime('+1 day')),
                'image_url' => 'https://images.unsplash.com/photo-1622279457486-62dcc4a431d6?auto=format&fit=crop&w=1200&q=80',
                'attendees_count' => 1,
                'max_attendees' => 5,
                'author_name' => 'QMAY',
                'author_avatar' => 'https://i.pravatar.cc/150?u=qmay',
            ],
            [
                'id' => 6,
                'title' => '[start 37k] Ballboy seJABODETABEK very wellcome',
                'description' => 'Layanan ballboy casual untuk sesi tenis di sekitar Jabodetabek.',
                'category_id' => 18,
                'category_name' => 'Service',
                'category_slug' => 'service',
                'category_icon' => 'SV',
                'location_name' => 'Jakarta Selatan',
                'activity_date' => date('Y-m-d 02:00:00', strtotime('+1 day')),
                'image_url' => 'https://images.unsplash.com/photo-1519861531473-9200262188bf?auto=format&fit=crop&w=1200&q=80',
                'attendees_count' => 0,
                'max_attendees' => 9,
                'author_name' => 'ballboyseJABODETABEK',
                'author_avatar' => 'https://i.pravatar.cc/150?u=ballboyjabodetabek',
            ],
            [
                'id' => 7,
                'title' => '2H Semi Intermediate Double Games',
                'description' => 'After office fun tennis session. Bring your own racquet and water bottle.',
                'category_id' => 2,
                'category_name' => 'Tennis',
                'category_slug' => 'tennis',
                'category_icon' => 'TN',
                'location_name' => 'MY Tennis Club',
                'activity_date' => date('Y-m-d 20:00:00', strtotime('+3 days')),
                'image_url' => 'https://images.unsplash.com/photo-1622163642998-1ea32b0bbc67?auto=format&fit=crop&w=1200&q=80',
                'attendees_count' => 4,
                'max_attendees' => 8,
                'author_name' => 'HappyGo Racquet Club',
                'author_avatar' => 'https://i.pravatar.cc/150?u=happygo',
            ],
            [
                'id' => 8,
                'title' => 'Morning Yoga Flow',
                'description' => 'Gentle flow class for beginners and regular practitioners.',
                'category_id' => 3,
                'category_name' => 'Yoga',
                'category_slug' => 'yoga',
                'category_icon' => 'YG',
                'location_name' => 'Urban Forest Cipete',
                'activity_date' => date('Y-m-d 07:00:00', strtotime('+4 days')),
                'image_url' => 'https://images.unsplash.com/photo-1544367567-0f2fcb009e0b?auto=format&fit=crop&w=1200&q=80',
                'attendees_count' => 7,
                'max_attendees' => 16,
                'author_name' => 'Flow Studio',
                'author_avatar' => 'https://i.pravatar.cc/150?u=flow',
            ],
        ];
    }
}
