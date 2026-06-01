<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<section class="page-card narrow">
    <a class="back-link" href="<?= base_url('activity/' . (int) $activity['id']) ?>">Back</a>
    <h1>Registration Details</h1>
    <div class="accordion-head">
        <div>
            <strong>General Information</strong>
            <p>Name, Email</p>
        </div>
        <span>Open</span>
    </div>
    <div class="registration-summary">
        <img src="<?= esc($activity['image_url']) ?>" alt="<?= esc($activity['title']) ?>">
        <div>
            <strong><?= esc($activity['title']) ?></strong>
            <p><?= date('D, d M Y H:i', strtotime($activity['activity_date'])) ?> WIB</p>
        </div>
    </div>
    <?php if (! empty($errors ?? [])): ?>
        <div class="error-box">
            <?php foreach ($errors as $error): ?>
                <p><?= esc($error) ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    <form action="<?= base_url('activity/' . (int) $activity['id'] . '/join') ?>" method="post">
        <?= csrf_field() ?>
        <input class="form-control" type="text" name="name" placeholder="Name" value="<?= esc($input['name'] ?? 'davydyehuda196510874') ?>" required>
        <input class="form-control" type="email" name="email" placeholder="Email" value="<?= esc($input['email'] ?? 'demo@kuyy.local') ?>" required>
        <input class="form-control" type="tel" name="phone" placeholder="Phone Number" value="<?= esc($input['phone'] ?? '') ?>" required>
        <button class="btn primary full" type="submit">Continue</button>
    </form>
</section>
<?= $this->endSection() ?>
