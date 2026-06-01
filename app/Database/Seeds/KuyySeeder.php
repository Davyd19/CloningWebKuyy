<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class KuyySeeder extends Seeder
{
    public function run()
    {
        $this->db->disableForeignKeyChecks();
        $this->db->table('activities')->truncate();
        $this->db->table('categories')->truncate();
        $this->db->enableForeignKeyChecks();

        $categories = [
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

        $this->db->table('categories')->insertBatch($categories);

        $activities = [
            [
                'title' => 'BALLBOY, HITTING & COACHING',
                'description' => "Kami ingin menawarkan jasa ballboy, hitting partner, dan coaching beginner.\n\nBooking by WhatsApp tersedia untuk demo clone ini.",
                'category_id' => 2,
                'location_name' => 'DKI Jakarta & Sekitarnya',
                'activity_date' => date('Y-m-d 22:00:00'),
                'image_url' => 'https://images.unsplash.com/photo-1595435934249-5df7ed86e1c0?auto=format&fit=crop&w=1200&q=80',
                'attendees_count' => 5,
                'max_attendees' => 8,
                'author_name' => 'Ballboy Hitting',
                'author_avatar' => 'https://i.pravatar.cc/150?u=ballboy',
            ],
            [
                'title' => 'Ballboy Reki',
                'description' => 'Open ballboy support for early morning tennis games.',
                'category_id' => 2,
                'location_name' => 'Jakarta Selatan',
                'activity_date' => date('Y-m-d 04:00:00', strtotime('+1 day')),
                'image_url' => 'https://images.unsplash.com/photo-1622163642998-1ea32b0bbc67?auto=format&fit=crop&w=1200&q=80',
                'attendees_count' => 1,
                'max_attendees' => 4,
                'author_name' => 'Ballboy Reki',
                'author_avatar' => 'https://i.pravatar.cc/150?u=reki',
            ],
            [
                'title' => 'Rhythm Cycling - Tata',
                'description' => 'Indoor cycling class with music, sweat, and a friendly crew.',
                'category_id' => 8,
                'location_name' => 'Revel',
                'activity_date' => date('Y-m-d 06:30:00', strtotime('+1 day')),
                'image_url' => 'https://images.unsplash.com/photo-1534787238916-9ba6764efd4f?auto=format&fit=crop&w=1200&q=80',
                'attendees_count' => 2,
                'max_attendees' => 12,
                'author_name' => 'Revel',
                'author_avatar' => 'https://i.pravatar.cc/150?u=revel',
            ],
            [
                'title' => 'Sedia Jasa Wasit Turnamen/MabaR, Jasa Hosting, Jasa Ballboy, Jasa Coaching',
                'description' => 'Service support untuk turnamen tenis dan padel area Jabodetabek.',
                'category_id' => 18,
                'location_name' => 'RF PROJEK TENISPADEL',
                'activity_date' => date('Y-m-d 23:59:00', strtotime('+1 day')),
                'image_url' => 'https://images.unsplash.com/photo-1554068865-24cecd4e34b8?auto=format&fit=crop&w=1200&q=80',
                'attendees_count' => 0,
                'max_attendees' => 10,
                'author_name' => 'RF PROJEK TENISPADEL',
                'author_avatar' => 'https://i.pravatar.cc/150?u=rfprojek',
            ],
            [
                'title' => 'Jasa Hittingpartner Dan Ballboy Tenis',
                'description' => 'Partner hitting dan ballboy untuk latihan privat atau grup kecil.',
                'category_id' => 2,
                'location_name' => 'QMAY',
                'activity_date' => date('Y-m-d 00:00:00', strtotime('+1 day')),
                'image_url' => 'https://images.unsplash.com/photo-1622279457486-62dcc4a431d6?auto=format&fit=crop&w=1200&q=80',
                'attendees_count' => 1,
                'max_attendees' => 5,
                'author_name' => 'QMAY',
                'author_avatar' => 'https://i.pravatar.cc/150?u=qmay',
            ],
            [
                'title' => '[start 37k] Ballboy seJABODETABEK very wellcome',
                'description' => 'Layanan ballboy casual untuk sesi tenis di sekitar Jabodetabek.',
                'category_id' => 18,
                'location_name' => 'Jakarta Selatan',
                'activity_date' => date('Y-m-d 02:00:00', strtotime('+1 day')),
                'image_url' => 'https://images.unsplash.com/photo-1519861531473-9200262188bf?auto=format&fit=crop&w=1200&q=80',
                'attendees_count' => 0,
                'max_attendees' => 9,
                'author_name' => 'ballboyseJABODETABEK',
                'author_avatar' => 'https://i.pravatar.cc/150?u=ballboyjabodetabek',
            ],
            [
                'title' => '2H Semi Intermediate Double Games',
                'description' => 'After office fun tennis session. Bring your own racquet and water bottle.',
                'category_id' => 2,
                'location_name' => 'MY Tennis Club',
                'activity_date' => date('Y-m-d 20:00:00', strtotime('+3 days')),
                'image_url' => 'https://images.unsplash.com/photo-1542144582-1ba00456b5e3?auto=format&fit=crop&w=1200&q=80',
                'attendees_count' => 4,
                'max_attendees' => 8,
                'author_name' => 'HappyGo Racquet Club',
                'author_avatar' => 'https://i.pravatar.cc/150?u=happygo',
            ],
            [
                'title' => 'Morning Yoga Flow',
                'description' => 'Gentle flow class for beginners and regular practitioners.',
                'category_id' => 3,
                'location_name' => 'Urban Forest Cipete',
                'activity_date' => date('Y-m-d 07:00:00', strtotime('+4 days')),
                'image_url' => 'https://images.unsplash.com/photo-1544367567-0f2fcb009e0b?auto=format&fit=crop&w=1200&q=80',
                'attendees_count' => 7,
                'max_attendees' => 16,
                'author_name' => 'Flow Studio',
                'author_avatar' => 'https://i.pravatar.cc/150?u=flow',
            ],
            [
                'title' => 'Padel Beginner Friendly Match',
                'description' => 'Fun match untuk pemula, host menyediakan bola dan pairing.',
                'category_id' => 5,
                'location_name' => 'Kemang Padel Club',
                'activity_date' => date('Y-m-d 19:30:00', strtotime('+5 days')),
                'image_url' => 'https://images.unsplash.com/photo-1661956602139-ec64991b8b16?auto=format&fit=crop&w=1200&q=80',
                'attendees_count' => 6,
                'max_attendees' => 12,
                'author_name' => 'Padel South',
                'author_avatar' => 'https://i.pravatar.cc/150?u=padelsouth',
            ],
            [
                'title' => 'Saturday Badminton Social',
                'description' => 'Main santai dua jam, semua level boleh join.',
                'category_id' => 9,
                'location_name' => 'GOR Bulungan',
                'activity_date' => date('Y-m-d 09:00:00', strtotime('+6 days')),
                'image_url' => 'https://images.unsplash.com/photo-1626224583764-f87db24ac4ea?auto=format&fit=crop&w=1200&q=80',
                'attendees_count' => 9,
                'max_attendees' => 16,
                'author_name' => 'South Shuttle',
                'author_avatar' => 'https://i.pravatar.cc/150?u=shuttle',
            ],
            [
                'title' => 'Gelora Sunday Easy Run',
                'description' => 'Pace santai 5K dilanjutkan coffee stop.',
                'category_id' => 10,
                'location_name' => 'Gelora Bung Karno',
                'activity_date' => date('Y-m-d 06:00:00', strtotime('+7 days')),
                'image_url' => 'https://images.unsplash.com/photo-1476480862126-209bfaa8edc8?auto=format&fit=crop&w=1200&q=80',
                'attendees_count' => 18,
                'max_attendees' => 30,
                'author_name' => 'Jakarta Runners',
                'author_avatar' => 'https://i.pravatar.cc/150?u=runjkt',
            ],
        ];

        $this->db->table('activities')->insertBatch($activities);
    }
}
