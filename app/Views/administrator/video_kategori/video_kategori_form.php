<div class="row">
    <div class="col-md-12">
        <div class="">
            <input type="hidden" name="video_kategori_id" value="<?= isset($katvid['video_kategori_id']) ? $katvid['video_kategori_id'] : '' ?>">
            <input type="file" name="video_kategori_img" id="video_kategori_img" class="d-none" accept=".jpg,.jpeg,.png" <?= isset($katvid['video_kategori_id']) ? '' : 'required' ?>>
            <img class="img-thumbnail img-form-upload cursor-pointer" id="video_kategori_img_show" src="<?= base_url('/public/video_kategori_img') ?>/<?= isset($katvid['video_kategori_img']) ? img_check($katvid['video_kategori_img']) : 'no-image.png' ?>" alt="Image Kategori">
            <p class="mt-1 font-smaller text-danger text-right">* Resolusi Rekomendasi : 1920x450 | Max File : 512KB</p>
        </div>
        <div class="row mt-2">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="video_kategori_nama">Kategori Movies</label>
                    <input type="text" class="form-control" name="video_kategori_nama" id="video_kategori_nama" value="<?= isset($katvid['video_kategori_nama']) ? $katvid['video_kategori_nama'] : '' ?>" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="video_kategori_seo">Movies SEO</label>
                    <input type="text" class="form-control" name="video_kategori_seo" id="video_kategori_seo" value="<?= isset($katvid['video_kategori_seo']) ? $katvid['video_kategori_seo'] : '' ?>" readonly>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('#video_kategori_nama').keyup(
        function() {
            var kat = $(this).val().toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '');
            $('#video_kategori_seo').val(kat);
        }
    );
    $('#video_kategori_img_show').click(
        function() {
            $('#video_kategori_img').trigger('click');
        }
    );
    $('#video_kategori_img').change(
        function() {
            var img = this.files[0];
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#video_kategori_img_show').attr('src', e.target.result);
            }
            reader.readAsDataURL(img);
        }
    );
</script>