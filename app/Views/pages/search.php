<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<section class="search-page">
    <form class="search-hero" action="<?= base_url('search') ?>" method="get">
        <a class="back-link" href="<?= base_url('/') ?>">Back</a>
        <input type="search" name="q" value="<?= esc($query ?? '') ?>" placeholder="Search">
        <button class="btn primary" type="submit">Search</button>
    </form>

    <div class="tabs">
        <span class="active">Top</span>
        <span>Activities</span>
        <span>People</span>
    </div>

    <?= $this->include('partials/feed_filters') ?>

    <section class="suggested-users">
        <h2>Suggested users</h2>
        <div class="user-card-grid">
            <?php foreach ($suggestedUsers ?? [] as $user): ?>
                <article class="user-card">
                    <div class="profile-avatar small"><?= strtoupper(substr($user['handle'], 0, 1)) ?></div>
                    <h3><?= esc($user['handle']) ?> <span class="verified">ok</span></h3>
                    <p><?= esc($user['name']) ?></p>
                    <button class="btn primary small-btn">Follow</button>
                </article>
            <?php endforeach; ?>
        </div>
    </section>

    <?= $this->include('partials/activity_feed') ?>
</section>
<?= $this->endSection() ?>
