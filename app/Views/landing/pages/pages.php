<?= $this->extend('partial/landing'); ?>
<?= $this->section('content') ?>

<!-- head -->
<section class="section section--head section--head-fixed">
    <div class="container">
        <div class="row">
            <div class="col-12 col-xl-6">
                <h1 class="section__title section__title--head"><?= $pages['pages_nama']; ?></h1>
            </div>

            <div class="col-12 col-xl-6">
                <ul class="breadcrumb">
                    <li class="breadcrumb__item"><a href="#">Home</a></li>
                    <li class="breadcrumb__item">Pages</li>
                    <li class="breadcrumb__item breadcrumb__item--active"><?= $pages['pages_nama']; ?></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- end head -->

<!-- Content Render -->
<?= $pages['pages_isi']; ?>


<?= $this->endSection(); ?>

<?= $this->section('custom_js') ?>
<script>
    // Javascript Here
</script>
<?= $this->endSection(); ?>