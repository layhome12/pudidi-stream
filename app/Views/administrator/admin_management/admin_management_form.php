<div class="row">
    <div class="col-md-4">
        <input type="file" name="user_img" id="user_img" class="d-none" accept=".jpg,.jpeg,.png">
        <img class="img-thumbnail img-form-profile-admin cursor-pointer" id="user_img_show" src="<?= base_url('/public/users_img') ?>/<?= isset($user['user_img']) ? img_check($user['user_img']) : 'no-image.png' ?>" alt="Image Profile">
    </div>
    <div class="col-md-8">
        <div class="card card-custom-border">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="nama_admin">Nama Admin</label>
                            <input type="hidden" name="user_id" value="<?= isset($user['user_id']) ? $user['user_id'] : '' ?>">
                            <input type="text" class="form-control" name="user_nama" id="nama_admin" value="<?= isset($user['user_nama']) ? $user['user_nama'] : '' ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tgl_lahir">Tgl Lahir</label>
                            <input type="text" class="form-control date-picker" name="user_tgl_lahir" id="tgl_lahir" value="<?= isset($user['user_tgl_lahir']) ? $user['user_tgl_lahir'] : '' ?>" data-language="en" data-date-format="yyyy-mm-dd" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="country">Country</label>
                            <select class="form-control select2" name="country_id" id="country" style="width: 100%;">
                                <?php foreach ($country as $row) : ?>
                                    <option value="<?= $row['country_id'] ?>" <?= isset($user['country_nama']) ? selected($row['country_id'], $user['country_id']) : '' ?>><?= $row['country_nama'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" name="email" id="email" value="<?= isset($user['email']) ? $user['email'] : '' ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password" <?= isset($user['user_id']) ? '' : 'required' ?>>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('.select2').select2();
    $('.date-picker').datepicker();
    $('#user_img_show').click(
        function() {
            $('#user_img').trigger('click');
        }
    );
    $('#user_img').change(
        function() {
            var img = this.files[0];
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#user_img_show').attr('src', e.target.result);
            }
            reader.readAsDataURL(img);
        }
    );
</script>