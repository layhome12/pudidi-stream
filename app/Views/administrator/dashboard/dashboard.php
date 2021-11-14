<?= $this->extend('partial/administrator'); ?>

<?= $this->section('content') ?>
<div class="main_content_iner">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-lg-12">
                <div class="single_element">
                    <div class="quick_activity">
                        <div class="row">
                            <div class="col-12">
                                <div class="quick_activity_wrap">
                                    <!-- single_quick_activity  -->
                                    <div class="single_quick_activity d-flex justify-content-between">
                                        <div class="count_content">
                                            <p>Users</p>
                                            <h3><span class="counter">35</span></h3>
                                        </div>
                                        <div class="font-icon-dash">
                                            <i class="fa fa-users"></i>
                                        </div>
                                    </div>
                                    <!-- single_quick_activity  -->
                                    <div class="single_quick_activity d-flex justify-content-between">
                                        <div class="count_content">
                                            <p>Movies</p>
                                            <h3><span class="counter">100</span></h3>
                                        </div>
                                        <div class="font-icon-dash">
                                            <i class="fa fa-film"></i>
                                        </div>
                                    </div>
                                    <!-- single_quick_activity  -->
                                    <div class="single_quick_activity d-flex justify-content-between">
                                        <div class="count_content">
                                            <p>Visitor</p>
                                            <h3><span class="counter">35000</span></h3>
                                        </div>
                                        <div class="font-icon-dash">
                                            <i class="fa fa-globe-asia"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="white_card card_height_100 mb_30">
                    <div class="white_card_header">
                        <div class="box_header m-0">
                            <div class="main-title">
                                <h3 class="m-0">Statistik Visitor</h3>
                            </div>
                            <div class="header_more_tool">
                                <div class="dropdown">
                                    <span class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown">
                                        <i class="ti-more-alt"></i>
                                    </span>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">
                                            <i class="ti-eye"></i> Action</a>
                                        <a class="dropdown-item" href="#">
                                            <i class="ti-trash"></i> Delete</a>
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-edit"></i> Edit</a>
                                        <a class="dropdown-item" href="#">
                                            <i class="ti-printer"></i> Print</a>
                                        <a class="dropdown-item" href="#">
                                            <i class="fa fa-download"></i> Download</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="white_card_body p-0">
                        <div id="iq-chart-order" style="height: 400px; position: relative"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>