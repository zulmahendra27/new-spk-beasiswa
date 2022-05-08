<div class="form-group mb-3">
  <div class="card">
    <div class="card-header bg-info">
      <h5>Nilai Preferensi yang paling tinggi adalah yang paling berhak menerima beasiswa</h5>
    </div>
  </div>
</div>

<div class="form-group">
  <a href="<?= base_url('seleksi/add') ?>" class="btn btn-success mb-3">
    <span data-feather="plus"></span> Tambah Data
  </a>
</div>
<?php if ($this->session->flashdata('alt')): ?>
<div class="alert alert-<?= $this->session->flashdata('alt') ?>"><?= $this->session->flashdata('msg') ?></div>
<?php endif; ?>
<div class="table-responsive">
  <table class="table table-striped table-sm text-center">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama Siswa</th>
        <?php foreach ($rs_kriteria->result() as $kriteria): ?>
        <th scope="col"><?= $kriteria->nama; ?></th>
        <?php endforeach; ?>
      </tr>
    </thead>
    <tbody>
      <?= $html ?>
    </tbody>
  </table>
</div>

<div class="form-group">
  <h5>Normalisasi</h5>
</div>

<div class="table-responsive">
  <table class="table table-striped table-sm text-center">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama Siswa</th>
        <?php foreach ($rs_kriteria->result() as $kriteria): ?>
        <th scope="col"><?= $kriteria->nama; ?></th>
        <?php endforeach; ?>
      </tr>
    </thead>
    <tbody>
      <?= $normalisasi; ?>
    </tbody>
  </table>
</div>

<div class="form-group">
  <h5>Preferensi</h5>
</div>

<div class="table-responsive">
  <table class="table table-striped table-sm text-center">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama Siswa</th>
        <th scope="col">Preferensi</th>
        <th scope="col">Ranking</th>
      </tr>
    </thead>
    <tbody>
      <?php $i=1; foreach ($preferensi as $pref): ?>
      <tr>
        <td><?= $i; ?></td>
        <td><?= $pref[0]; ?></td>
        <td><?= $pref[1]; ?></td>
        <td><?= $i; ?></td>
      </tr>
      <?php $i++; endforeach; ?>
    </tbody>
  </table>
</div>