<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class KuyySeeder extends Seeder
{
    public function run()
    {
        $this->db->table('activities')->emptyTable();
        $this->db->table('categories')->emptyTable();

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
        ];

        $this->db->table('activities')->insertBatch($activities);
    }
}
