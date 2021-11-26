<?= $this->extend('partial/administrator') ?>
<?= $this->section('content') ?>
<div class="main_content_iner ">
    <div class="container-fluid p-0">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="white_card card_height_100 mb_30">
                    <div class="white_card_header">
                        <div class="box_header m-0">
                            <div class="main-title">
                                <h3 class="m-0">Movies</h3>
                            </div>
                        </div>
                    </div>
                    <div class="white_card_body">
                        <div class="QA_section">
                            <div class="white_box_tittle list_header">
                                <h4>Slide Movies</h4>
                                <div class="box_right d-flex lms_block">
                                    <div class="serach_field_2">
                                        <div class="search_inner">
                                            <div class="search_field">
                                                <input type="text" placeholder="Search content here..." id="search_datatables">
                                            </div>
                                            <button type="button"> <i class="ti-search"></i> </button>
                                        </div>
                                    </div>
                                    <div class="add_button ml-10">
                                        <button type="button" class="btn_1" onclick="dt_form(this)" target-id="0">Tambah</button>
                                    </div>
                                </div>
                            </div>

                            <div class="QA_table mb_30">
                                <!-- table-responsive -->
                                <table class="table datatables">
                                    <thead>
                                        <tr>
                                            <th scope="col">Nama Slide</th>
                                            <th scope="col">Video</th>
                                            <th scope="col">Tahun</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">

            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="Modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <form action="<?= base_url('administrator/video_slide' . '_save') ?>" method="post" class="form-full" id="form-data" onsubmit="return false" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Slide Movies</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="modal-content">

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('custom_js') ?>
<script>
    var datatables = $('.datatables').DataTable({
        'ajax': {
            'url': '<?php echo base_url('administrator/video_slide' . '_fetch') ?>',
            'dataSrc': 'data',
            'type': 'POST',
            'data': function(form) {
                form.search = {
                    'value': $('#search_datatables').val()
                };
            }
        },
        bLengthChange: false,
        "bDestroy": true,
        language: {
            search: "<i class='ti-search'></i>",
            searchPlaceholder: 'Quick Search',
            paginate: {
                next: "<i class='ti-arrow-right'></i>",
                previous: "<i class='ti-arrow-left'></i>"
            }
        },
        'responsive': true,
        'processing': true,
        'serverSide': true,
        'paging': true,
        'lengthChange': true,
        'searching': false,
        'ordering': false,
        'info': true,
        'autoWidth': false,
    });
    $('#search_datatables').keyup(
        function() {
            datatables.ajax.reload();
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
                        $('#modal').modal('hide');
                        Swal.fire({
                            title: 'Success',
                            text: result.msg,
                            type: 'success'
                        }).then(
                            function() {
                                datatables.ajax.reload();
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

    function dt_form(t) {
        $.LoadingOverlay('show');
        $.post('<?= base_url('/administrator/video_slide' . '_form') ?>', {
            'svid': t.getAttribute('target-id')
        }, function(result, textStatus, xhr) {
            $.LoadingOverlay('hide');
            $('#modal-content').html(result);
            $('#modal').modal('show');
        });
    }

    function dt_del(t) {
        Swal.fire({
            title: 'Warning !',
            text: 'Hapus Kategori Movies Ini ??',
            type: 'warning', //'success', 'error', 'info', 'question'
            showCancelButton: true,
            confirmButtonColor: '#4c6ef8',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Hapus'
        }).then((result) => {
            if (result.value) {
                $.post('<?= base_url('/administrator/video_slide' . '_del') ?>', {
                    'svid': t.getAttribute('target-id')
                }, function(result, textStatus, xhr) {
                    $.LoadingOverlay('hide');
                    if (result.status > 0) {
                        Swal.fire({
                            title: 'Success',
                            text: result.msg,
                            type: 'success'
                        }).then(
                            function() {
                                datatables.ajax.reload();
                            }
                        );
                    }
                }, 'json');
            }
        });
    }
</script>
<?= $this->endSection() ?>