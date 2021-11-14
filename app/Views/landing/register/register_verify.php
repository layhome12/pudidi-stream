<form action="<?= base_url() ?>/register/otp_verify" method="POST" class="sign__form signup_form" id="form-data" onsubmit="return false">
    <a href="<?= base_url() ?>" class="sign__logo">
        <img src="<?= base_url() ?>/public/public_assets/img/logo.svg" alt="">
    </a>

    <div class="sign__group">
        <input type="hidden" name="key" value="<?= $key; ?>">
        <input type="text" class="sign__input" placeholder="Kode OTP" name="kode_otp" maxlength="6" required>
    </div>

    <button class="sign__btn" type="submit">Verifikasi</button>
</form>

<script>
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
                                window.location.replace("<?= base_url('/'); ?>");
                            }, 1000)
                    } else {
                        toastr.error(json.msg);
                        $('#form-data').trigger('reset');
                    }
                }
            });
        }
    );
</script>