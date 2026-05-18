<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'KUYY! - Discover nearby activities') ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <?= $this->renderSection('styles') ?>
</head>
<body>
    <?php $activeNav = $activeNav ?? 'home'; ?>
    <div class="shell">
        <aside class="sidebar">
            <a class="brand" href="<?= base_url('/') ?>">
                <span class="brand-mark">K</span>
                <span>KUYY!</span>
            </a>
            <nav class="side-nav">
                <a class="<?= $activeNav === 'home' ? 'active' : '' ?>" href="<?= base_url('/') ?>">Home</a>
                <a class="<?= $activeNav === 'following' ? 'active' : '' ?>" href="<?= base_url('following') ?>">Following</a>
                <a class="<?= $activeNav === 'search' ? 'active' : '' ?>" href="<?= base_url('search') ?>">Search</a>
                <a class="<?= $activeNav === 'chat' ? 'active' : '' ?>" href="<?= base_url('chat') ?>">Chat</a>
                <a class="<?= $activeNav === 'notifications' ? 'active' : '' ?>" href="<?= base_url('notifications') ?>">Notifications</a>
                <a class="<?= $activeNav === 'profile' ? 'active' : '' ?>" href="<?= base_url('profile') ?>">Profile</a>
            </nav>
            <a class="host-button" href="<?= base_url('add-activity') ?>">Host Activity</a>
        </aside>

        <div class="workspace">
            <header class="desktop-topbar">
                <a class="location-link" href="<?= base_url('pick/location-filter') ?>">
                    <span>Activities near</span>
                    <strong>Your location</strong>
                </a>
                <form class="top-search" action="<?= base_url('search') ?>" method="get">
                    <input type="search" name="q" value="<?= esc($filters['q'] ?? $query ?? '') ?>" placeholder="Search activities, hosts, venues">
                </form>
                <a class="icon-button" href="<?= base_url('search') ?>">Search</a>
                <a class="icon-button" href="#filters">Filters</a>
                <a class="avatar-link" href="<?= base_url('profile') ?>">D</a>
            </header>

            <main class="content">
                <?= $this->renderSection('content') ?>
            </main>
        </div>
    </div>

    <nav class="mobile-nav">
        <a class="<?= $activeNav === 'home' ? 'active' : '' ?>" href="<?= base_url('/') ?>">Home</a>
        <a class="<?= $activeNav === 'following' ? 'active' : '' ?>" href="<?= base_url('following') ?>">Following</a>
        <a class="<?= $activeNav === 'chat' ? 'active' : '' ?>" href="<?= base_url('chat') ?>">Chat</a>
        <a class="<?= $activeNav === 'notifications' ? 'active' : '' ?>" href="<?= base_url('notifications') ?>">Alerts</a>
        <a class="<?= $activeNav === 'profile' ? 'active' : '' ?>" href="<?= base_url('profile') ?>">Profile</a>
    </nav>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('[data-toggle-target]').forEach((button) => {
                button.addEventListener('click', () => {
                    const target = document.querySelector(button.dataset.toggleTarget);
                    if (target) target.classList.toggle('is-open');
                });
            });
        });
    </script>
    <?= $this->renderSection('scripts') ?>
</body>
</html>
