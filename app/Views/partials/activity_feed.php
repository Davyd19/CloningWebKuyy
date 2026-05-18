<?php
$groupedActivities = [];
foreach ($activities ?? [] as $activity) {
    $key = date('D, d M Y', strtotime($activity['activity_date']));
    $groupedActivities[$key][] = $activity;
}
?>

<section class="feed-panel">
    <?php if (empty($groupedActivities)): ?>
        <div class="empty-card">
            <div class="empty-icon">--</div>
            <h2>No activities</h2>
            <p>Don't worry, we still got many activities for you.</p>
        </div>
    <?php endif; ?>

    <?php foreach ($groupedActivities as $dateLabel => $items): ?>
        <h2 class="date-heading"><?= esc($dateLabel) ?></h2>
        <div class="activity-list">
            <?php foreach ($items as $activity): ?>
                <?php
                    $slots = max(0, (int) $activity['max_attendees'] - (int) $activity['attendees_count']);
                    $activityId = (int) ($activity['id'] ?? 1);
                ?>
                <a class="activity-row" href="<?= base_url('activity/' . $activityId) ?>">
                    <img src="<?= esc($activity['image_url']) ?>" alt="<?= esc($activity['title']) ?>">
                    <div>
                        <h3><?= esc($activity['title']) ?></h3>
                        <p><?= date('H:i', strtotime($activity['activity_date'])) ?> WIB <span>|</span> <?= esc($activity['location_name']) ?></p>
                        <p class="joined">Joined by <strong><?= esc($activity['author_name']) ?></strong></p>
                        <p class="slot-inline"><?= $slots ?> slots remaining</p>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    <?php endforeach; ?>
</section>
