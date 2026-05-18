<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<?= $this->include('partials/feed_filters') ?>
<?= $this->include('partials/activity_feed') ?>

<aside class="filter-sheet" id="filters">
    <h2>Filters</h2>
    <div class="panel-block">
        <h3>Sort by</h3>
        <label class="option-line"><input type="radio" checked> Earliest time</label>
        <label class="option-line"><input type="radio"> Nearest distance</label>
    </div>
    <div class="panel-block">
        <h3>Time</h3>
        <div class="mini-chip-row"><span>Morning</span><span>Afternoon</span><span>Evening</span></div>
    </div>
    <div class="panel-block">
        <h3>Distance</h3>
        <div class="mini-chip-row"><span>&lt;5km</span><span>&lt;15km</span><span>&lt;30km</span></div>
    </div>
    <a class="btn primary full" href="<?= base_url('/') ?>">Apply</a>
</aside>
<?= $this->endSection() ?>
