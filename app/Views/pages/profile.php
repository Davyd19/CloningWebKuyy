<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<section class="profile-hero">
    <div class="profile-main">
        <div class="profile-avatar">D</div>
        <div>
            <h1>davydyehuda196510874</h1>
            <p>davydyehuda196</p>
        </div>
    </div>
    <a class="icon-button" href="<?= base_url('settings') ?>">Settings</a>
</section>

<section class="stats-grid">
    <div><strong>0</strong><span>Following</span></div>
    <div><strong>0</strong><span>Followers</span></div>
    <div><strong>0</strong><span>Activities</span></div>
    <div><strong>0</strong><span>Likes</span></div>
</section>

<section class="action-row">
    <a class="btn secondary" href="<?= base_url('settings') ?>">Edit Profile</a>
    <a class="btn subtle" href="#">Activity Pass</a>
    <a class="btn primary" href="<?= base_url('chat') ?>">Create Chat Channel</a>
</section>

<section class="page-card">
    <div class="tabs spread">
        <span class="active">Upcoming</span>
        <span>Timeline</span>
    </div>
    <div class="empty-card">
        <h2>No hosted activities yet</h2>
        <p>Use Host Activity to create your first KUYY session.</p>
    </div>
</section>
<?= $this->endSection() ?>
