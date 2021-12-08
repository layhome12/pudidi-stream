<?php $MUtils = new \App\Models\MUtils(); ?>
<form action="<?= base_url() ?>/register/save" method="POST" class="sign__form signup_form" id="form-data" onsubmit="return false">
    <a href="<?= base_url() ?>" class="sign__logo">
        <img src="<?= base_url() ?>/public/identitas_web_img/<?= $MUtils->getIdentitasWeb()['identitas_web_img']; ?>" alt="" style="width: 200px;">
    </a>

    <div class="sign__group">
        <input type="text" class="sign__input" placeholder="Nama" name="user_nama" required>
    </div>
    <div class="sign__group">
        <div class="row">
            <div class="col-md-5">
                <input type="text" class="sign__input date_picker" placeholder="Birth Day" name="user_tgl_lahir" readonly required>
            </div>
            <div class="col-md-7">
                <select name="country_id" id="country" class="sign__input select2" style="width: 100%;">
                    <?php foreach ($country as $row) : ?>
                        <option value="<?= $row['country_id']; ?>"><?= $row['country_nama'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
    </div>

    <div class="sign__group">
        <input type="email" class="sign__input" placeholder="Email" name="email" id="email" required>
        <span id="email_notif" class="font-small email_notif"></span>
    </div>

    <div class="sign__group">
        <input type="password" class="sign__input" placeholder="Password" name="password" required>
    </div>

    <div class="sign__group sign__group--checkbox">
        <input id="remember" type="checkbox" checked="checked">
        <label for="remember">I agree to the <a href="privacy.html">Privacy Policy</a></label>
    </div>

    <button class="sign__btn" type="submit">Sign Up</button>
    <span class="sign__text">Already have an account? <a href="<?= base_url('/login') ?>">Sign in!</a></span>
</form>

<script>
    toastr.options.positionClass = 'toast-top-center'
    $('.select2').select2();
    $(function() {
        $('.date_picker').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true,
        });
    });
    $('#form-data').submit(
        function() {
            $.ajax({
                url: this.action,
                type: 'post',
                data: new FormData(this),
                dataType: 'json',
                processData: false,
                contentType: false,
                cache: false,
                async: false,
                success: function(json, textStatus, xhr) {
                    if (json.status > 0) {
                        toastr.success(json.msg);
                        setTimeout(
                            function() {
                                contentform('<?= base_url('/register/verify?key='); ?>' + json.data.key);
                            }, 1000)
                    } else {
                        toastr.error(json.msg);
                        $('#form-data').trigger('reset');
                    }
                }
            });
        }
    );
    $('#email').keyup(
        function() {
            var email = $(this).val();
            $.post('<?= base_url() ?>/register/cek_email', {
                'email': email
            }, function(result, textStatus, xhr) {
                if (result.status == 0) {
                    $('#email_notif').empty().html(result.msg);
                    $('.sign__btn').attr('disabled', true);
                } else {
                    $('#email_notif').empty();
                    $('.sign__btn').attr('disabled', false);
                }
            }, 'json');
        }
    );
</script>