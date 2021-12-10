<style>
    .note-modal>.modal-dialog>.modal-content>.modal-header>.close {
        display: none;
    }

    .note-editor.note-frame .note-btn {
        color: white;
    }

    .note-editor.note-frame .note-toolbar {
        background-color: #aaaaaa;
    }

    kbd {
        background-color: #bfbfbf;
    }

    .note-frame * {
        color: #484848;
    }
</style>
<div class="row">
    <div class="col-md-12">
        <div class="row mt-2">
            <div class="col-md-8">
                <div class="form-group">
                    <label for="pages_nama">Nama Halaman</label>
                    <input type="hidden" name="pages_id" value="<?= isset($pages['pages_id']) ? $pages['pages_id'] : ''; ?>">
                    <input type="text" class="form-control" name="pages_nama" id="pages_nama" value="<?= isset($pages['pages_nama']) ? $pages['pages_nama'] : '' ?>" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="pages_template_id">Template Halaman</label>
                    <select class="form-control select2" name="pages_template_id" id="pages_template_id" style="width: 100%;" required>
                        <?php new \App\Libraries\SelectBuilder([
                            'table' => 'pages_template',
                            'val_id' => 'pages_template_id',
                            'val_text' => 'pages_template_nama',
                            'id' => isset($pages['pages_template_id']) ? $pages['pages_template_id'] : 1
                        ]); ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="pages_nama">Isi Halaman</label>
                    <textarea name="pages_isi" id="pages_isi" rows="10" required><?= isset($pages['pages_isi']) ? $pages['pages_isi'] : ''; ?></textarea>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('.select2').select2();
    $('#pages_isi').summernote({
        height: 250,
        callbacks: {
            onImageUpload: function(image) {
                uploadImage(image[0]);
            },
            onMediaDelete: function(target) {
                deleteImage(target[0].src);
            }
        }
    });

    function uploadImage(image) {
        var data = new FormData();
        data.append("images", image);
        $.ajax({
            url: "<?= base_url('/administrator/summernote_img' . '_save'); ?>",
            type: 'post',
            data: data,
            dataType: 'json',
            processData: false,
            contentType: false,
            cache: false,
            async: false,
            success: function(result, textStatus, xhr) {
                $('#pages_isi').summernote("insertImage", result.data.url);
            },
            error: function(result, textStatus, xhr) {
                console.log(result.msg);
            }
        });
    }

    function deleteImage(src) {
        $.post('<?= base_url('/administrator/summernote_img' . '_del'); ?>', {
            'src': src
        }, function(result, textStatus, xhr) {
            console.log(result.msg)
        }, 'json');
    }

    $('#pages_template_id').change(
        function() {
            $.LoadingOverlay('show');
            $.post('<?= base_url('/utils/get_templates'); ?>', {
                'pid': $(this).val()
            }, function(result, textStatus, xhr) {
                $.LoadingOverlay('hide');
                $('#pages_isi').summernote('code', result.data.pages_template_isi);
            }, 'json');
        }
    );
</script>