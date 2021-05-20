<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <ul class="sidebar-menu">
      <li>
        <a href="/dashboard">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>
      <li id="menu-master" class="treeview">
        <a href="#">
          <i class="fa fa-book"></i>
          <span>Master</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li id="menu-cabang"><a href="/dashboard/cabang"><i class="fa fa-circle-o"></i> Cabang</a></li>
          <li id="menu-jenis"><a href="/dashboard/jenis"><i class="fa fa-circle-o"></i> Jenis</a></li>
          <li id="menu-status"><a href="/dashboard/status"><i class="fa fa-circle-o"></i> Status</a></li>
          <li id="menu-material"><a href="/dashboard/material"><i class="fa fa-circle-o"></i> Material</a></li>
        </ul>
      </li>
      <li>
        <a href="/dashboard/asset">
          <i class="fa fa-th"></i> <span>Asset</span>
          <small class="label pull-right bg-green">{{Asset::assetCount()}}</small>
        </a>
      </li>

      <li>
        <a href="/dashboard/proyek">
          <i class="fa fa-th"></i> <span>Proyek</span>
          <small class="label pull-right bg-red">{{Asset::assetCount()}}</small>
        </a>
      </li>

      @if(Auth::user()->hasRole('admin'))
      <li>
        <a href="/dashboard/users">
          <i class="fa fa-users"></i> <span>Pengguna</span>
          <small class="label pull-right bg-yellow">{{Asset::userCount()}}</small>
        </a>
      </li>
      @endif

      <li class="treeview">
        <a href="#">
          <i class="fa fa-files-o"></i> <span>Laporan</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="/dashboard/laporan"><i class="fa fa-circle-o"></i> Laporan Aset</a></li>
        </ul>
      </li>

    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
