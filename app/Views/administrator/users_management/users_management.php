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
                                <h3 class="m-0">Setting</h3>
                            </div>
                        </div>
                    </div>
                    <div class="white_card_body">
                        <div class="QA_section">
                            <div class="white_box_tittle list_header">
                                <h4>User Management</h4>
                                <div class="box_right d-flex lms_block">
                                    <div class="serach_field_2">
                                        <div class="search_inner">
                                            <div class="search_field">
                                                <input type="text" placeholder="Search content here..." id="search_datatables">
                                            </div>
                                            <button type="button"> <i class="ti-search"></i> </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="QA_table mb_30">
                                <!-- table-responsive -->
                                <table class="table datatables ">
                                    <thead>
                                        <tr>
                                            <th scope="col">Nama User</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Country</th>
                                            <th scope="col">Tanggal Lahir</th>
                                            <th scope="col">Is Active</th>
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
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">User Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modal-content">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('custom_js') ?>
<script>
    var datatables = $('.datatables').DataTable({
        'ajax': {
            'url': '<?php echo base_url('administrator/users_management' . '_fetch') ?>',
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
        'responsive':true,
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

    function dt_show(t) {
        $.LoadingOverlay('show');
        $.post('<?= base_url('/administrator/users_management' . '_form') ?>', {
            'uid': t.getAttribute('target-id')
        }, function(result, textStatus, xhr) {
            $.LoadingOverlay('hide');
            $('#modal-content').html(result);
            $('#modal').modal('show');
        });
    }

    function dt_block(t) {
        Swal.fire({
            title: 'Warning !',
            text: 'Blokir User Ini ??',
            type: 'warning', //'success', 'error', 'info', 'question'
            showCancelButton: true,
            confirmButtonColor: '#4c6ef8',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Block'
        }).then((result) => {
            if (result.value) {
                $.LoadingOverlay('show');
                $.post('<?= base_url('/administrator/users_block') ?>', {
                    'uid': t.getAttribute('target-id'),
                    'key': 'block'
                }, function(result, textStatus, xhr) {
                    if (result.status > 0) {
                        $.LoadingOverlay('hide');
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

    function dt_unblock(t) {
        Swal.fire({
            title: 'Warning !',
            text: 'Unblokir User Ini ??',
            type: 'warning', //'success', 'error', 'info', 'question'
            showCancelButton: true,
            confirmButtonColor: '#4c6ef8',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Unblock'
        }).then((result) => {
            if (result.value) {
                $.LoadingOverlay('show');
                $.post('<?= base_url('/administrator/users_block') ?>', {
                    'uid': t.getAttribute('target-id'),
                    'key': 'unblock'
                }, function(result, textStatus, xhr) {
                    if (result.status > 0) {
                        $.LoadingOverlay('hide');
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