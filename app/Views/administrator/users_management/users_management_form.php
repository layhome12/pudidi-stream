<div class="row">
    <div class="col-md-4">
        <img class="img-thumbnail img-form-profile" src="<?= base_url('/public/users_img') ?>/<?= $user['user_img'] != '' ? $user['user_img'] : 'no-profile.png' ?>" alt="Image description">
    </div>
    <div class="col-md-8">
        <div class="card card-custom-border">
            <div class="card-body">
                <h4 class="text-center font-bold mt-1"><?= $user['user_nama']; ?></h4>
            </div>
        </div>
        <div class="card card-custom-border mt-3">
            <div class="card-body pl-4 pr-4">
                <div class="row mt-3 mb-3 ml-auto mr-auto">
                    <div class="col-md-7">
                        <span class="text-primary icon-user-form">
                            <i class="fa fa-at"></i>
                        </span>
                        <?= $user['email']; ?>
                    </div>
                    <div class="col-md-5">
                        <span class="text-primary icon-user-form">
                            <i class="fa fa-flag"></i>
                        </span>
                        <?= $user['country_nama']; ?>
                    </div>
                </div>
                <div class="row mt-3 mb-3 ml-auto mr-auto">
                    <div class="col-md-7">
                        <span class="text-primary icon-user-form">
                            <i class="fa fa-calendar-plus"></i>
                        </span>
                        <?= $user['user_tgl_lahir']; ?>
                    </div>
                    <div class="col-md-5">
                        <span class="text-primary icon-user-form">
                            <i class="fa fa-user-check"></i>
                        </span>
                        <?= $user['is_active'] == 1 ? 'Actived' : 'Not Active'; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>