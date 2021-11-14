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
                                            <form Active="#">
                                                <div class="search_field">
                                                    <input type="text" placeholder="Search content here...">
                                                </div>
                                                <button type="submit"> <i class="ti-search"></i> </button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="add_button ml-10">
                                        <a href="#" data-toggle="modal" data-target="#addcategory" class="btn_1">Add New</a>
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
<?= $this->endSection() ?>

<?= $this->section('custom_js') ?>
<script>
    var datatables = $('.datatables').DataTable({
        'ajax': {
            'url': '<?php echo base_url('administrator/users_management' . '_fetch') ?>',
            'dataSrc': 'data',
            'type': 'POST',
            'data': function(form) {
                form.nama_form = $('#select_id').val();
                form.nama_form = $('#select_id').val();
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
        'processing': true,
        'serverSide': true,
        'paging': true,
        'lengthChange': true,
        'searching': false,
        'ordering': false,
        'info': true,
        'autoWidth': false,
    });
</script>
<?= $this->endSection() ?>