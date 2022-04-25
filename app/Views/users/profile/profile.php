<?= $this->extend('partial/landing'); ?>
<?= $this->section('content') ?>
<style>
    /* Custom CSS Here */
</style>

<!-- head -->
<section class="section section--head section--head-fixed">
    <div class="container">
        <div class="row">
            <div class="col-12 col-xl-6">
                <h1 class="section__title section__title--head">Profile</h1>
            </div>

            <div class="col-12 col-xl-6">
                <ul class="breadcrumb">
                    <li class="breadcrumb__item"><a href="<?= base_url(); ?>">Home</a></li>
                    <li class="breadcrumb__item breadcrumb__item--active">Profile</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- end head -->

<!-- profile -->
<div class="catalog catalog--page">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="profile">
                    <div class="profile__user">
                        <div class="profile__avatar">
                            <img src="<?= $user['user_img'] == '' ? base_url('public/public_assets/img/avatar.svg') : base_url('/public/users_img/' . $user['user_img']) ?>" alt="">
                        </div>
                        <div class="profile__meta">
                            <h3><?= $user['user_nama'] ?></h3>
                            <span><?= $user['email'] ?></span>
                        </div>
                    </div>

                    <!-- tabs nav -->
                    <ul class="nav nav-tabs profile__tabs" id="profile__tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link tabs-select active" data-tab="tab-1" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">Profile</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link tabs-select" data-tab="tab-2" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">Favorites</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link tabs-select" data-tab="tab-3" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3" aria-selected="false">Settings</a>
                        </li>
                        <?php if (session()->get('user_level_id') == 1) : ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_admin('/dashboard'); ?>">Control Panel</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                    <!-- end tabs nav -->
                    <a href="<?= base_url('logout'); ?>" class="profile__logout">
                        <span>Sign out</span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M4,12a1,1,0,0,0,1,1h7.59l-2.3,2.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0l4-4a1,1,0,0,0,.21-.33,1,1,0,0,0,0-.76,1,1,0,0,0-.21-.33l-4-4a1,1,0,1,0-1.42,1.42L12.59,11H5A1,1,0,0,0,4,12ZM17,2H7A3,3,0,0,0,4,5V8A1,1,0,0,0,6,8V5A1,1,0,0,1,7,4H17a1,1,0,0,1,1,1V19a1,1,0,0,1-1,1H7a1,1,0,0,1-1-1V16a1,1,0,0,0-2,0v3a3,3,0,0,0,3,3H17a3,3,0,0,0,3-3V5A3,3,0,0,0,17,2Z"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <!-- content tabs -->
        <div class="tab-content">
            <div class="tab-pane fade show active" id="content-tab">
                <div class="row row--grid testloading">
                    <!-- stats -->
                    <div class="col-12 col-sm-6 col-xl-4">
                        <div class="stats">
                            <span>Negara</span>
                            <p><?= $user['country_nama']; ?></p>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-flag" viewBox="0 0 16 16">
                                <path d="M14.778.085A.5.5 0 0 1 15 .5V8a.5.5 0 0 1-.314.464L14.5 8l.186.464-.003.001-.006.003-.023.009a12.435 12.435 0 0 1-.397.15c-.264.095-.631.223-1.047.35-.816.252-1.879.523-2.71.523-.847 0-1.548-.28-2.158-.525l-.028-.01C7.68 8.71 7.14 8.5 6.5 8.5c-.7 0-1.638.23-2.437.477A19.626 19.626 0 0 0 3 9.342V15.5a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 1 0v.282c.226-.079.496-.17.79-.26C4.606.272 5.67 0 6.5 0c.84 0 1.524.277 2.121.519l.043.018C9.286.788 9.828 1 10.5 1c.7 0 1.638-.23 2.437-.477a19.587 19.587 0 0 0 1.349-.476l.019-.007.004-.002h.001M14 1.221c-.22.078-.48.167-.766.255-.81.252-1.872.523-2.734.523-.886 0-1.592-.286-2.203-.534l-.008-.003C7.662 1.21 7.139 1 6.5 1c-.669 0-1.606.229-2.415.478A21.294 21.294 0 0 0 3 1.845v6.433c.22-.078.48-.167.766-.255C4.576 7.77 5.638 7.5 6.5 7.5c.847 0 1.548.28 2.158.525l.028.01C9.32 8.29 9.86 8.5 10.5 8.5c.668 0 1.606-.229 2.415-.478A21.317 21.317 0 0 0 14 7.655V1.222z" />
                            </svg>
                        </div>
                    </div>
                    <!-- end stats -->
                    <!-- stats -->
                    <div class="col-12 col-sm-6 col-xl-4">
                        <div class="stats">
                            <span>Favorit</span>
                            <p><?= $favorit; ?></p>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M22,9.67A1,1,0,0,0,21.14,9l-5.69-.83L12.9,3a1,1,0,0,0-1.8,0L8.55,8.16,2.86,9a1,1,0,0,0-.81.68,1,1,0,0,0,.25,1l4.13,4-1,5.68A1,1,0,0,0,6.9,21.44L12,18.77l5.1,2.67a.93.93,0,0,0,.46.12,1,1,0,0,0,.59-.19,1,1,0,0,0,.4-1l-1-5.68,4.13-4A1,1,0,0,0,22,9.67Zm-6.15,4a1,1,0,0,0-.29.88l.72,4.2-3.76-2a1.06,1.06,0,0,0-.94,0l-3.76,2,.72-4.2a1,1,0,0,0-.29-.88l-3-3,4.21-.61a1,1,0,0,0,.76-.55L12,5.7l1.88,3.82a1,1,0,0,0,.76.55l4.21.61Z" />
                            </svg>
                        </div>
                    </div>
                    <!-- end stats -->
                    <!-- stats -->
                    <div class="col-12 col-sm-6 col-xl-4">
                        <div class="stats">
                            <span>Komentar</span>
                            <p><?= $komentar; ?></p>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M8,11a1,1,0,1,0,1,1A1,1,0,0,0,8,11Zm4,0a1,1,0,1,0,1,1A1,1,0,0,0,12,11Zm4,0a1,1,0,1,0,1,1A1,1,0,0,0,16,11ZM12,2A10,10,0,0,0,2,12a9.89,9.89,0,0,0,2.26,6.33l-2,2a1,1,0,0,0-.21,1.09A1,1,0,0,0,3,22h9A10,10,0,0,0,12,2Zm0,18H5.41l.93-.93a1,1,0,0,0,.3-.71,1,1,0,0,0-.3-.7A8,8,0,1,1,12,20Z"></path>
                            </svg>
                        </div>
                    </div>
                    <!-- end stats -->

                    <!-- dashbox -->
                    <div class="col-12 col-xl-6">
                        <div class="dashbox">
                            <div class="dashbox__title">
                                <h3>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path d="M21,2a1,1,0,0,0-1,1V5H18V3a1,1,0,0,0-2,0V4H8V3A1,1,0,0,0,6,3V5H4V3A1,1,0,0,0,2,3V21a1,1,0,0,0,2,0V19H6v2a1,1,0,0,0,2,0V20h8v1a1,1,0,0,0,2,0V19h2v2a1,1,0,0,0,2,0V3A1,1,0,0,0,21,2ZM6,17H4V15H6Zm0-4H4V11H6ZM6,9H4V7H6Zm10,9H8V13h8Zm0-7H8V6h8Zm4,6H18V15h2Zm0-4H18V11h2Zm0-4H18V7h2Z" />
                                    </svg> List Untukmu
                                </h3>
                            </div>

                            <div class="dashbox__table-wrap dashbox__table-wrap--1">
                                <table class="main__table main__table--dash">
                                    <thead>
                                        <tr>
                                            <th>MOVIES</th>
                                            <th>GENRE</th>
                                            <th>RATING</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($list_untukmu as $row) : ?>
                                            <tr>
                                                <td>
                                                    <div class="main__table-text"><a href="<?= base_url('movie/' . seo_url_encode($row['video_nama'], $row['video_id'])); ?>"><?= $row['video_nama']; ?></a></div>
                                                </td>
                                                <td>
                                                    <div class="main__table-text"><?= $row['video_genre_nama']; ?></div>
                                                </td>
                                                <td>
                                                    <div class="main__table-text main__table-text--rate">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                            <path d="M22,9.67A1,1,0,0,0,21.14,9l-5.69-.83L12.9,3a1,1,0,0,0-1.8,0L8.55,8.16,2.86,9a1,1,0,0,0-.81.68,1,1,0,0,0,.25,1l4.13,4-1,5.68A1,1,0,0,0,6.9,21.44L12,18.77l5.1,2.67a.93.93,0,0,0,.46.12,1,1,0,0,0,.59-.19,1,1,0,0,0,.4-1l-1-5.68,4.13-4A1,1,0,0,0,22,9.67Zm-6.15,4a1,1,0,0,0-.29.88l.72,4.2-3.76-2a1.06,1.06,0,0,0-.94,0l-3.76,2,.72-4.2a1,1,0,0,0-.29-.88l-3-3,4.21-.61a1,1,0,0,0,.76-.55L12,5.7l1.88,3.82a1,1,0,0,0,.76.55l4.21.61Z" />
                                                        </svg> <?= $row['video_rating']; ?>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- end dashbox -->

                    <!-- dashbox -->
                    <div class="col-12 col-xl-6">
                        <div class="dashbox">
                            <div class="dashbox__title">
                                <h3>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-stopwatch" viewBox="0 0 16 16">
                                        <path d="M8.5 5.6a.5.5 0 1 0-1 0v2.9h-3a.5.5 0 0 0 0 1H8a.5.5 0 0 0 .5-.5V5.6z" />
                                        <path d="M6.5 1A.5.5 0 0 1 7 .5h2a.5.5 0 0 1 0 1v.57c1.36.196 2.594.78 3.584 1.64a.715.715 0 0 1 .012-.013l.354-.354-.354-.353a.5.5 0 0 1 .707-.708l1.414 1.415a.5.5 0 1 1-.707.707l-.353-.354-.354.354a.512.512 0 0 1-.013.012A7 7 0 1 1 7 2.071V1.5a.5.5 0 0 1-.5-.5zM8 3a6 6 0 1 0 .001 12A6 6 0 0 0 8 3z" />
                                    </svg> Terakhir Dilihat
                                </h3>
                            </div>

                            <div class="dashbox__table-wrap dashbox__table-wrap--2">
                                <table class="main__table main__table--dash">
                                    <thead>
                                        <tr>
                                            <th>MOVIES</th>
                                            <th>WAKTU</th>
                                            <!-- <th>DILIHAT</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($terakhir_dilihat as $row) : ?>
                                            <tr>
                                                <td>
                                                    <div class="main__table-text"><a href="<?= base_url('movie/' . seo_url_encode($row['video_nama'], $row['video_id'])); ?>"><?= $row['video_nama']; ?></a></div>
                                                </td>
                                                <td>
                                                    <div class="main__table-text"><?= $row['created_time']; ?></div>
                                                </td>
                                                <!-- <td>
                                                    <div class="main__table-text main__table-text--rate">
                                                        <?= $row['history_dilihat_loop']; ?>
                                                    </div>
                                                </td> -->
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- end dashbox -->
                </div>
            </div>

        </div>
        <!-- end content tabs -->
    </div>
</div>
<!-- end profile -->

<?= $this->endSection(); ?>

<?= $this->section('custom_js') ?>
<script>
    $(".tabs-select").each(
        function() {
            $(this).on('click', function() {
                var url, data;
                var tabs = $(this).data('tab');
                $('#content-tab').LoadingOverlay('show', {
                    size: 15,
                    imageColor: "#ffffff",
                    background: "rgba(255, 255, 255, 0.03)"
                });
                switch (tabs) {
                    case 'tab-1':
                        url = '<?= base_user('/profile/profile') ?>';
                        break;
                    case 'tab-2':
                        url = '<?= base_user('/profile/favorite') ?>';
                        break;
                    case 'tab-3':
                        url = '<?= base_user('/profile/setting') ?>';
                        break;
                }
                $.post(url, {
                    'data': 0
                }, function(result, textStatus, xhr) {
                    $('#content-tab').html(result);
                    $('#content-tab').LoadingOverlay('hide');
                });
            });
        }
    );
</script>
<?= $this->endSection(); ?>