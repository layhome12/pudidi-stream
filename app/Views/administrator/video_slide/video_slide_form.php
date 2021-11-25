<div class="row">
    <div class="col-md-12">
        <div class="">
            <input type="hidden" name="video_slide_id" value="<?= isset($katvid['video_slide_id']) ? $katvid['video_slide_id'] : '' ?>">
            <input type="file" name="video_slide_img" id="video_slide_img" class="d-none" accept=".jpg,.jpeg,.png" <?= isset($katvid['video_slide_id']) ? '' : 'required' ?>>
            <img class="img-thumbnail img-form-upload cursor-pointer" id="video_slide_img_show" src="<?= base_url('/public/video_slide_img') ?>/<?= isset($katvid['video_slide_img']) ? img_check($katvid['video_slide_img']) : 'no-image.png' ?>" alt="Image Kategori">
            <p class="mt-1 font-smaller text-danger text-right">* Resolusi Rekomendasi : 1920x450 | Max File : 512KB</p>
        </div>
        <div class="row mt-2">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="video_slide_nama">Kategori Movies</label>
                    <input type="text" class="form-control" name="video_slide_nama" id="video_slide_nama" value="<?= isset($katvid['video_slide_nama']) ? $katvid['video_slide_nama'] : '' ?>" required>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('#video_slide_img_show').click(
        function() {
            $('#video_slide_img').trigger('click');
        }
    );
    $('#video_slide_img').change(
        function() {
            var img = this.files[0];
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#video_slide_img_show').attr('src', e.target.result);
            }
            reader.readAsDataURL(img);
        }
    );
</script>