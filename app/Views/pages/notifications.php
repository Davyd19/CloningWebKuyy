<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<section class="page-card">
    <div class="section-title">
        <h1>Notifications</h1>
    </div>
    <div class="tabs">
        <span class="active">All</span>
        <span>Hosting</span>
        <span>Following</span>
    </div>
    <div class="empty-card tall">
        <div class="outline-icon">!</div>
        <h2>No notifications</h2>
        <p>Host or join an activity to receive updates.</p>
    </div>
</section>
<?= $this->endSection() ?>
