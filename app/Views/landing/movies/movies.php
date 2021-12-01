<?= $this->extend('partial/landing'); ?>
<?= $this->section('content') ?>
<style>
    /* Custom CSS Here */
</style>

<!-- details -->
<section class="section section--head section--head-fixed section--gradient section--details-bg">
    <div class="section__bg" data-bg="<?= base_url('public/video_kategori_img') ?>/<?= img_check($movies['video_kategori_img']) ?>">

    </div>
    <div class="container">
        <!-- article -->
        <div class="article">
            <div class="row">
                <div class="col-12 col-xl-8">

                    <!-- article content -->
                    <div class="article__content">
                        <h1><?= $movies['video_nama'] ?></h1>

                        <ul class="list">
                            <li>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M22,9.67A1,1,0,0,0,21.14,9l-5.69-.83L12.9,3a1,1,0,0,0-1.8,0L8.55,8.16,2.86,9a1,1,0,0,0-.81.68,1,1,0,0,0,.25,1l4.13,4-1,5.68A1,1,0,0,0,6.9,21.44L12,18.77l5.1,2.67a.93.93,0,0,0,.46.12,1,1,0,0,0,.59-.19,1,1,0,0,0,.4-1l-1-5.68,4.13-4A1,1,0,0,0,22,9.67Zm-6.15,4a1,1,0,0,0-.29.88l.72,4.2-3.76-2a1.06,1.06,0,0,0-.94,0l-3.76,2,.72-4.2a1,1,0,0,0-.29-.88l-3-3,4.21-.61a1,1,0,0,0,.76-.55L12,5.7l1.88,3.82a1,1,0,0,0,.76.55l4.21.61Z" />
                                </svg> <?= $movies['video_rating'] ?>
                            </li>
                            <li><?= $movies['video_kategori_nama'] ?></li>
                            <li><?= $movies['video_tahun'] ?></li>
                        </ul>
                    </div>
                    <!-- end article content -->
                </div>

                <!-- video player -->
                <div class="col-12 col-xl-9">
                    <video controls crossorigin playsinline poster="<?= base_url('/public/video_thumbnail') ?>/<?= img_check($movies['video_thumbnail']) ?>" id="player" data-key="<?= $key ?>">
                        <!-- Video files -->
                        <source src="<?= base_url('/writable/video_file') ?>/<?= $movies['video_file'] ?>" type="video/mp4">

                        <!-- Caption files -->
                        <?php if ($movies['video_subtitle'] != '') : ?>
                            <track kind="captions" label="Indonesia" srclang="ina" src="<?= base_url('/writable/video_subtitle') ?>/<?= $movies['video_subtitle'] ?>" default>
                        <?php endif; ?>

                        <!-- Fallback for browsers that don't support the <video> element -->
                        <a href="<?= base_url('/writable/video_file') ?>/<?= $movies['video_file'] ?>" download>Download</a>
                    </video>

                    <div class="article__actions article__actions--details">
                        <!-- add .active class -->
                        <button class="article__favorites" type="button" disabled>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                            </svg> Dilihat <?= $movies['video_dilihat'] ?>x
                        </button>
                        <button class="article__favorites" type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M16,2H8A3,3,0,0,0,5,5V21a1,1,0,0,0,.5.87,1,1,0,0,0,1,0L12,18.69l5.5,3.18A1,1,0,0,0,18,22a1,1,0,0,0,.5-.13A1,1,0,0,0,19,21V5A3,3,0,0,0,16,2Zm1,17.27-4.5-2.6a1,1,0,0,0-1,0L7,19.27V5A1,1,0,0,1,8,4h8a1,1,0,0,1,1,1Z"></path>
                            </svg> Tambah ke favorit
                        </button>
                    </div>
                    <div class="article__content mt-3">
                        <p>
                            <?= $movies['video_deskripsi'] ?>
                        </p>
                    </div>
                </div>
                <!-- end video player -->

                <div class="col-12 col-xl-8">
                    <!-- categories -->
                    <div class="categories">
                        <h3 class="categories__title">Genre</h3>
                        <?php foreach ($genre as $row) : ?>
                            <a href="<?= base_url('movies/genre') ?>/<?= seo_url($row['video_genre_nama']) ?>" class="categories__item"><?= $row['video_genre_nama'] ?></a>
                        <?php endforeach; ?>
                    </div>
                    <!-- end categories -->

                    <!-- share -->
                    <div class="share">
                        <h3 class="share__title">Share</h3>
                        <a href="#" class="share__link share__link--fb"><svg width="9" height="17" viewBox="0 0 9 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.56341 16.8197V8.65888H7.81615L8.11468 5.84663H5.56341L5.56724 4.43907C5.56724 3.70559 5.63693 3.31257 6.69042 3.31257H8.09873V0.5H5.84568C3.1394 0.5 2.18686 1.86425 2.18686 4.15848V5.84695H0.499939V8.6592H2.18686V16.8197H5.56341Z" />
                            </svg> share</a>
                        <a href="#" class="share__link share__link--tw"><svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.55075 3.19219L7.58223 3.71122L7.05762 3.64767C5.14804 3.40404 3.47978 2.57782 2.06334 1.1902L1.37085 0.501686L1.19248 1.01013C0.814766 2.14353 1.05609 3.34048 1.843 4.14552C2.26269 4.5904 2.16826 4.65396 1.4443 4.38914C1.19248 4.3044 0.972149 4.24085 0.951164 4.27263C0.877719 4.34677 1.12953 5.31069 1.32888 5.69202C1.60168 6.22165 2.15777 6.74068 2.76631 7.04787L3.28043 7.2915L2.67188 7.30209C2.08432 7.30209 2.06334 7.31268 2.12629 7.53512C2.33613 8.22364 3.16502 8.95452 4.08833 9.2723L4.73884 9.49474L4.17227 9.8337C3.33289 10.321 2.34663 10.5964 1.36036 10.6175C0.888211 10.6281 0.5 10.6705 0.5 10.7023C0.5 10.8082 1.78005 11.4014 2.52499 11.6344C4.75983 12.3229 7.41435 12.0264 9.40787 10.8506C10.8243 10.0138 12.2408 8.35075 12.9018 6.74068C13.2585 5.88269 13.6152 4.315 13.6152 3.56293C13.6152 3.07567 13.6467 3.01212 14.2343 2.42953C14.5805 2.09056 14.9058 1.71983 14.9687 1.6139C15.0737 1.41264 15.0632 1.41264 14.5281 1.59272C13.6362 1.91049 13.5103 1.86812 13.951 1.39146C14.2762 1.0525 14.6645 0.438131 14.6645 0.258058C14.6645 0.22628 14.5071 0.279243 14.3287 0.374576C14.1398 0.480501 13.7202 0.639389 13.4054 0.734722L12.8388 0.914795L12.3247 0.565241C12.0414 0.374576 11.6427 0.162725 11.4329 0.0991699C10.8978 -0.0491255 10.0794 -0.0279404 9.59673 0.14154C8.2852 0.618204 7.45632 1.84694 7.55075 3.19219Z" />
                            </svg> tweet</a>
                        <a href="#" class="share__link share__link--vk"><svg width="16" height="9" viewBox="0 0 16 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.78479 8.92255C8.78479 8.92255 9.07355 8.89106 9.22145 8.73512C9.35684 8.59224 9.35214 8.32262 9.35214 8.32262C9.35214 8.32262 9.33414 7.06361 9.92967 6.87771C10.5166 6.69489 11.2702 8.09524 12.07 8.63372C12.6741 9.04085 13.1327 8.95174 13.1327 8.95174L15.2699 8.92255C15.2699 8.92255 16.3874 8.85495 15.8576 7.99231C15.8137 7.92164 15.5485 7.35397 14.269 6.1879C12.9284 4.9673 13.1084 5.16472 14.7221 3.05305C15.705 1.76715 16.0978 0.982093 15.975 0.646407C15.8584 0.325317 15.1353 0.410582 15.1353 0.410582L12.7297 0.425177C12.7297 0.425177 12.5513 0.401365 12.419 0.478949C12.2899 0.554996 12.2061 0.732441 12.2061 0.732441C12.2061 0.732441 11.8258 1.72721 11.3179 2.57372C10.2466 4.35892 9.81855 4.4534 9.64326 4.34279C9.23554 4.08392 9.33727 3.30424 9.33727 2.75039C9.33727 1.01973 9.60491 0.298431 8.81687 0.111769C8.5555 0.0495478 8.36299 0.00883541 7.6939 0.00192196C6.83543 -0.00652779 6.10921 0.00499461 5.69758 0.202411C5.42369 0.333767 5.2124 0.627203 5.34152 0.644103C5.50038 0.664843 5.86036 0.739354 6.0513 0.994383C6.29781 1.32392 6.2892 2.06289 6.2892 2.06289C6.2892 2.06289 6.43084 4.10005 5.95818 4.35277C5.6342 4.52638 5.1897 4.17226 4.2342 2.55221C3.7451 1.7226 3.37573 0.805416 3.37573 0.805416C3.37573 0.805416 3.30451 0.634117 3.17696 0.541938C3.02279 0.430555 2.80759 0.395987 2.80759 0.395987L0.521729 0.410582C0.521729 0.410582 0.178185 0.4198 0.0521924 0.566519C-0.0597138 0.696338 0.0435842 0.965961 0.0435842 0.965961C0.0435842 0.965961 1.8333 5.07638 3.86013 7.1481C5.71871 9.04699 7.8285 8.92255 7.8285 8.92255H8.78479Z" />
                            </svg> share</a>
                    </div>
                    <!-- end share -->
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-xl-8">
                    <!-- comments and reviews -->
                    <div class="comments">
                        <!-- tabs nav -->
                        <ul class="nav nav-tabs comments__title comments__title--tabs" id="comments__tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">
                                    <h4>Komentar</h4>
                                    <span id="ammount_comment" data-ammount="<?= $ammount_comment ?>"><?= $ammount_comment ?></span>
                                </a>
                            </li>
                        </ul>
                        <!-- end tabs nav -->

                        <!-- tabs -->
                        <div class="tab-content">
                            <!-- comments -->
                            <div class="tab-pane fade show active" id="tab-1" role="tabpanel">
                                <ul class="comments__list" id="skeleton">

                                    <?php foreach ($comment as $row) : ?>
                                        <li class="comments__item">
                                            <div class="comments__autor">
                                                <img class="comments__avatar" src="<?= base_url('public/users_img') ?>/<?= img_check($row['user_img']); ?>" alt="">
                                                <span class="comments__name"><?= $row['user_nama']; ?></span>
                                                <span class="comments__time"><?= $row['created_time']; ?></span>
                                            </div>
                                            <p class="comments__text">
                                                <?= $row['video_komentar']; ?>
                                            </p>
                                            <div class="comments__actions">
                                                <div class="comments__rate">
                                                    <button type="button">
                                                        <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M11 7.3273V14.6537" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path d="M14.6667 10.9905H7.33333" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M15.6857 1H6.31429C3.04762 1 1 3.31208 1 6.58516V15.4148C1 18.6879 3.0381 21 6.31429 21H15.6857C18.9619 21 21 18.6879 21 15.4148V6.58516C21 3.31208 18.9619 1 15.6857 1Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        </svg> 0
                                                    </button>
                                                    <button type="button">0
                                                        <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M14.6667 10.9905H7.33333" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M15.6857 1H6.31429C3.04762 1 1 3.31208 1 6.58516V15.4148C1 18.6879 3.0381 21 6.31429 21H15.6857C18.9619 21 21 18.6879 21 15.4148V6.58516C21 3.31208 18.9619 1 15.6857 1Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        </svg>
                                                    </button>
                                                </div>

                                                <button type="button">
                                                    <svg xmlns='http://www.w3.org/2000/svg' width='512' height='512' viewBox='0 0 512 512'>
                                                        <polyline points='400 160 464 224 400 288' style='fill:none;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px' />
                                                        <path d='M448,224H154C95.24,224,48,273.33,48,332v20' style='fill:none;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px' />
                                                    </svg>
                                                    <span>Reply</span>
                                                </button>
                                            </div>
                                        </li>
                                    <?php endforeach; ?>

                                </ul>

                                <form action="<?= base_url('comment_save') ?>" method="POST" onsubmit="return false" class="comments__form" id="form-comment">
                                    <div class="sign__group">
                                        <input type="hidden" name="video_key" value="<?= $key; ?>">
                                        <textarea id="video_comment" name="video_komentar" class="sign__textarea" placeholder="Tambah Komentar" required></textarea>
                                    </div>
                                    <button type="submit" class="sign__btn">Kirim</button>
                                </form>
                            </div>
                            <!-- end comments -->
                        </div>
                        <!-- end tabs -->
                    </div>
                    <!-- end comments and reviews -->
                </div>

                <div class="col-12 col-xl-4">
                    <div class="sidebar sidebar--mt">

                        <!-- new items -->
                        <div class="row row--grid">
                            <div class="col-12">
                                <h5 class="sidebar__title">Film Terbaru</h5>
                            </div>

                            <?php foreach ($terbaru as $row) : ?>
                                <div class="col-6 col-sm-4 col-md-3 col-xl-6">
                                    <div class="card">
                                        <a href="<?= base_url('movies/' . seo_url_encode($row['video_nama'], $row['video_id'])); ?>" class="card__cover skeleton_linked">
                                            <img src="<?= base_url() ?>/public/video_thumbnail/<?= img_check($row['video_thumbnail']); ?>" alt="" class="card-movies">
                                            <svg class="skeleton_removed" width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M11 1C16.5228 1 21 5.47716 21 11C21 16.5228 16.5228 21 11 21C5.47716 21 1 16.5228 1 11C1 5.47716 5.47716 1 11 1Z" stroke-linecap="round" stroke-linejoin="round" />
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M14.0501 11.4669C13.3211 12.2529 11.3371 13.5829 10.3221 14.0099C10.1601 14.0779 9.74711 14.2219 9.65811 14.2239C9.46911 14.2299 9.28711 14.1239 9.19911 13.9539C9.16511 13.8879 9.06511 13.4569 9.03311 13.2649C8.93811 12.6809 8.88911 11.7739 8.89011 10.8619C8.88911 9.90489 8.94211 8.95489 9.04811 8.37689C9.07611 8.22089 9.15811 7.86189 9.18211 7.80389C9.22711 7.69589 9.30911 7.61089 9.40811 7.55789C9.48411 7.51689 9.57111 7.49489 9.65811 7.49789C9.74711 7.49989 10.1091 7.62689 10.2331 7.67589C11.2111 8.05589 13.2801 9.43389 14.0401 10.2439C14.1081 10.3169 14.2951 10.5129 14.3261 10.5529C14.3971 10.6429 14.4321 10.7519 14.4321 10.8619C14.4321 10.9639 14.4011 11.0679 14.3371 11.1549C14.3041 11.1999 14.1131 11.3999 14.0501 11.4669Z" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </a>
                                        <button class="card__add skeleton_removed" type="button">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                <path d="M16,2H8A3,3,0,0,0,5,5V21a1,1,0,0,0,.5.87,1,1,0,0,0,1,0L12,18.69l5.5,3.18A1,1,0,0,0,18,22a1,1,0,0,0,.5-.13A1,1,0,0,0,19,21V5A3,3,0,0,0,16,2Zm1,17.27-4.5-2.6a1,1,0,0,0-1,0L7,19.27V5A1,1,0,0,1,8,4h8a1,1,0,0,1,1,1Z" />
                                            </svg>
                                        </button>
                                        <span class="card__rating skeleton_removed">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                <path d="M22,9.67A1,1,0,0,0,21.14,9l-5.69-.83L12.9,3a1,1,0,0,0-1.8,0L8.55,8.16,2.86,9a1,1,0,0,0-.81.68,1,1,0,0,0,.25,1l4.13,4-1,5.68A1,1,0,0,0,6.9,21.44L12,18.77l5.1,2.67a.93.93,0,0,0,.46.12,1,1,0,0,0,.59-.19,1,1,0,0,0,.4-1l-1-5.68,4.13-4A1,1,0,0,0,22,9.67Zm-6.15,4a1,1,0,0,0-.29.88l.72,4.2-3.76-2a1.06,1.06,0,0,0-.94,0l-3.76,2,.72-4.2a1,1,0,0,0-.29-.88l-3-3,4.21-.61a1,1,0,0,0,.76-.55L12,5.7l1.88,3.82a1,1,0,0,0,.76.55l4.21.61Z" />
                                            </svg> <?= $row['video_rating']; ?>
                                        </span>
                                        <h3 class="card__title"><a href="<?= base_url('movies/' . seo_url_encode($row['video_nama'], $row['video_id'])); ?>" class="skeleton_linked"><?= $row['video_nama']; ?></a></h3>
                                        <ul class="card__list">
                                            <li><?= $row['video_kategori_nama']; ?></li>
                                            <li><?= $row['video_tahun']; ?></li>
                                        </ul>
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
<!-- end details -->

<!-- similar -->
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="section__title"><a href="category.html">Rekomendasi Film</a></h2>
            </div>

            <div class="col-12">
                <div class="section__carousel-wrap">
                    <div class="section__carousel owl-carousel" id="similar">
                        <?php foreach ($rekomendasi as $row) : ?>
                            <div class="card">
                                <a href="<?= base_url('movies/' . seo_url_encode($row['video_nama'], $row['video_id'])); ?>" class="card__cover skeleton_linked">
                                    <img src="<?= base_url() ?>/public/video_thumbnail/<?= img_check($row['video_thumbnail']); ?>" alt="" class="card-movies">
                                    <svg class="skeleton_removed" width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11 1C16.5228 1 21 5.47716 21 11C21 16.5228 16.5228 21 11 21C5.47716 21 1 16.5228 1 11C1 5.47716 5.47716 1 11 1Z" stroke-linecap="round" stroke-linejoin="round" />
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M14.0501 11.4669C13.3211 12.2529 11.3371 13.5829 10.3221 14.0099C10.1601 14.0779 9.74711 14.2219 9.65811 14.2239C9.46911 14.2299 9.28711 14.1239 9.19911 13.9539C9.16511 13.8879 9.06511 13.4569 9.03311 13.2649C8.93811 12.6809 8.88911 11.7739 8.89011 10.8619C8.88911 9.90489 8.94211 8.95489 9.04811 8.37689C9.07611 8.22089 9.15811 7.86189 9.18211 7.80389C9.22711 7.69589 9.30911 7.61089 9.40811 7.55789C9.48411 7.51689 9.57111 7.49489 9.65811 7.49789C9.74711 7.49989 10.1091 7.62689 10.2331 7.67589C11.2111 8.05589 13.2801 9.43389 14.0401 10.2439C14.1081 10.3169 14.2951 10.5129 14.3261 10.5529C14.3971 10.6429 14.4321 10.7519 14.4321 10.8619C14.4321 10.9639 14.4011 11.0679 14.3371 11.1549C14.3041 11.1999 14.1131 11.3999 14.0501 11.4669Z" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </a>
                                <button class="card__add skeleton_removed" type="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path d="M16,2H8A3,3,0,0,0,5,5V21a1,1,0,0,0,.5.87,1,1,0,0,0,1,0L12,18.69l5.5,3.18A1,1,0,0,0,18,22a1,1,0,0,0,.5-.13A1,1,0,0,0,19,21V5A3,3,0,0,0,16,2Zm1,17.27-4.5-2.6a1,1,0,0,0-1,0L7,19.27V5A1,1,0,0,1,8,4h8a1,1,0,0,1,1,1Z" />
                                    </svg>
                                </button>
                                <span class="card__rating skeleton_removed">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path d="M22,9.67A1,1,0,0,0,21.14,9l-5.69-.83L12.9,3a1,1,0,0,0-1.8,0L8.55,8.16,2.86,9a1,1,0,0,0-.81.68,1,1,0,0,0,.25,1l4.13,4-1,5.68A1,1,0,0,0,6.9,21.44L12,18.77l5.1,2.67a.93.93,0,0,0,.46.12,1,1,0,0,0,.59-.19,1,1,0,0,0,.4-1l-1-5.68,4.13-4A1,1,0,0,0,22,9.67Zm-6.15,4a1,1,0,0,0-.29.88l.72,4.2-3.76-2a1.06,1.06,0,0,0-.94,0l-3.76,2,.72-4.2a1,1,0,0,0-.29-.88l-3-3,4.21-.61a1,1,0,0,0,.76-.55L12,5.7l1.88,3.82a1,1,0,0,0,.76.55l4.21.61Z" />
                                    </svg> <?= $row['video_rating']; ?>
                                </span>
                                <h3 class="card__title"><a href="<?= base_url('movies/' . seo_url_encode($row['video_nama'], $row['video_id'])); ?>" class="skeleton_linked"><?= $row['video_nama']; ?></a></h3>
                                <ul class="card__list">
                                    <li><?= $row['video_kategori_nama']; ?></li>
                                    <li><?= $row['video_tahun']; ?></li>
                                </ul>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <button class="section__nav section__nav--cards section__nav--prev" data-nav="#similar" type="button">
                        <svg width="17" height="15" viewBox="0 0 17 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1.25 7.72559L16.25 7.72559" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M7.2998 1.70124L1.2498 7.72524L7.2998 13.7502" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                    <button class="section__nav section__nav--cards section__nav--next" data-nav="#similar" type="button">
                        <svg width="17" height="15" viewBox="0 0 17 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15.75 7.72559L0.75 7.72559" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M9.7002 1.70124L15.7502 7.72524L9.7002 13.7502" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end similar -->

<?= $this->endSection(); ?>

<?= $this->section('custom_js') ?>
<script>
    function get_comments() {
        loader_comments();
        $.post('<?= base_url('movies_comment/') ?>', {
            'vid': $('#player').data('key')
        }, function(result, textStatus, xhr) {
            $('#skeleton').html(result);
        });
    }

    function loader_comments() {
        var ammount = $('#ammount_comment').data('ammount');
        if (ammount > 0) {
            var html = " <p class='text-center font-s20px' id='spin-loader'><i class='fa fa-spinner fa-spin text-white'></i></p>";
            $('#skeleton').append(html);
        } else {
            var html = " <p class='text-center font-s20px' id='spin-loader'><i class='fa fa-spinner fa-spin text-white'></i></p>";
            $('#skeleton').html(html);
        }
    }
    $('#form-comment').submit(
        function() {
            $.ajax({
                url: this.action,
                type: 'POST',
                dataType: 'json',
                data: $(this).serialize(),
                success: function(result, textStatus, xhr) {
                    if (result.status > 0) {
                        $('#video_comment').val('');
                        $('#ammount_comment').text(result.data.ammount);
                        $('#ammount_comment').attr('data-ammount', result.data.ammount);
                        get_comments();
                    } else {
                        toastr.error(result.msg);
                    }
                }
            });
        }
    );
</script>
<?= $this->endSection(); ?>