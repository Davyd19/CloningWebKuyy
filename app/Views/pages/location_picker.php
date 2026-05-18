<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<section class="page-card map-page">
    <a class="back-link" href="<?= base_url('/') ?>">Back</a>
    <h1>Find activity by location</h1>
    <div class="map-canvas">
        <div class="map-grid"></div>
        <div class="pin"></div>
        <div class="map-controls">
            <button>+</button>
            <button>-</button>
            <button>Locate</button>
        </div>
    </div>
    <a class="btn primary map-select" href="<?= base_url('/') ?>">Select</a>
</section>
<?= $this->endSection() ?>
