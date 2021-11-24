<?= $this->extend('partial/landing'); ?>
<?= $this->section('content') ?>
<style>
    /* Custom CSS Here */
    .judul{
        font-weight: 800;
    }
</style>
<h1 class="text-center text-white section--head-fixed judul">INI HALAMAN LIST MOVIES <?= strtoupper($seo); ?></h1>
<?= $this->endSection(); ?>

<?= $this->section('custom_js') ?>
<script>
    // Javascript Here
</script>
<?= $this->endSection(); ?>