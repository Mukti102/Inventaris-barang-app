   <!--begin::Sidebar-->
   <aside class="app-sidebar bg-primary shadow" data-bs-theme="dark">
       <!--begin::Sidebar Brand-->
       <div class="sidebar-brand">
           <!--begin::Brand Link-->
           <a href="./index.html" class="brand-link">
               <!--begin::Brand Image-->
               <img src="{{asset('storage/'.setting('logo'))}}" alt="logo"
                   class="brand-image opacity-75 shadow" />
               <!--end::Brand Image-->
               <!--begin::Brand Text-->
               <span class="brand-text fw-light">{{setting('site_name')}}</span>
               <!--end::Brand Text-->
           </a>
           <!--end::Brand Link-->
       </div>
       <!--end::Sidebar Brand-->
       <!--begin::Sidebar Wrapper-->
       <div class="sidebar-wrapper">
           <nav class="mt-2">
               <!--begin::Sidebar Menu-->
               <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu"
                   data-accordion="false">
                   <li class="nav-item">
                       <a href="{{ route('dashboard') }}"
                           class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}">
                           <i class="nav-icon bi bi-speedometer"></i>
                           <p>Dashboard</p>
                       </a>
                   </li>
                   <li class="nav-item">
                       <a href="{{ route('category.index') }}"
                           class="nav-link {{ request()->is('category*') ? 'active' : '' }}">
                           <i class="nav-icon bi bi-box-seam-fill"></i>

                           <p>Kategory Barang</p>
                       </a>
                   </li>
                   <li class="nav-item">
                       <a href="{{ route('invetarisBarang.index') }}"
                           class="nav-link {{ request()->is('invetarisBarang*') ? 'active' : '' }}">
                           <i class="nav-icon bi bi-box-seam-fill"></i>

                           <p>Invetaris Barang</p>
                       </a>
                   </li>
                   <li class="nav-item">
                       <a href="{{ route('pagu-anggaran.index') }}"
                           class="nav-link {{ request()->is('pagu-anggaran*') ? 'active' : '' }}">
                           <i class="nav-icon bi bi-box-seam-fill"></i>

                           <p>Pagu Anggaran</p>
                       </a>
                   </li>
                   <li class="nav-item">
                       <a href="{{ route('penyediaan.index') }}"
                           class="nav-link {{ request()->is('penyediaan*') ? 'active' : '' }}">
                           <i class="nav-icon bi bi-inboxes"></i>

                           <p>Laporan Pengadaan Barang Baru</p>
                       </a>
                   </li>
                   <li class="nav-item">
                       <a href="{{ route('distribution.index') }}"
                           class="nav-link {{ request()->is('distribution*') ? 'active' : '' }}">
                           <i class="nav-icon bi bi-dropbox"></i>

                           <p>Laporan Pengeluaraan Barang</p>
                       </a>
                   </li>
                   <li class="nav-item">
                       <a href="{{ route('laporan-barang.index') }}"
                           class="nav-link {{ request()->is('laporan-barang*') ? 'active' : '' }}">
                           <i class="nav-icon bi bi-journals"></i>

                           <p>Informasi Laporan Barang</p>
                       </a>
                   </li>
                   <li class="nav-item">
                       <a href="{{ route('permintaan.index') }}"
                           class="nav-link {{ request()->is('permintaan*') ? 'active' : '' }}">
                           <i class="nav-icon bi-archive-fill"></i>

                           <p>Informasi Permintaan Barang</p>
                       </a>
                   </li>
                   <li class="nav-item">
                       <a href="{{ route('financialreport.index') }}"
                           class="nav-link {{ request()->is('financialreport*') ? 'active' : '' }}">
                           <i class="nav-icon bi bi-cash-coin"></i>

                           <p>Laporan Keuangan Pagu</p>
                       </a>
                   </li>
                   <li class="nav-item">
                       <a href="{{ route('laporan-bulanan') }}"
                           class="nav-link {{ request()->is('laporan-bulanan*') ? 'active' : '' }}">
                           <i class="nav-icon bi-journal-text"></i>

                           <p>Laporan Bulanan</p>
                       </a>
                   </li>
                   <li class="nav-item">
                       <a href="{{ route('laporan.index') }}"
                           class="nav-link {{ request()->is('laporan*') ? 'active' : '' }}">
                           <i class="fa-solid fa-book"></i>

                           <p>Rekap Laporan</p>
                       </a>
                   </li>
                   <li class="nav-header">SETTING</li>
                   <li class="nav-item">
                       <a href="{{route('setting.index')}}" class="nav-link  {{ request()->is('setting*') ? 'active' : '' }}">
                           <i class="nav-icon bi bi-gear-wide-connected"></i>
                           <p>setting</p>
                       </a>
                   </li>
                   <li class="nav-item">
                       <a href="{{route('profile.edit')}}" class="nav-link">
                           <i class="nav-icon bi bi-person"></i>
                           <p>Profile</p>
                       </a>
                   </li>
               </ul>
               <!--end::Sidebar Menu-->
           </nav>
       </div>
       <!--end::Sidebar Wrapper-->
   </aside>
   <!--end::Sidebar-->
