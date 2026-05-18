<?php

namespace App\Models;

use CodeIgniter\Model;

class ActivityModel extends Model
{
    protected $table            = 'activities';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'title', 'description', 'category_id', 'location_name', 
        'activity_date', 'image_url', 'attendees_count', 
        'max_attendees', 'author_name', 'author_avatar'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getActivitiesWithCategory(array $filters = [])
    {
        $builder = $this->select('activities.*, categories.name as category_name, categories.icon as category_icon, categories.slug as category_slug')
            ->join('categories', 'categories.id = activities.category_id', 'left');

        if (! empty($filters['category']) && $filters['category'] !== 'all') {
            $builder->where('categories.slug', $filters['category']);
        }

        if (! empty($filters['q'])) {
            $query = trim($filters['q']);
            $builder->groupStart()
                ->like('activities.title', $query)
                ->orLike('activities.description', $query)
                ->orLike('activities.location_name', $query)
                ->orLike('activities.author_name', $query)
                ->groupEnd();
        }

        if (! empty($filters['date'])) {
            $builder->where('DATE(activities.activity_date)', $filters['date']);
        }

        return $builder->orderBy('activities.activity_date', 'ASC')->findAll();
    }

    public function findActivityWithCategory(int $id): ?array
    {
        return $this->select('activities.*, categories.name as category_name, categories.icon as category_icon, categories.slug as category_slug')
            ->join('categories', 'categories.id = activities.category_id', 'left')
            ->where('activities.id', $id)
            ->first();
    }

    public function incrementAttendees(int $id): bool
    {
        $activity = $this->find($id);

        if (! $activity) {
            return false;
        }

        $nextCount = min((int) $activity['attendees_count'] + 1, (int) $activity['max_attendees']);

        return $this->update($id, ['attendees_count' => $nextCount]);
    }
}
