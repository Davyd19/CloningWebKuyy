<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<section class="page-card narrow">
    <a class="back-link" href="<?= base_url('add-activity') ?>">Back</a>
    <h1>Seating plan</h1>
    <p class="muted">Mark the seat using numbers. Participants will be able to select the seat during registration.</p>
    <label class="upload-box large">
        <span>+ Add Image</span>
        <small>Upload seating map preview</small>
    </label>
    <button class="btn primary full" type="button">Save</button>
</section>
<?= $this->endSection() ?>
