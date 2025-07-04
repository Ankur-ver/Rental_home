<?php include 'db_connect.php' ?>
<style>
  .dashboard-container {
    padding: 2rem;
  }
  .card-custom {
    border: none;
    border-radius: 15px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    transition: transform 0.3s ease;
    background: linear-gradient(145deg, #f8f9fa, #ffffff);
  }
  .card-custom:hover {
    transform: scale(1.03);
  }
  .card-icon {
    font-size: 3.5rem;
    margin-bottom: 1rem;
    color: #007bff;
  }
  .card-title {
    font-size: 1.3rem;
    font-weight: 600;
  }
  .card-value {
    font-size: 2rem;
    font-weight: bold;
  }
  #chart_div {
    width: 100%;
    height: 500px;
    margin-top: 30px;
    background: #fff;
    border-radius: 10px;
    padding: 2rem;
    box-shadow: 0 4px 20px rgba(0,0,0,0.1);
  }
</style>
<div class="container dashboard-container">
  <h4 class="mb-4">Welcome back, Admin</h4>
  <div class="row g-4">
    <div class="col-sm-6 col-lg-4">
      <div class="card card-custom text-center p-4">
        <i class="fas fa-building card-icon"></i>
        <div class="card-title">All Houses</div>
        <div class="card-value"><?php echo $conn->query("SELECT * FROM houses")->num_rows ?></div>
      </div>
    </div>
    <div class="col-sm-6 col-lg-4 ">
      <div class="card card-custom text-center p-4">
        <i class="fas fa-users card-icon text-warning"></i>
        <div class="card-title">Tenants</div>
        <div class="card-value"><?php echo $conn->query("SELECT * FROM tenants WHERE status = 1")->num_rows ?></div>
      </div>
    </div>
    <div class="col-sm-6 col-lg-4">
      <div class="card card-custom text-center p-4">
        <i class="fas fa-money-bill-wave card-icon text-success"></i>
        <div class="card-title">Payments This Month</div>
        <div class="card-value">
          <?php 
            $payment = $conn->query("SELECT sum(amount) as paid FROM payments WHERE date(date_created) = '".date('Y-m-d')."'"); 
            echo $payment->num_rows > 0 ? number_format($payment->fetch_array()['paid'], 2) : 0;
          ?>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-lg-4 mt-2">
      <div class="card card-custom text-center p-4">
        <i class="fas fa-clipboard-list card-icon text-danger"></i>
        <div class="card-title">Reports</div>
        <div class="card-value"><?php echo $conn->query("SELECT * FROM tenants WHERE status = 1")->num_rows ?></div>
      </div>
    </div>
    <div class="col-sm-6 col-lg-4 mt-2">
      <div class="card card-custom text-center p-4">
        <i class="fas fa-house-user card-icon text-info"></i>
        <div class="card-title">All House Type</div>
        <div class="card-value"><?php echo $conn->query("SELECT * FROM tenants WHERE status = 1")->num_rows ?></div>
      </div>
    </div>
    <div class="col-sm-6 col-lg-4 mt-2">
      <div class="card card-custom text-center p-4">
        <i class="fas fa-user-friends card-icon text-secondary"></i>
        <div class="card-title">Total Users</div>
        <div class="card-value"><?php echo $conn->query("SELECT * FROM tenants WHERE status = 1")->num_rows ?></div>
      </div>
    </div>
  </div>
  <div id="chart_div"></div>
</div>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load('current', {'packages':['bar']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Type', 'Booking'],
      ['Single-Family Home', 11],
      ['Townhouse', 2],
      ['Condominium', 2],
      ['Duplex', 2],
      ['Tiny House', 7]
    ]);

    var options = {
  chart: {
    title: 'Booking Trends by House Type',
    subtitle: "This Month's Activity"
  },
  bars: 'vertical',
  colors: ['#4285F4'],
  };

    var chart = new google.charts.Bar(document.getElementById('chart_div'));

    chart.draw(data, google.charts.Bar.convertOptions(options));

    window.addEventListener('resize', () => chart.draw(data, google.charts.Bar.convertOptions(options)));
  }
</script>
<script src="https://unpkg.com/feather-icons"></script>
<script>
  feather.replace();
</script>
<footer class="footer d-flex flex-column flex-md-row align-items-center justify-content-between px-4 py-3 border-top small">
  <p class="text-muted mb-1 mb-md-0">Copyright © 2025 <a href="#" target="_blank">Rental House</a> - Design By Ankur Verma</p>
</footer>
