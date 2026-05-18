<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<section class="page-card narrow">
    <a class="back-link" href="<?= base_url('add-activity') ?>">Back</a>
    <h1>Advanced date settings</h1>
    <div class="form-grid">
        <label>Date <input class="form-control" type="date" value="<?= date('Y-m-d', strtotime('+1 day')) ?>"></label>
        <label>Start Time <input class="form-control" type="time" value="18:00"></label>
        <label>End Time <input class="form-control" type="time" value="20:00"></label>
    </div>
    <button class="text-button" type="button">Add End Date</button>
    <label class="switch-row">Registration deadline <input type="checkbox"></label>
    <p class="muted">Close activity registration according to set date.</p>
</section>
<?= $this->endSection() ?>
