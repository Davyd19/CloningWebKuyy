<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<article class="detail-layout">
    <section class="detail-main">
        <img class="detail-hero" src="<?= esc($activity['image_url']) ?>" alt="<?= esc($activity['title']) ?>">
        <div class="detail-body">
            <a class="back-link" href="<?= base_url('/') ?>">Back</a>
            <h1><?= esc($activity['title']) ?></h1>
            <span class="visibility">Public</span>
            <div class="info-list">
                <div><strong><?= date('D, d M Y', strtotime($activity['activity_date'])) ?></strong><span><?= date('H:i', strtotime($activity['activity_date'])) ?> WIB</span></div>
                <div><strong><?= esc($activity['location_name']) ?></strong><span>Central Jakarta City, Jakarta, Indonesia</span></div>
                <div class="host-mini"><img src="<?= esc($activity['author_avatar']) ?>" alt=""><strong><?= esc($activity['author_name']) ?></strong></div>
            </div>
            <h2>Description</h2>
            <p class="description"><?= nl2br(esc($activity['description'])) ?></p>
        </div>
    </section>
    <aside class="join-panel">
        <div class="counter">
            <button>-</button><span>1</span><button>+</button>
        </div>
        <p><strong><?= esc($activity['attendees_count']) ?>/<?= esc($activity['max_attendees']) ?></strong> participants joined</p>
        <a class="btn primary full" href="<?= base_url('activity/' . (int) $activity['id'] . '/registration') ?>">Join</a>
    </aside>
</article>
<?= $this->endSection() ?>
