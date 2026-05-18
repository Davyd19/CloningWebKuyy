<section class="feed-header">
    <div>
        <span class="eyebrow"><?= esc($eyebrow ?? 'Activities near') ?></span>
        <h1><?= esc($heading ?? 'Your location') ?></h1>
    </div>
    <a class="btn secondary" href="<?= base_url('pick/location-filter') ?>">Change Location</a>
</section>

<div class="chip-row">
    <?php foreach ($categories ?? [] as $category): ?>
        <?php
            $slug = $category['slug'] ?? 'all';
            $isActive = ($filters['category'] ?? 'all') === $slug;
            $query = http_build_query(array_filter([
                'category' => $slug,
                'q' => $filters['q'] ?? '',
                'date' => $filters['date'] ?? '',
            ]));
        ?>
        <a class="chip <?= $isActive ? 'active' : '' ?>" href="<?= current_url() . ($query ? '?' . $query : '') ?>">
            <span><?= esc($category['icon'] ?? '') ?></span><?= esc($category['name']) ?>
        </a>
    <?php endforeach; ?>
</div>

<div class="date-row">
    <?php foreach ($dates ?? [] as $date): ?>
        <?php
            $isActive = ($filters['date'] ?? '') === $date['value'];
            $query = http_build_query(array_filter([
                'category' => $filters['category'] ?? 'all',
                'q' => $filters['q'] ?? '',
                'date' => $date['value'],
            ]));
        ?>
        <a class="date-chip <?= $isActive ? 'active' : '' ?>" href="<?= current_url() . '?' . $query ?>"><?= esc($date['label']) ?></a>
    <?php endforeach; ?>
</div>
