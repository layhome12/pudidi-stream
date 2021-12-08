<?= $this->extend('partial/landing') ?>

<?= $this->section('content') ?>
<!-- head -->
<section class="section section--head section--head-fixed section--gradient section--details">
    <div class="container">
        <!-- article -->
        <div class="article">
            <div class="row">
                <div class="col-12 col-xl-8">
                    <!-- article content -->
                    <div class="article__content">
                        <a href="#" class="article__category">Review Movies</a>

                        <span class="article__date">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M12,2A10,10,0,1,0,22,12,10.01114,10.01114,0,0,0,12,2Zm0,18a8,8,0,1,1,8-8A8.00917,8.00917,0,0,1,12,20ZM14.09814,9.63379,13,10.26807V7a1,1,0,0,0-2,0v5a1.00025,1.00025,0,0,0,1.5.86621l2.59814-1.5a1.00016,1.00016,0,1,0-1-1.73242Z" />
                            </svg> <?= $reviews['created_time']; ?>
                        </span>

                        <h1><?= $reviews['video_review_nama']; ?></h1>
                        <img src="<?= base_url('/public/video_review_img') ?>/<?= $reviews['video_review_img']; ?>" alt="">

                        <div class="article__actions article__actions--details justify-content-start">
                            <!-- add .active class -->
                            <button class="article__favorites mt-0 mb-1" type="button" disabled>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                </svg> Dilihat <?= $reviews['video_review_dilihat'] ?>x
                            </button>
                        </div>

                        <div class="artikel mt-2">
                            <?= $reviews['video_review_isi']; ?>
                        </div>


                    </div>
                    <!-- end article content -->
                </div>

                <div class="col-12 col-xl-4">
                    <div class="sidebar">
                        <!-- new items -->
                        <div class="row">
                            <div class="col-12">
                                <h5 class="sidebar__title">Review Terbaru</h5>
                            </div>

                            <?php foreach ($terbaru as $row) : ?>
                                <div class="col-12 col-md-6 col-lg-4 col-xl-12">
                                    <div class="interview">
                                        <a href="<?= base_url('/reviews') . '/' . $row['video_review_seo'] ?>" class="interview__cover">
                                            <img src="<?= base_url('/public/video_review_img') ?>/<?= $row['video_review_img']; ?>" alt="">
                                            <span>
                                                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M13.1615 8.05308C13.1615 9.79908 11.7455 11.2141 9.9995 11.2141C8.2535 11.2141 6.8385 9.79908 6.8385 8.05308C6.8385 6.30608 8.2535 4.89108 9.9995 4.89108C11.7455 4.89108 13.1615 6.30608 13.1615 8.05308Z" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M9.998 15.3549C13.806 15.3549 17.289 12.6169 19.25 8.05289C17.289 3.48888 13.806 0.750885 9.998 0.750885H10.002C6.194 0.750885 2.711 3.48888 0.75 8.05289C2.711 12.6169 6.194 15.3549 10.002 15.3549H9.998Z" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                                <?= $row['video_review_dilihat']; ?>
                                            </span>
                                        </a>
                                        <h3 class="interview__title">
                                            <a href="<?= base_url('/reviews') . '/' . $row['video_review_seo'] ?>"><?= $row['video_review_nama']; ?></a>
                                        </h3>
                                    </div>
                                </div>
                            <?php endforeach; ?>

                        </div>
                        <!-- end new items -->
                    </div>
                </div>
            </div>
        </div>
        <!-- end article -->
    </div>
</section>
<!-- end head -->
<?= $this->endSection() ?>

<?= $this->section('custom_js') ?>

<?= $this->endSection() ?>