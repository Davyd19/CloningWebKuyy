<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<section class="page-card narrow">
    <div class="section-title">
        <h1>Settings</h1>
    </div>
    <?php
        $groups = [
            'Account' => ['Edit Profile', 'Personal Information', 'Transactions', 'Balance', 'Activity History', 'My Pass', 'Subscriptions'],
            'Hosting' => ['Host Settings'],
            'Security' => ['Account Privacy', 'PIN'],
            'General' => ['Switch to Dark Mode', 'Change Language'],
            'Support' => ['Contact Support', 'Support KUYY!'],
            'Login' => ['Switch Account', 'Logout'],
        ];
    ?>
    <?php foreach ($groups as $group => $items): ?>
        <div class="settings-group">
            <h2><?= esc($group) ?></h2>
            <?php foreach ($items as $item): ?>
                <a href="#" class="setting-line"><span><?= esc($item) ?></span><span>></span></a>
            <?php endforeach; ?>
        </div>
    <?php endforeach; ?>
</section>
<?= $this->endSection() ?>
