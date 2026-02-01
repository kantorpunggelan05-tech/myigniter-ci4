<?= $this->extend('layout/wrapper') ?>

<?= $this->section('content') ?>

<!-- Baris Widget Statistik (Small Boxes) -->
<div class="row">
    <!-- Box Mahasiswa -->
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3><?= $jumlah_mhs ?></h3>
                <p>Data Mahasiswa</p>
            </div>
            <div class="icon">
                <i class="fa fa-graduation-cap"></i>
            </div>
            <a href="<?= base_url('mahasiswa') ?>" class="small-box-footer">Lihat Detail <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    
    <!-- Box Dosen (SINKRON DENGAN DB) -->
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-green">
            <div class="inner">
                <h3><?= $jumlah_dosen ?></h3>
                <p>Data Dosen</p>
            </div>
            <div class="icon">
                <i class="fa fa-briefcase"></i>
            </div>
            <a href="<?= base_url('dosen') ?>" class="small-box-footer">Lihat Detail <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    
    <!-- Box User Admin (BARU) -->
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3><?= $jumlah_user ?></h3>
                <p>User Administrator</p>
            </div>
            <div class="icon">
                <i class="fa fa-user-secret"></i>
            </div>
            <!-- Link diaktifkan ke modul Users -->
            <!-- Pastikan route /users sudah dibuat di Config/Routes.php -->
            <a href="<?= base_url('users') ?>" class="small-box-footer">Kelola User <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>
<!-- /.row -->

<!-- Baris Grafik & Info -->
<div class="row">
    <!-- Kolom Grafik -->
    <div class="col-md-7">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Grafik Populasi Kampus</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div class="chart">
                    <!-- Canvas untuk Chart.js -->
                    <canvas id="barChart" style="height:230px"></canvas>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
    </div>

    <!-- Kolom Informasi Sistem -->
    <div class="col-md-5">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Status Sistem</h3>
            </div>
            <div class="box-body">
                <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                        <b>Status Database</b> <a class="pull-right text-success">Terhubung <i class="fa fa-check"></i></a>
                    </li>
                    <li class="list-group-item">
                        <b>Framework</b> <a class="pull-right">CodeIgniter 4.x</a>
                    </li>
                    <li class="list-group-item">
                        <b>Server Time</b> <a class="pull-right"><?= date('d M Y H:i') ?></a>
                    </li>
                    <li class="list-group-item">
                        <b>Login Sebagai</b> <a class="pull-right"><?= session()->get('name') ?></a>
                    </li>
                </ul>
                <div class="alert alert-info alert-dismissible" style="margin-top: 10px;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-info"></i> Info!</h4>
                    Data pada grafik di samping diambil secara <i>real-time</i> dari database.
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<!-- Section Script Khusus Dashboard -->
<?= $this->section('script') ?>
<!-- ChartJS 1.0.1 (Bawaan AdminLTE) -->
<script src="<?= base_url('assets/js/plugins/chartjs/Chart.min.js') ?>"></script>

<script>
  $(function () {
    // --- KONFIGURASI CHART ---
    
    // Data dari Controller PHP
    var areaChartData = {
      labels: <?= json_encode($chart_label) ?>, // ['Mahasiswa', 'Dosen', 'Staff']
      datasets: [
        {
          label: "Data Kampus",
          fillColor: "rgba(60,141,188,0.9)",
          strokeColor: "rgba(60,141,188,0.8)",
          pointColor: "#3b8bba",
          pointStrokeColor: "rgba(60,141,188,1)",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(60,141,188,1)",
          data: <?= json_encode($chart_data) ?> // [Total Mhs, Total Dosen, Total User]
        }
      ]
    };

    var barChartCanvas = $("#barChart").get(0).getContext("2d");
    var barChart = new Chart(barChartCanvas);
    var barChartData = areaChartData;
    
    // Opsi Chart
    var barChartOptions = {
      scaleBeginAtZero: true,
      scaleShowGridLines: true,
      scaleGridLineColor: "rgba(0,0,0,.05)",
      scaleGridLineWidth: 1,
      scaleShowHorizontalLines: true,
      scaleShowVerticalLines: true,
      barShowStroke: true,
      barStrokeWidth: 2,
      barValueSpacing: 5,
      barDatasetSpacing: 1,
      responsive: true,
      maintainAspectRatio: true
    };

    barChartOptions.datasetFill = false;
    barChart.Bar(barChartData, barChartOptions);
  });
</script>
<?= $this->endSection() ?>