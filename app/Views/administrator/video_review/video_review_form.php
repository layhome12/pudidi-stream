<style>
    .toggle {
        width: 100% !important;
        margin-top: 3px;
    }

    .toggle-group label,
    .toggle-group span {
        font-size: small;
    }

    .toggle.btn {
        min-height: 2rem;
    }
</style>
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-5">
                <div class="">
                    <input type="hidden" name="video_review_id" value="<?= isset($review_vid['video_review_id']) ? $review_vid['video_review_id'] : '' ?>">
                    <input type="file" name="video_review_img" id="video_review_img" class="d-none" accept=".jpg,.jpeg,.png" <?= isset($review_vid['video_review_id']) ? '' : 'required' ?>>
                    <img class="img-thumbnail img-review-upload cursor-pointer" id="video_review_img_show" src="<?= base_url('/public/video_review_img') ?>/<?= isset($review_vid['video_review_img']) ? img_check($review_vid['video_review_img']) : 'no-image.png' ?>" alt="Image Kategori">
                    <p class="mt-1 font-smaller text-danger text-right">* Resolusi Rekomendasi : 414x280 | Max File : 512KB</p>
                </div>
            </div>
            <div class="col-md-7">
                <div class="row mt-1">
                    <div class="col-md-9">
                        <div class="form-group">
                            <label for="video_review_nama">Nama Slide</label>
                            <input type="text" class="form-control" name="video_review_nama" id="video_review_nama" value="<?= isset($review_vid['video_review_nama']) ? $review_vid['video_review_nama'] : '' ?>" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label>Tipe</label>
                        <input type="checkbox" id="switch_toggle" name="is_public" value="1" data-on="Publik" data-off="Private" data-onstyle="primary" data-offstyle="secondary" <?php if (isset($review_vid['is_public'])) echo $review_vid['is_public'] == 1 ? 'checked' : '' ?>>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="video_id">Kategori Movies</label>
                            <select class="form-control select2" id="video_kategori" style="width: 100%;">
                                <option value="" <?= !isset($review_vid['video_kategori_id']) ? 'selected' : '' ?>>-</option>
                                <?php new \App\Libraries\SelectBuilder([
                                    'table' => 'video_kategori',
                                    'val_id' => 'video_kategori_id',
                                    'val_text' => 'video_kategori_nama',
                                    'id' => isset($review_vid['video_kategori_id']) ? $review_vid['video_kategori_id'] : ''
                                ]); ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="form-group">
                            <label for="video_id">Movies</label>
                            <select class="form-control select2" name="video_id" id="video" style="width: 100%;" required>
                                <?php if (isset($review_vid['video_id'])) : ?>
                                    <option value="<?= $review_vid['video_id'] ?>"><?= $review_vid['video_nama']; ?></option>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="ck_editor">Isi Review</label>
                    <textarea class="form-control" id="ck_editor" rows="10" name="video_review_isi"><?= isset($review_vid['video_review_isi']) ? $review_vid['video_review_isi'] : '' ?></textarea>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('.select2').select2();
    $('#switch_toggle').bootstrapToggle();
    $('#video_review_img_show').click(
        function() {
            $('#video_review_img').trigger('click');
        }
    );
    $('#video_review_img').change(
        function() {
            var img = this.files[0];
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#video_review_img_show').attr('src', e.target.result);
            }
            reader.readAsDataURL(img);
        }
    );
    $('#video_kategori').change(
        function() {
            $.LoadingOverlay('show');
            $('#video').empty().select2({
                ajax: {
                    url: '<?= base_url('utils/get_select_video') ?>',
                    dataType: 'json',
                    data: function(p) {
                        var get = {
                            kvid: $('#video_kategori').val(),
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

    CKEDITOR.replace('ck_editor', {
        filebrowserImageBrowseUrl: '<?= base_url() ?>/public/admin_assets/vendors/kcfinder/browse.php'
    });

    function updateCKEditor() {
        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].updateElement();
        }
    }
</script>