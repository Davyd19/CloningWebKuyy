<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<section class="page-card narrow">
    <a class="back-link" href="<?= base_url('add-activity') ?>">Back</a>
    <h1>Form Questions</h1>
    <h2>General Questions</h2>
    <p class="muted">Regularly asked questions that you can use.</p>
    <?php
        $questions = [
            ['Name', true], ['Email', true], ['Phone', true], ['Instagram', false],
            ['Date of Birth', false], ['Gender', false], ['Domicile', false], ['Weight', false],
            ['Height', false], ['Address', false], ['Blood Type', false], ['ID Card', false],
            ['Emergency Contact', false], ['Shoe Size', false], ['Nationality', false],
        ];
    ?>
    <div class="question-list">
        <?php foreach ($questions as [$question, $checked]): ?>
            <label>
                <span><?= esc($question) ?></span>
                <input type="checkbox" <?= $checked ? 'checked disabled' : '' ?>>
            </label>
        <?php endforeach; ?>
    </div>
    <button class="text-button" type="button">Add Question</button>
</section>
<?= $this->endSection() ?>
