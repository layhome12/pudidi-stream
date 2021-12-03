<div class="row">
    <div class="col-md-6">
        <label for="movies">Movies</label>
        <div class="card card-custom-border" id="card-movies">
            <div class="card-body" style="height: 395px">
                <div id="form-upload-movies">
                    <input type="file" id="movies-file" class="d-none">
                    <input type="hidden" name="video_id" id="video_id" value="<?= isset($vid['video_id']) ? $vid['video_id'] : '' ?>">
                    <input type="hidden" name="video_genre_id" id="kategori_video_id" value="<?= $kvid ?>">
                    <div class="text-center box-upload-movies">
                        <span class="font-large d-block font-icon-upload text-secondary">
                            <i class="fa fa-cloud-upload-alt"></i>
                        </span>
                        <span class="d-block font-large" id="movies-file-upload">Drag&Drop File Disini</span>
                        <div id="notif-upload">
                            <span class="d-block mt-2 mb-2">Atau</span>
                            <button type="button" class="btn btn-primary" id="pilih-file">Pilih File</button>
                        </div>
                    </div>
                    <div id="progress_indicator" style="display: none;">
                        <div class="progress mt-3">
                            <div class="progress-bar" id="progress-movies-upload" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <span class="float-right font-small" id="byte_uploaded">0</span>
                    </div>
                </div>
                <?php if (isset($vid['video_file'])) : ?>
                    <div class="mt-1 text-right" id="wrapper-btn-update">
                        <button type="button" class="btn btn-primary btn-sm btn-player-update"><i class="fa fa-edit"></i> Ubah Movies</button>
                    </div>
                <?php endif; ?>
                <div id="content-movies" class="mt-2">
                    <?php if (isset($vid['video_file'])) : ?>
                        <script>
                            var url = '<?= base_url('/public/video_file') . '/' . $vid['video_file'] ?>';
                            $('#form-upload-movies').hide();
                            initializePlayer(url);
                        </script>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-4">
                <label for="thumbnail">Thumbnail</label>
                <input type="file" name="video_thumbnail" id="upload_thumbnail" class="d-none" accept=".jpg,.jpeg,.png">
                <img class="img-thumbnail thumbnail-img cursor-pointer" id="video_thumbnail" src="<?= base_url('/public/video_thumbnail') ?>/<?= isset($vid['video_thumbnail']) ? img_check($vid['video_thumbnail']) : 'no-image.png' ?>" alt="Thumbnail">
                <span class="text-danger font-x-small mt-1">* Resolusi 192x270 px</span>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="video_nama">Nama Movies</label>
                            <input type="text" class="form-control" name="video_nama" id="video_nama" value="<?= isset($vid['video_nama']) ? $vid['video_nama'] : '' ?>" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="video_nama">Rating IMDb</label>
                            <input type="text" class="form-control" name="video_rating" id="video_rating" value="<?= isset($vid['video_rating']) ? $vid['video_rating'] : '' ?>" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="subtitle_movies">Subtitle Movies</label>
                            <div class="custom-file">
                                <input type="file" name="video_subtitle" class="custom-file-input" id="subtitle_movies" accept=".vtt">
                                <label class="custom-file-label" for="subtitle_movies"><?= isset($vid['video_subtitle']) ? substr($vid['video_subtitle'], 0, 18) . '..' : 'Pilih Subtitle'; ?></label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="video_tahun">Tahun</label>
                            <input type="text" class="form-control date-picker" name="video_tahun" value="<?= isset($vid['video_tahun']) ? $vid['video_tahun'] : '' ?>" id="video_tahun" data-language="en" data-min-view="years" data-view="years" data-date-format="yyyy" readonly required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-7">
                        <label for="country">Genre</label>
                        <select class="form-control select2" name="video_genre[]" multiple="multiple" style="width: 100%;" required>
                            <?php new \App\Libraries\SelectBuilder([
                                'table' => 'video_genre',
                                'val_id' => 'video_genre_id',
                                'val_text' => 'video_genre_nama',
                                'id' => isset($vid['video_genre']) ? json_decode($vid['video_genre']) : []
                            ]); ?>
                        </select>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="country">Negara Movies</label>
                            <select class="form-control select2" name="country_id" id="country" style="width: 100%;">
                                <?php foreach ($country as $row) : ?>
                                    <option value="<?= $row['country_id'] ?>" <?= isset($vid['country_id']) ? selected($row['country_id'], $vid['country_id']) : '' ?>><?= $row['country_nama'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="video_deskripsi">Deskripsi</label>
                    <textarea class="form-control" rows="7" name="video_deskripsi" id="video_deskripsi" placeholder="Deskripsi Movies" required><?= isset($vid['video_deskripsi']) ? $vid['video_deskripsi'] : '' ?></textarea>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var is_fill = 0,
        is_update = <?= isset($vid['video_id']) ? '1' : '0' ?>,
        fileobj,
        form_data;
    $('.select2').select2();
    $('.date-picker').datepicker();
    $('#video_thumbnail').click(
        function() {
            $('#upload_thumbnail').trigger('click');
        }
    );
    $('#upload_thumbnail').change(
        function() {
            var img = this.files[0];
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#video_thumbnail').attr('src', e.target.result);
            }
            reader.readAsDataURL(img);
        }
    );
    $('#card-movies').on('drop', function(event) {
        event.preventDefault();
        event.stopPropagation();
        fileobj = event.originalEvent.dataTransfer.files[0];

        document.getElementById('movies-file').files[0] = fileobj;
        upload_movies(fileobj);
    });
    $('#card-movies').on('dragover', function(event) {
        event.preventDefault();
        event.stopPropagation();
        return false;
    });
    $('#pilih-file').click(
        function() {
            $('#movies-file').trigger('click');
        }
    );
    $('#movies-file').change(
        function() {
            fileobj = this.files[0];
            upload_movies(fileobj);
        }
    );

    function upload_movies(files) {
        var fname = files.name;
        var fsize = files.size;
        if (fname.substr(-3).toLowerCase() == 'mp4' && fname.length > 0 && is_fill == 0 && is_update == 0) {
            //Set Upload Movies
            is_fill = 1;
            form_data = new FormData();
            form_data.append('movies', files);
            form_data.append('vid', $('#video_id').val());
            form_data.append('kvid', $('#kategori_video_id').val());
            //Ajax XHR File Upload
            $.ajax({
                xhr: function() {
                    var xhr = new window.XMLHttpRequest();
                    xhr.upload.addEventListener("progress", function(event) {
                        if (event.lengthComputable) {
                            var percentComplete = ((event.loaded / event.total) * 100);
                            var byteUpload = Math.round((event.loaded / 1024) / 1024);
                            var totalUpload = Math.round((event.total / 1024) / 1024);
                            $('#video_nama').val(fname);
                            $('#movies-file-upload').empty().html(fname);
                            $('#notif-upload').empty().html('File Sedang Di Upload..');
                            $('#progress_indicator').show();
                            $('#progress-movies-upload').css('width', Math.round(percentComplete) + '%');
                            $('#progress-movies-upload').css('width', Math.round(percentComplete) + '%');
                            $('#progress-movies-upload').attr('aria-valuenow', Math.round(percentComplete));
                            $('#progress-movies-upload').html(Math.round(percentComplete) + '%');
                            $('#byte_uploaded').html((byteUpload + 'MB/' + totalUpload + 'MB'));
                        }
                    }, false);
                    return xhr;
                },
                url: '<?= base_url('/administrator/video_upload') ?>',
                type: 'post',
                data: form_data,
                dataType: 'json',
                processData: false,
                contentType: false,
                cache: false,
                success: function(result, textStatus, xhr) {
                    if (result.status > 0) {
                        var url = '<?= base_url('/public/video_file') . '/' ?>' + result.data.video_file;
                        $('#video_id').val(result.data.vid);
                        $('#form-upload-movies').hide();
                        initializePlayer(url);
                        table_reload();
                    }
                }
            });
        } else if (is_fill == 1) {
            Swal.fire({
                type: 'warning',
                title: 'Warning',
                text: 'Anda Sudah Mengupload File !',
            });
        } else if (is_update == 1) {
            Swal.fire({
                type: 'warning',
                title: 'Warning',
                text: 'Pilih Tombol Ubah Terlebih Dahulu !',
            });
        } else {
            Swal.fire({
                type: 'warning',
                title: 'Warning',
                text: 'Format File Harus MP4 !',
            });
        }
    }
    $('.btn-player-update').click(
        function() {
            is_update = 0;
            $('#wrapper-btn-update').remove();
            $('#content-movies').empty();
            $('#form-upload-movies').show();
        }
    );
    $('#subtitle_movies').change(
        function() {
            var sub = this.files[0];
            $('.custom-file-label').text(sub.name.substr(0, 18));
        }
    );
</script>