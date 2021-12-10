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
    <link rel="stylesheet" href="<?= base_url() ?>/public/public_assets/css/datepicker.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/public/public_assets/select2/select2.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/public/public_assets/css/custom.css">

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
    <script src="<?= base_url() ?>/public/admin_assets/js/loadingoverlay.min.js"></script>

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
                    <div class="sign__content" id="content-form">

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(
            function() {
                var url = '<?= base_url('register/form'); ?>'
                contentform(url);
            }
        );

        function contentform(url) {
            $.get(url, null, function(result, textStatus, xhr) {
                $('#content-form').html(result);
            });
        }
    </script>
</body>

</html>