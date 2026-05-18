<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="dashboard-grid">
    <div>
        <?= $this->include('partials/feed_filters') ?>
        <div class="empty-card tall">
            <div class="empty-icon">--</div>
            <h2>No activities</h2>
            <p>Don't worry, we still got many activities for you.</p>
        </div>
        <section class="promo-panel">
            <div>
                <span class="eyebrow">Explore more activities</span>
                <h2>Yuk latihan tenis bareng!</h2>
                <p>Find open sessions from hosts you may like and follow them for upcoming schedules.</p>
            </div>
            <a class="btn primary" href="<?= base_url('/') ?>">Explore</a>
        </section>
    </div>
    <aside class="right-panel">
        <h2>Following</h2>
        <p class="muted">Follow organizers to make this feed useful.</p>
        <div class="user-stack">
            <span>pergikuyy</span>
            <span>alphatennis</span>
            <span>bestiestennis</span>
        </div>
    </aside>
</div>
<?= $this->endSection() ?>
