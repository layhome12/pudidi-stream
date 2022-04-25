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
                                            <h3><span class="counter"><?= $cards['users']; ?></span></h3>
                                        </div>
                                        <div class="font-icon-dash">
                                            <i class="fa fa-users"></i>
                                        </div>
                                    </div>
                                    <!-- single_quick_activity  -->
                                    <div class="single_quick_activity d-flex justify-content-between">
                                        <div class="count_content">
                                            <p>Movies</p>
                                            <h3><span class="counter"><?= $cards['movies']; ?></span></h3>
                                        </div>
                                        <div class="font-icon-dash">
                                            <i class="fa fa-film"></i>
                                        </div>
                                    </div>
                                    <!-- single_quick_activity  -->
                                    <div class="single_quick_activity d-flex justify-content-between">
                                        <div class="count_content">
                                            <p>Visitor</p>
                                            <h3><span class="counter"><?= $cards['visitor']->statistik_count ?></span></h3>
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
                                        <a class="dropdown-item" href="<?= base_url('utils/cetak_pdf'); ?>">
                                            <i class="fa fa-download"></i> Download</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="white_card_body p-0">
                        <div id="iq-chart-order-1" style="height: 400px; position: relative"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('custom_js'); ?>
<script>
    var chart = am4core.create("iq-chart-order-1", am4charts.XYChart);
    $(document).ready(
        function() {
            chartAM();
            getData();
        }
    );

    function chartAM() {
        am4core.useTheme(am4themes_animated);
        chart.padding(40, 40, 40, 40);

        var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
        categoryAxis.renderer.grid.template.location = 0;
        categoryAxis.dataFields.category = "month_name";
        categoryAxis.renderer.minGridDistance = 60;
        categoryAxis.renderer.inversed = true;
        categoryAxis.renderer.grid.template.disabled = true;

        var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
        valueAxis.min = 0;
        valueAxis.extraMax = 0.1;

        var series = chart.series.push(new am4charts.ColumnSeries());
        series.dataFields.categoryX = "month_name";
        series.dataFields.valueY = "value";
        series.tooltipText = "{valueY.value}"
        series.columns.template.strokeOpacity = 0;
        series.columns.template.column.cornerRadiusTopRight = 10;
        series.columns.template.column.cornerRadiusTopLeft = 10;

        var labelBullet = series.bullets.push(new am4charts.LabelBullet());
        labelBullet.label.verticalCenter = "bottom";
        labelBullet.label.dy = -10;
        labelBullet.label.text = "{values.valueY.workingValue.formatNumber('#.')}";

        // Color Auto
        series.columns.template.adapter.add("fill", function(fill, target) {
            return chart.colors.getIndex(target.dataItem.index);
        });
    }

    function getData() {
        $.ajax({
            type: 'POST',
            url: '<?= base_admin('/dashboard/get_chart'); ?>',
            data: {
                'tahun': '<?= date('Y') ?>'
            },
            dataType: 'json',
            async: false,
            success: function(result, textStatus, xhr) {
                if (result.status == 1) {
                    chart.data = result.data;
                }
            }
        });
    }
</script>
<?= $this->endSection(); ?>