<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
  <div class="position-sticky">

    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
      <span>Data Master</span>
    </h6>
    <ul class="nav flex-column mb-2">
      <li class="nav-item">
        <a class="nav-link <?= $root=='mhs'?'active':'' ?>" href="<?= base_url('mhs') ?>">
          <span data-feather="users"></span>
          Mahasiswa
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= $root=='kriteria'?'active':'' ?>" href="<?= base_url('kriteria') ?>">
          <span data-feather="bookmark"></span>
          Kriteria
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= $root=='seleksi'?'active':'' ?>" href="<?= base_url('seleksi') ?>">
          <span data-feather="shuffle"></span>
          Seleksi
        </a>
      </li>
    </ul>

  </div>
</nav>