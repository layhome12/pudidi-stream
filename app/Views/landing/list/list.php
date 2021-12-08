<?= $this->extend('partial/landing'); ?>
<?= $this->section('content') ?>

<!-- head -->
<section class="section section--head section--head-fixed">
    <div class="container">
        <div class="row">
            <div class="col-12 col-xl-6">
                <h1 class="section__title section__title--head" id="list-title" data-id="<?= $list['id']; ?>"><?= $list['val']; ?></h1>
            </div>

            <div class="col-12 col-xl-6">
                <ul class="breadcrumb">
                    <li class="breadcrumb__item"><a href="<?= base_url(); ?>">Home</a></li>
                    <li class="breadcrumb__item breadcrumb__item--active"><?= $list['val']; ?></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- end head -->

<!-- catalog -->
<div class="catalog pt-0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="catalog__nav">
                    <div class="catalog__select-wrap dm-none">
                        <div class="col-md-2 col-xs-6 p-0">
                            <select class="sign__input select2" id="video_genre" style="width: 90%;">
                                <option value="0">Semua Genre</option>
                                <?php new \App\Libraries\SelectBuilder([
                                    'table' => 'video_genre',
                                    'val_id' => 'video_genre_id',
                                    'val_text' => 'video_genre_nama'
                                ]); ?>
                            </select>
                        </div>

                        <div class="col-md-2 col-xs-6 p-0">
                            <select class="sign__input select2" id="video_negara" style="width: 90%;">
                                <option value="0">Semua Negara</option>
                                <?php foreach ($negara as $row) : ?>
                                    <option value="<?= $row['id'] ?>"><?= $row['text'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="col-md-2 col-xs-6 p-0">
                            <select class="sign__input select2" id="video_tahun" style="width: 90%;">
                                <option value="0">Semua Tahun</option>
                                <?php foreach ($tahun as $row) : ?>
                                    <option value="<?= $row['id'] ?>"><?= $row['text'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row row--grid" id="skeleton" data-movies="<?= $total_movies ?>">

                    <?php foreach ($list_movies as $row) : ?>
                        <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                            <div class="card">
                                <a href="<?= base_url('movies/' . seo_url_encode($row['video_nama'], $row['video_id'])); ?>" class="card__cover skeleton_linked">
                                    <img src="<?= base_url() ?>/public/video_thumbnail/<?= img_check($row['video_thumbnail']); ?>" alt="" class="card-movies">
                                    <svg class="skeleton_removed" width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11 1C16.5228 1 21 5.47716 21 11C21 16.5228 16.5228 21 11 21C5.47716 21 1 16.5228 1 11C1 5.47716 5.47716 1 11 1Z" stroke-linecap="round" stroke-linejoin="round" />
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M14.0501 11.4669C13.3211 12.2529 11.3371 13.5829 10.3221 14.0099C10.1601 14.0779 9.74711 14.2219 9.65811 14.2239C9.46911 14.2299 9.28711 14.1239 9.19911 13.9539C9.16511 13.8879 9.06511 13.4569 9.03311 13.2649C8.93811 12.6809 8.88911 11.7739 8.89011 10.8619C8.88911 9.90489 8.94211 8.95489 9.04811 8.37689C9.07611 8.22089 9.15811 7.86189 9.18211 7.80389C9.22711 7.69589 9.30911 7.61089 9.40811 7.55789C9.48411 7.51689 9.57111 7.49489 9.65811 7.49789C9.74711 7.49989 10.1091 7.62689 10.2331 7.67589C11.2111 8.05589 13.2801 9.43389 14.0401 10.2439C14.1081 10.3169 14.2951 10.5129 14.3261 10.5529C14.3971 10.6429 14.4321 10.7519 14.4321 10.8619C14.4321 10.9639 14.4011 11.0679 14.3371 11.1549C14.3041 11.1999 14.1131 11.3999 14.0501 11.4669Z" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </a>
                                <button class="card__add skeleton_removed <?= isset($row['is_favorit']) ? 'active' : '' ?>" type="button" onclick="addFavorite(this)" data-fav="<?= isset($row['is_favorit']) ? '1' : '0' ?>" data-eid="<?= str_encrypt($row['video_id']) ?>">
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
                                    <li><?= $row['video_genre_nama']; ?></li>
                                    <li><?= $row['video_tahun']; ?></li>
                                </ul>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <button type="button" class="catalog__more" id="btn-load">
                    Load More
                </button>
            </div>
        </div>

    </div>
</div>
<!-- end catalog -->

<!-- subscriptions -->
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="section__title">Untuk Anda</h2>
            </div>
            <div class="col-12">
                <div class="section__carousel-wrap">
                    <div class="section__carousel owl-carousel" id="subscriptions">
                        <?php foreach ($rekomendasi as $row) : ?>
                            <div class="card">
                                <a href="<?= base_url('movies/' . seo_url_encode($row['video_nama'], $row['video_id'])); ?>" class="card__cover">
                                    <img src="<?= base_url() ?>/public/video_thumbnail/<?= img_check($row['video_thumbnail']); ?>" alt="" class="card-movies">
                                    <svg width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M13.1615 8.05308C13.1615 9.79908 11.7455 11.2141 9.9995 11.2141C8.2535 11.2141 6.8385 9.79908 6.8385 8.05308C6.8385 6.30608 8.2535 4.89108 9.9995 4.89108C11.7455 4.89108 13.1615 6.30608 13.1615 8.05308Z" stroke-linecap="round" stroke-linejoin="round" />
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M9.998 15.3549C13.806 15.3549 17.289 12.6169 19.25 8.05289C17.289 3.48888 13.806 0.750885 9.998 0.750885H10.002C6.194 0.750885 2.711 3.48888 0.75 8.05289C2.711 12.6169 6.194 15.3549 10.002 15.3549H9.998Z" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </a>
                                <button class="card__add <?= isset($row['is_favorit']) ? 'active' : '' ?>" type="button" onclick="addFavorite(this)" data-fav="<?= isset($row['is_favorit']) ? '1' : '0' ?>" data-eid="<?= str_encrypt($row['video_id']) ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path d="M16,2H8A3,3,0,0,0,5,5V21a1,1,0,0,0,.5.87,1,1,0,0,0,1,0L12,18.69l5.5,3.18A1,1,0,0,0,18,22a1,1,0,0,0,.5-.13A1,1,0,0,0,19,21V5A3,3,0,0,0,16,2Zm1,17.27-4.5-2.6a1,1,0,0,0-1,0L7,19.27V5A1,1,0,0,1,8,4h8a1,1,0,0,1,1,1Z" />
                                    </svg>
                                </button>
                                <span class="card__rating">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path d="M22,9.67A1,1,0,0,0,21.14,9l-5.69-.83L12.9,3a1,1,0,0,0-1.8,0L8.55,8.16,2.86,9a1,1,0,0,0-.81.68,1,1,0,0,0,.25,1l4.13,4-1,5.68A1,1,0,0,0,6.9,21.44L12,18.77l5.1,2.67a.93.93,0,0,0,.46.12,1,1,0,0,0,.59-.19,1,1,0,0,0,.4-1l-1-5.68,4.13-4A1,1,0,0,0,22,9.67Zm-6.15,4a1,1,0,0,0-.29.88l.72,4.2-3.76-2a1.06,1.06,0,0,0-.94,0l-3.76,2,.72-4.2a1,1,0,0,0-.29-.88l-3-3,4.21-.61a1,1,0,0,0,.76-.55L12,5.7l1.88,3.82a1,1,0,0,0,.76.55l4.21.61Z" />
                                    </svg> <?= $row['video_rating']; ?>
                                </span>
                                <h3 class="card__title card__title--subs"><a href="<?= base_url('movies/' . seo_url_encode($row['video_nama'], $row['video_id'])); ?>"><?= $row['video_nama'] ?></a></h3>
                                <ul class="card__list card__list--subs">
                                    <li>Sudah ditonton <?= $row['video_dilihat'] ?>x</li>
                                </ul>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <button class="section__nav section__nav--cards section__nav--prev" data-nav="#subscriptions" type="button">
                        <svg width="17" height="15" viewBox="0 0 17 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1.25 7.72559L16.25 7.72559" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M7.2998 1.70124L1.2498 7.72524L7.2998 13.7502" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                    <button class="section__nav section__nav--cards section__nav--next" data-nav="#subscriptions" type="button">
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
<!-- end subscriptions -->


<?= $this->endSection(); ?>

<?= $this->section('custom_js') ?>
<script>
    var page = 0,
        dataPage, limit = 12;
    $('.select2').select2();
    $(document).ready(
        function() {
            skeleton_loader();
        }
    );

    function skeleton_loader() {
        $('.skeleton_removed').remove();
        $('.skeleton_linked').attr('href', '#');
        $('#skeleton').scheletrone();
        $.post('<?= base_url('utils/get_list_movies'); ?>', {
            'country_id': $('#video_negara').val(),
            'video_tahun': $('#video_tahun').val(),
            'video_genre': $('#video_genre').val(),
            'ordering': $('#list-title').data('id')
        }, function(result, textStatus, xhr) {
            get_pagination();
            setTimeout(function() {
                $('#skeleton').scheletrone('stopLoader').html(result);
            }, 200);
        });
    }

    function get_pagination() {
        var vnid = $('#video_negara').val();
        var vgen = $('#video_genre').val();
        var tahun = $('#video_tahun').val();
        $.post('<?= base_url('utils/get_count_data') ?>', {
            'country_id': vnid,
            'video_genre_id': vgen,
            'video_tahun': tahun
        }, function(result, textStatus, xhr) {
            $('#skeleton').attr('data-movies', result.data.amount);
            if (result.data.amount <= limit) {
                $('#btn-load').hide();
            } else {
                page = 0;
                $('#btn-load').empty().html("Load More");
                $('#btn-load').prop('disabled', false);
                $('#btn-load').show();
            }
        }, 'json');
    }

    $('#video_negara').change(
        function() {
            skeleton_loader();
        }
    );
    $('#video_tahun').change(
        function() {
            skeleton_loader();
        }
    );
    $('#video_genre').change(
        function() {
            skeleton_loader();
        }
    );
    $('#btn-load').click(
        function() {
            page += 1;
            $(this).empty().html("<i class='fa fa-spinner fa-spin font-s15px'></i>");
            $(this).prop('disabled', true);
            $.post('<?= base_url('utils/get_list_movies'); ?>', {
                'country_id': $('#video_negara').val(),
                'video_tahun': $('#video_tahun').val(),
                'video_genre': $('#video_genre').val(),
                'ordering': $('#list-title').data('id'),
                'pagination': page
            }, function(result, textStatus, xhr) {
                setTimeout(function() {
                    dataPage = (page + 1) * limit;
                    if (dataPage >= $('#skeleton').data('movies')) {
                        $('#btn-load').hide();
                    } else {
                        $('#btn-load').prop('disabled', false);
                        $('#btn-load').empty().html("Load More");
                    }
                    $('#skeleton').append(result);
                }, 500);
            });
        }
    );
</script>
<?= $this->endSection(); ?>