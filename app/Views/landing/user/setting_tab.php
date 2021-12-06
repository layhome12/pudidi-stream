<div class="row">
    <div class="col-12">
        <div class="sign__wrap">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8">
                    <form method="POST" action="<?= base_url('users_setting_save'); ?>" id="form-data" class="sign__form d-block sign__form--profile sign__form--first" enctype="multipart/form-data" onsubmit="return false">
                        <h4 class="sign__title">Ubah Profile</h4>
                        <div class="row">
                            <div class="col-12 col-md-4">
                                <div class="form__img">
                                    <label for="form__img-upload">230x230px</label>
                                    <input id="form__img-upload" name="user_img" type="file" accept=".png, .jpg, .jpeg">
                                    <img id="form__img" src="<?= $users['user_img'] == '' ? '#' : base_url('/public/users_img/' . $users['user_img']) ?>" alt="">
                                </div>
                            </div>
                            <div class="col-12 col-md-8">
                                <div class="sign__group">
                                    <label class="sign__label" for="user_nama">Nama</label>
                                    <input id="user_nama" type="text" name="user_nama" class="sign__input" placeholder="Nama" value="<?= $users['user_nama']; ?>" required>
                                </div>
                                <div class="row">
                                    <div class="col-md-6" id="datepicker-container">
                                        <label class="sign__label" for="tgl_lahir">Tgl Lahir</label>
                                        <input type="text" class="sign__input date_picker" id="tgl_lahir" placeholder="Birth Day" name="user_tgl_lahir" readonly required value="<?= $users['user_tgl_lahir']; ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="sign__label" for="country">Negara</label>
                                        <select name="country_id" id="country" class="sign__input select2" style="width: 100%;">
                                            <?php new \App\Libraries\SelectBuilder([
                                                'table' => 'country',
                                                'val_id' => 'country_id',
                                                'val_text' => 'country_nama',
                                                'id' => $users['country_id']
                                            ]); ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="sign__group">
                                    <label class="sign__label" for="password">Password</label>
                                    <input id="password" type="password" name="password" class="sign__input">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="sign__group">
                                    <label class="sign__label" for="konfirmasi_password">Konfirmasi Password</label>
                                    <input id="konfirmasi_password" type="password" name="konfirmasi_password" class="sign__input">
                                </div>
                            </div>
                        </div>
                        <button class="sign__btn d-block" type="submit">Simpan</button>
                    </form>
                </div>
                <!-- end details form -->
            </div>
        </div>
    </div>
</div>
<script>
    $('.select2').select2();
    $(function() {
        $('.date_picker').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true,
            container: '#datepicker-container'
        });
    });
    $('#form__img-upload').change(
        function() {
            var img = this.files[0];
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#form__img').attr('src', e.target.result);
            }
            reader.readAsDataURL(img);
        }
    );
    $('#form-data').submit(
        function() {
            $.LoadingOverlay('show');
            $.ajax({
                url: this.action,
                type: 'post',
                data: new FormData(this),
                dataType: 'json',
                processData: false,
                contentType: false,
                cache: false,
                async: false,
                success: function(result, textStatus, xhr) {
                    $.LoadingOverlay('hide');
                    if (result.status > 0) {
                        toastr.success(result.msg);
                        setTimeout(function() {
                            window.location.replace('<?= base_url('users/' . str_encrypt($users['user_id'])) ?>');
                        }, 1000);
                    } else {
                        toastr.error(result.msg);
                    }
                }
            });
        }
    );
</script>