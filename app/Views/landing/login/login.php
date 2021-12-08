<!DOCTYPE html>
<html lang="en">

<head>
    <?php $MUtils = new \App\Models\MUtils(); ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/public/public_assets/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/public/public_assets/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/public/public_assets/css/main.css">
    <link rel="stylesheet" href="<?= base_url() ?>/public/public_assets/css/toastr.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/public/public_assets/css/custom.css">

    <!-- Favicons -->
    <link rel="icon" type="image/png" href="<?= base_url() ?>/public/public_assets/img/favicon-32x32.png" sizes="32x32">
    <link rel="apple-touch-icon" href="<?= base_url() ?>/public/public_assets/img/favicon-32x32.png">

    <meta name="description" content="">
    <meta name="keywords" content="">
    <title><?= $MUtils->getIdentitasWeb()['identitas_web_nama']; ?></title>

</head>

<body>

    <div class="sign section--full-bg" data-bg="<?= base_url() ?>/public/public_assets/img/bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="sign__content">

                        <form action="<?= base_url() ?>/login/auth" method="POST" class="sign__form" id="form-data" onsubmit="return false">
                            <a href="<?= base_url() ?>" class="sign__logo">
                                <img src="<?= base_url() ?>/public/identitas_web_img/<?= $MUtils->getIdentitasWeb()['identitas_web_img']; ?>" alt="" style="width: 200px;">
                            </a>

                            <div class="sign__group">
                                <input type="email" class="sign__input" placeholder="Email" name="email" required>
                            </div>

                            <div class="sign__group">
                                <input type="password" class="sign__input" placeholder="Password" name="password" required>
                            </div>

                            <div class="sign__group sign__group--checkbox">
                                <input id="remember" name="remember" type="checkbox" checked="checked">
                                <label for="remember">Remember Me</label>
                            </div>

                            <button class="sign__btn" type="submit">Sign in</button>
                            <span class="sign__text">Don't have an account? <a href="<?= base_url('/register') ?>">Sign up!</a></span>
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
    <script>
        toastr.options.positionClass = 'toast-top-center'
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
</body>

</html>