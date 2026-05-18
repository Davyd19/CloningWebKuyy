<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<section class="page-card">
    <div class="section-title">
        <h1>Chat</h1>
        <a class="btn primary" href="<?= base_url('add-activity') ?>">Create Chat Channel</a>
    </div>
    <div class="tabs">
        <span class="active">All</span>
        <span>Group</span>
        <span>Personal</span>
    </div>
    <div class="empty-card tall">
        <div class="outline-icon">...</div>
        <h2>Start a conversation</h2>
    </div>
</section>
<?= $this->endSection() ?>
