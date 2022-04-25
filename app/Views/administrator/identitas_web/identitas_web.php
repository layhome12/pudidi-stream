<?= $this->extend('partial/administrator') ?>
<?= $this->section('content') ?>
<div class="main_content_iner ">
    <div class="container-fluid p-0">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card_box position-relative mb_30 white_bg">
                    <div class="white_box_tittle blue_bg">
                        <div class="main-title2 ">
                            <h4 class="mb-2 nowrap text_white"><i class="fa fa-globe-asia"></i> Identitas Website</h4>
                        </div>
                    </div>
                    <div class="box_body row justify-content-center">
                        <form method="POST" action="<?= base_url('frontend/info_management') . '_save'; ?>" class="col-md-11" id="form-data" enctype="multipart/form-data" onsubmit="return false">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="">
                                        <input type="file" name="identitas_web_img" id="identitas_web_img" class="d-none" accept=".jpg,.jpeg,.png">
                                        <img class="img-thumbnail img-identitas-upload cursor-pointer" id="identitas_web_img_show" src="<?= base_url('/public/identitas_web_img') ?>/<?= isset($identitas['identitas_web_img']) ? img_check($identitas['identitas_web_img']) : 'no-image.png' ?>" alt="Image Kategori">
                                        <p class="mt-1 font-smaller text-danger text-right">* Resolusi : 380x130 | Max File : 512KB</p>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="nama_website">Nama Web</label>
                                        <input type="text" class="form-control" id="nama_website" placeholder="Nama Website" name="identitas_web_nama" value="<?= $identitas['identitas_web_nama']; ?>">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="facebook">Facebook</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-link"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control border-radius-left-none" name="identitas_web_facebook" value="<?= $identitas['identitas_web_facebook']; ?>" placeholder="Facebook" id="facebook" aria-describedby="basic-addon1">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="twitter">Twitter</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-link"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control border-radius-left-none" name="identitas_web_twitter" value="<?= $identitas['identitas_web_twitter']; ?>" placeholder="Twitter" id="twitter" aria-describedby="basic-addon1">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="instagram">Instagram</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-link"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control border-radius-left-none" name="identitas_web_instagram" value="<?= $identitas['identitas_web_instagram']; ?>" placeholder="Instagram" id="instagram" aria-describedby="basic-addon1">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="youtube">Youtube</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-link"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control border-radius-left-none" name="identitas_web_youtube" value="<?= $identitas['identitas_web_youtube']; ?>" placeholder="Youtube" id="youtube" aria-describedby="basic-addon1">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="deskripsi_web">Deskripsi Web</label>
                                        <textarea class="form-control" name="identitas_web_deskripsi" id="deskripsi_web" rows="7"><?= $identitas['identitas_web_deskripsi']; ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary float-right">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('custom_js') ?>
<script>
    $('#identitas_web_img_show').click(
        function() {
            $('#identitas_web_img').trigger('click');
        }
    );
    $('#identitas_web_img').change(
        function() {
            var img = this.files[0];
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#identitas_web_img_show').attr('src', e.target.result);
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
                        Swal.fire({
                            title: 'Success',
                            text: result.msg,
                            type: 'success'
                        }).then(
                            function() {
                                window.location.reload();
                            }
                        );
                    } else {
                        Swal.fire({
                            title: 'Error',
                            text: result.msg,
                            type: 'error'
                        });
                    }
                }
            });
        }
    );
</script>
<?= $this->endSection() ?>