<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<section class="page-card narrow">
    <a class="back-link" href="<?= base_url('add-activity') ?>">Back</a>
    <h1>Activity Settings</h1>
    <p class="muted">Set the default settings for your activities. Settings are customizable when hosting an activity.</p>
    <div class="settings-list">
        <label class="switch-row">Request to Join <input type="checkbox"></label>
        <p class="muted">Participants have to be approved by host to join the activity.</p>
        <label class="switch-row">Allow Waitlist <input type="checkbox"></label>
        <p class="muted">Participants may still join the waitlist once all slots are filled.</p>
        <label class="switch-row">Group Join <input type="checkbox" checked></label>
        <p class="muted">Participants can add their friends to join the activity together.</p>
        <label class="switch-row">Send Spot <input type="checkbox" checked></label>
        <p class="muted">Participants can transfer their spot to other user.</p>
        <label class="switch-row">Auto Cancel <input type="checkbox"></label>
        <p class="muted">Automatically cancels activity if minimum participant count is not met by cutoff time.</p>
        <label class="switch-row">Allow Reschedule <input type="checkbox"></label>
        <p class="muted">Participants can reschedule their activities before specified cutoff time.</p>
        <label>Minimum Quantity <input class="form-control" type="number" value="1"></label>
    </div>
</section>
<?= $this->endSection() ?>
