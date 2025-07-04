<style>
  .collapse a {
    text-indent: 10px;
  }
  nav#sidebar {
    border-right: 1px solid #dee2e6;
    min-height: 100vh;
  }
  nav#sidebar .nav-item {
    display: block;
    padding: 0.75rem 1.25rem;
    color: #333;
    font-weight: 500;
    text-decoration: none;
    transition: background-color 0.3s ease;
  }
  nav#sidebar .nav-item:hover,
  nav#sidebar .nav-item.active {
    background-color: #f8f9fa;
    border-left: 4px solid #0d6efd;
    color: #0d6efd;
  }
  nav#sidebar .icon-field {
    width: 24px;
    display: inline-block;
    text-align: center;
    margin-right: 8px;
  }
  nav#sidebar ul.list-unstyled li a {
    padding-left: 2rem;
    font-size: 0.95rem;
    display: block;
    color: #555;
  }
  nav#sidebar ul.list-unstyled li a:hover {
    color: #0d6efd;
  }
  .nav-active {
    font-weight: bold;
    color: #0d6efd !important;
  }
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<link rel="stylesheet" type="text/css" href="assets/css/matarial.css">
<nav id="sidebar" class='mx-lt-5 bg-white'>
  <div class="sidebar-list">
    <div id="sidebar-menu" class="sidebar-inner">
      <ul class="p-0">
        <a href="index.php?page=home" class="nav-item nav-home"><span class='icon-field'><i class="bi bi-speedometer2"></i></span> Dashboard</a>

        <li class="has_sub">
          <a href="javascript:void(0);" class="nav-item nav-categories waves-effect">
            <i class="bi bi-columns-gap"></i>
            <span> House Type</span>
            <span class="float-right"><i class="bi bi-chevron-right"></i></span>
          </a>
          <ul class="list-unstyled">
            <li><a href="index.php?page=categories">Add</a></li>
            <li><a href="index.php?page=manage_categories">Manage</a></li>
          </ul>
        </li>

        <li class="has_sub">
          <a href="javascript:void(0);" class="nav-item nav-categories waves-effect">
            <i class="bi bi-house"></i>
            <span> House</span>
            <span class="float-right"><i class="bi bi-chevron-right"></i></span>
          </a>
          <ul class="list-unstyled">
            <li><a href="index.php?page=houses">Add</a></li>
            <li><a href="index.php?page=manage_houses">Manage</a></li>
          </ul>
        </li>

        <a href="index.php?page=tenants" class="nav-item nav-tenants"><span class='icon-field'><i class="bi bi-people"></i></span> Tenants</a>
        <a href="index.php?page=invoices" class="nav-item nav-invoices"><span class='icon-field'><i class="bi bi-receipt"></i></span> Payments</a>

        <li class="has_sub">
          <a href="javascript:void(0);" class="nav-item nav-categories waves-effect">
            <i class="bi bi-bar-chart"></i>
            <span> Reports</span>
            <span class="float-right"><i class="bi bi-chevron-right"></i></span>
          </a>
          <ul class="list-unstyled">
            <li><a href="index.php?page=payment_report">Monthly Payments Report</a></li>
            <li><a href="index.php?page=balance_report">Rental Balances Report</a></li>
          </ul>
        </li>

        <?php if($_SESSION['login_type'] == 1): ?>
          <a href="index.php?page=users" class="nav-item nav-users"><span class='icon-field'><i class="bi bi-person-gear"></i></span> Users</a>
        <?php endif; ?>

      </ul>
    </div>
  </div>
</nav>
<script>
  $('.nav_collapse').click(function(){
    console.log($(this).attr('href'));
    $($(this).attr('href')).collapse();
  });
  $('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active');
</script>
<script>
  $(document).ready(function() {
    $('.has_sub ul').hide();
    $('.has_sub > a').click(function(e) {
      e.preventDefault();
      var $submenu = $(this).next('ul');
      $('.has_sub ul').not($submenu).slideUp();
      $submenu.slideToggle();
      $(this).toggleClass('nav-active');
    });
  });
</script>