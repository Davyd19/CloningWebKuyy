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
    <form action="<?= base_url('activity/' . (int) $activity['id'] . '/join') ?>" method="post">
        <?= csrf_field() ?>
        <input class="form-control" type="text" name="name" placeholder="Name" value="davydyehuda196510874" required>
        <input class="form-control" type="email" name="email" placeholder="Email" value="demo@kuyy.local" required>
        <input class="form-control" type="tel" name="phone" placeholder="Phone Number" required>
        <button class="btn primary full" type="submit">Continue</button>
    </form>
</section>
<?= $this->endSection() ?>
