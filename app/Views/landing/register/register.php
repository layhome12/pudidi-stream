<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/public/public_assets/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/public/public_assets/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/public/public_assets/css/main.css">
    <link rel="stylesheet" href="<?= base_url() ?>/public/public_assets/css/toastr.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/public/public_assets/css/datepicker.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/public/public_assets/select2/select2.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/public/public_assets/css/custom.css">

    <!-- Favicons -->
    <link rel="icon" type="image/png" href="<?= base_url() ?>/public/public_assets/icon/favicon-32x32.png" sizes="32x32">
    <link rel="apple-touch-icon" href="<?= base_url() ?>/public/public_assets/icon/favicon-32x32.png">

    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Dmitry Volkov">
    <title>PUDIDI STREAMS</title>

</head>

<body>

    <div class="sign section--full-bg" data-bg="<?= base_url() ?>/public/public_assets/img/bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="sign__content">

                        <form action="<?= base_url() ?>/register/save" method="POST" class="sign__form signup_form" id="form-data" onsubmit="return false">
                            <a href="<?= base_url() ?>" class="sign__logo">
                                <img src="<?= base_url() ?>/public/public_assets/img/logo.svg" alt="">
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

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JS -->
    <script src="<?= base_url() ?>/public/public_assets/js/jquery-3.5.1.min.js"></script>
    <script src="<?= base_url() ?>/public/public_assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>/public/public_assets/js/owl.carousel.min.js"></script>
    <script src="<?= base_url() ?>/public/public_assets/js/slider-radio.js"></script>
    <script src="<?= base_url() ?>/public/public_assets/js/select2.min.js"></script>
    <script src="<?= base_url() ?>/public/public_assets/js/smooth-scrollbar.js"></script>
    <script src="<?= base_url() ?>/public/public_assets/js/jquery.magnific-popup.min.js"></script>
    <script src="<?= base_url() ?>/public/public_assets/js/main.js"></script>
    <script src="<?= base_url() ?>/public/public_assets/js/toastr.min.js"></script>
    <script src="<?= base_url() ?>/public/public_assets/js/datepicker.min.js"></script>
    <script src="<?= base_url() ?>/public/public_assets/select2/select2.min.js"></script>
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
                                    window.location.replace("<?= base_url('/administrator'); ?>");
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
</body>

</html>