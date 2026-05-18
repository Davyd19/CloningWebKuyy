<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<section class="host-layout">
    <form class="host-form" action="<?= base_url('activities') ?>" method="post">
        <?= csrf_field() ?>
        <div class="section-title">
            <div>
                <a class="back-link" href="<?= base_url('/') ?>">Back</a>
                <h1>Host Activity</h1>
            </div>
            <button class="icon-button" type="button">Template</button>
        </div>

        <?php if (! empty($errors ?? [])): ?>
            <div class="error-box">
                <?php foreach ($errors as $error): ?>
                    <p><?= esc($error) ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <label class="upload-box">
            <span>+ Add Image</span>
            <small>800x400px / larger (2:1 ratio)</small>
            <input type="url" name="image_url" value="<?= esc($input['image_url'] ?? '') ?>" placeholder="Paste image URL">
        </label>

        <input class="form-control" type="text" name="title" value="<?= esc($input['title'] ?? '') ?>" placeholder="Activity Name" required>
        <input class="form-control" type="text" name="tags" value="<?= esc($input['tags'] ?? '') ?>" placeholder="Add tags">
        <textarea class="form-control" name="description" rows="4" maxlength="10000" placeholder="Description"><?= esc($input['description'] ?? '') ?></textarea>

        <div class="chip-row">
            <?php foreach ($categories ?? [] as $index => $category): ?>
                <?php if (($category['slug'] ?? '') === 'all') continue; ?>
                <label class="chip input-chip">
                    <input type="radio" name="category_id" value="<?= esc($category['id']) ?>" <?= $index === 1 ? 'checked' : '' ?>>
                    <span><?= esc($category['icon'] ?? '') ?></span><?= esc($category['name']) ?>
                </label>
            <?php endforeach; ?>
        </div>

        <div class="form-grid">
            <label>Date <input class="form-control" type="date" name="activity_date" value="<?= esc($input['activity_date'] ?? date('Y-m-d', strtotime('+1 day'))) ?>" required></label>
            <label>Start Time <input class="form-control" type="time" name="start_time" value="<?= esc($input['start_time'] ?? '18:00') ?>" required></label>
            <label>End Time <input class="form-control" type="time" name="end_time" value="<?= esc($input['end_time'] ?? '20:00') ?>" required></label>
        </div>

        <a class="setting-link" href="<?= base_url('activities/settings/date') ?>">Advanced date settings</a>
        <input class="form-control" type="text" name="location_name" value="<?= esc($input['location_name'] ?? '') ?>" placeholder="Location" required>
        <button class="text-button" type="button">Add Location Name</button>

        <label>Max Participants
            <input class="form-control" type="number" name="max_attendees" value="<?= esc($input['max_attendees'] ?? 10) ?>" min="1" required>
        </label>

        <label class="check-row"><input type="checkbox" checked> Show participants to everyone</label>

        <section class="settings-list">
            <label class="switch-row">Paid activity <input type="checkbox" checked></label>
            <input class="form-control" type="number" name="price" placeholder="Activity Price (Base Price)" value="0">
            <p class="muted">Sales will be sent to KUYY Balance after the activity has ended.</p>
            <label class="switch-row">Referral program <input type="checkbox"></label>
            <a href="#" class="setting-link">Group Discount Settings</a>
            <a href="#" class="setting-link">Add Ons</a>
            <a href="<?= base_url('seating') ?>" class="setting-link">Seating plan</a>
            <a href="<?= base_url('activities/settings/form') ?>" class="setting-link">Registration form <span>3 general questions</span></a>
            <a href="<?= base_url('activities/settings/advanced') ?>" class="setting-link">Advanced settings</a>
        </section>

        <label>Post activity to
            <select class="form-control" name="visibility">
                <option>Public</option>
                <option>Private</option>
            </select>
        </label>

        <div class="sticky-actions">
            <button class="btn primary full" type="submit">Host Activity</button>
            <button class="btn subtle full" type="button">Save as Template</button>
        </div>
    </form>
</section>
<?= $this->endSection() ?>
