<div class="row">
    <div class="col-md-12">
        <div class="">
            <input type="hidden" name="video_slide_id" value="<?= isset($slidevid['video_slide_id']) ? $slidevid['video_slide_id'] : '' ?>">
            <input type="file" name="video_slide_img" id="video_slide_img" class="d-none" accept=".jpg,.jpeg,.png" <?= isset($slidevid['video_slide_id']) ? '' : 'required' ?>>
            <img class="img-thumbnail img-form-upload cursor-pointer" id="video_slide_img_show" src="<?= base_url('/public/video_slide_img') ?>/<?= isset($slidevid['video_slide_img']) ? img_check($slidevid['video_slide_img']) : 'no-image.png' ?>" alt="Image Kategori">
            <p class="mt-1 font-smaller text-danger text-right">* Resolusi Rekomendasi : 414x330 | Max File : 512KB</p>
        </div>
        <div class="row mt-1">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="video_slide_nama">Nama Slide</label>
                    <input type="text" class="form-control" name="video_slide_nama" id="video_slide_nama" value="<?= isset($slidevid['video_slide_nama']) ? $slidevid['video_slide_nama'] : '' ?>" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <div class="form-group">
                    <label for="video_id">Genre Movies</label>
                    <select class="form-control select2" id="video_genre" style="width: 100%;">
                        <option value="" <?= !isset($slidevid['video_genre_id']) ? 'selected' : '' ?>>-</option>
                        <?php new \App\Libraries\SelectBuilder([
                            'table' => 'video_genre',
                            'val_id' => 'video_genre_id',
                            'val_text' => 'video_genre_nama',
                            'id' => isset($slidevid['video_genre_id']) ? $slidevid['video_genre_id'] : ''
                        ]); ?>
                    </select>
                </div>
            </div>
            <div class="col-md-7">
                <div class="form-group">
                    <label for="video_id">Movies</label>
                    <select class="form-control select2" name="video_id" id="video" style="width: 100%;" required>
                        <?php if (isset($slidevid['video_id'])) : ?>
                            <option value="<?= $slidevid['video_id'] ?>"><?= $slidevid['video_nama']; ?></option>
                        <?php endif; ?>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('.select2').select2();
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
    $('#video_genre').change(
        function() {
            $.LoadingOverlay('show');
            $('#video').empty().select2({
                ajax: {
                    url: '<?= base_url('utils/get_select_video') ?>',
                    dataType: 'json',
                    data: function(p) {
                        var get = {
                            kvid: $('#video_genre').val(),
                            search: p.term
                        }
                        return get;
                    },
                    processResults: function(res) {
                        return {
                            results: res.data
                        };
                    }
                }
            });
            $.LoadingOverlay('hide');
        }
    );
</script>