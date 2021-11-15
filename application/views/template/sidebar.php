 <!-- Sidebar -->
 <ul class="navbar-nav sidebar sidebar-dark accordion" style="background-color: #03a4ed;" id="accordionSidebar">

     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
         <div class="sidebar-brand-icon rotate-n-15">
             <i class="fas fa-laugh-wink"></i>
         </div>
         <div class="sidebar-brand-text mx-3"><sup>Sistem</sup> Pakar</div>
     </a>

     <!-- Divider -->
     <hr class="sidebar-divider my-0">

     <!-- Nav Item - Dashboard -->
     <li class="nav-item">
         <a class="nav-link" href="<?= base_url('admin'); ?>">
             <i class="fas fa-users fa-sm fa-fw mr-2 text-gray-400"></i>
             <span>Data Admin</span></a>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider">

     <!-- Nav Item - Dashboard -->
     <li class="nav-item">
         <a class="nav-link" href="<?= base_url('admin/penyakit_solusi'); ?>">
             <i class="fas fa-book fa-book-alt"></i>
             <span>Data Penyakit</span></a>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider">

     <!-- Nav Item - Dashboard -->
     <li class="nav-item">
         <a class="nav-link" href="<?= base_url('admin/gejala'); ?>">
             <i class="fas fa-book fa-book-alt"></i>
             <span>Data Gejala</span></a>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider">


     <!-- Nav Item - Dashboard -->
     <li class="nav-item">
         <a class="nav-link" href="<?= base_url('admin/relasi'); ?>">
             <i class="fas fa-book fa-book-alt"></i>
             <span>Data Relasi</span></a>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider">

     <li class="nav-item">
         <a class="nav-link" href="<?= base_url('user'); ?>">
             <i class="fas fa-fw fa-tachometer-alt"></i>
             <span>Logout</span></a>
     </li>


     <!-- Sidebar Toggler (Sidebar) -->
     <div class="text-center d-none d-md-inline">
         <button class="rounded-circle border-0" id="sidebarToggle"></button>
     </div>

 </ul>
 <!-- End of Sidebar -->