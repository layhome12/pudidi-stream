<div class="row">
    <div class="col-md-6">
        <label for="movies">Movies</label>
        <div class="card card-custom-border">
            <div class="card-body" style="height: 360px">

            </div>
        </div>
        <div class="progress mt-3">
            <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-4">
                <label for="thumbnail">Thumbnail</label>
                <img class="img-thumbnail thumbnail-img cursor-pointer" id="video_thumbnail" src="<?= base_url('/public/video_thumbnail') ?>/<?= isset($katvid['video_thumbnail']) ? img_check($katvid['video_thumbnail']) : 'no-image.png' ?>" alt="Thumbnail">
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <label for="video_nama">Nama Movies</label>
                    <input type="text" class="form-control" name="video_nama" id="video_nama" required>
                </div>
                <div class="form-group">
                    <label for="video_tahun">Tahun Movies</label>
                    <input type="text" class="form-control date-picker" name="video_tahun" id="video_tahun" data-language="en" data-min-view="years" data-view="years" data-date-format="yyyy" readonly required>
                </div>
                <div class="form-group">
                    <label for="country">Negara Movies</label>
                    <select class="form-control select2" name="country_id" id="country" style="width: 100%;">
                        <?php foreach ($country as $row) : ?>
                            <option value="<?= $row['country_id'] ?>" <?= isset($user['country_nama']) ? selected($row['country_id'], $user['country_id']) : '' ?>><?= $row['country_nama'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="video_deskripsi">Deskripsi</label>
                    <textarea class="form-control" rows="7" name="video_deskripsi" id="video_deskripsi" placeholder="Deskripsi Video" required></textarea>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('.select2').select2();
    $('.date-picker').datepicker();
</script>