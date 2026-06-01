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
    <div class="app-shell">
        <header class="app-topbar">
            <a class="location-link" href="<?= base_url('pick/location-filter') ?>">
                <span><?= esc($eyebrow ?? 'Activities near') ?></span>
                <strong><?= esc($heading ?? 'Your location') ?> <span class="chevron">v</span></strong>
            </a>
            <div class="topbar-actions">
                <a class="round-action" href="<?= base_url('search') ?>" aria-label="Search">Search</a>
                <a class="round-action" href="#filters" aria-label="Filters">Filter</a>
            </div>
        </header>

        <main class="content">
            <?= $this->renderSection('content') ?>
        </main>

        <a class="floating-host" href="<?= base_url('add-activity') ?>" aria-label="Host activity">+</a>
    </div>

    <nav class="mobile-nav">
        <a class="<?= $activeNav === 'home' ? 'active' : '' ?>" href="<?= base_url('/') ?>"><i class="nav-icon home-icon"></i><span>Home</span></a>
        <a class="<?= $activeNav === 'following' ? 'active' : '' ?>" href="<?= base_url('following') ?>"><i class="nav-icon follow-icon"></i><span>Follow</span></a>
        <a class="<?= $activeNav === 'chat' ? 'active' : '' ?>" href="<?= base_url('chat') ?>"><i class="nav-icon chat-icon"></i><span>Chat</span></a>
        <a class="<?= $activeNav === 'notifications' ? 'active' : '' ?>" href="<?= base_url('notifications') ?>"><i class="nav-icon alert-icon"></i><span>Alerts</span></a>
        <a class="<?= $activeNav === 'profile' ? 'active' : '' ?>" href="<?= base_url('profile') ?>"><i class="nav-icon profile-icon"></i><span>D</span></a>
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
