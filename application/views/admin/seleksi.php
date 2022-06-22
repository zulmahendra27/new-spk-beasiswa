<div class="form-group">
  <a href="<?= base_url('seleksi/add') ?>" class="btn btn-success mb-3">
    <span data-feather="plus"></span> Tambah Data
  </a>
</div>
<?php if ($this->session->flashdata('alt')) : ?>
<div class="alert alert-<?= $this->session->flashdata('alt') ?>"><?= $this->session->flashdata('msg') ?></div>
<?php endif; ?>
<div class="table-responsive">
  <table class="table table-striped table-sm text-center">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama Siswa</th>
        <?php foreach ($rs_kriteria->result() as $kriteria) : ?>
        <th scope="col"><?= $kriteria->nama; ?></th>
        <?php endforeach; ?>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php $i = 1;
      if (count($seleksi) > 0) : foreach ($seleksi as $sel) : ?>
      <tr>
        <td><?= $i; ?></td>
        <td><?= $sel[0]; ?></td>
        <?php if (array_key_exists(2, $sel)) : foreach ($sel[2] as $sub) : ?>
        <td><?= htmlspecialchars_decode($sub) ?></td>
        <?php endforeach;
            endif; ?>
        <td>
          <a href="<?= base_url('seleksi/delete/' . $sel[1]) ?>" class="btn btn-sm btn-danger"
            onclick="return confirm('Hapus data?')">
            <span data-feather="delete"></span>
          </a>
        </td>
      </tr>
      <?php $i++;
        endforeach;
      else : ?>
      <tr>
        <td colspan="<?= intval($rs_kriteria->num_rows()) + 3 ?>">Tidak ada data</td>
      </tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>

<div class="form-group">
  <h5>Data Bobot</h5>
</div>

<div class="table-responsive">
  <table class="table table-striped table-sm text-center">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama Siswa</th>
        <?php foreach ($rs_kriteria->result() as $kriteria) : ?>
        <th scope="col"><?= $kriteria->nama; ?></th>
        <?php endforeach; ?>
      </tr>
    </thead>
    <tbody>
      <?php $i = 1;
      if (count($normalisasi) > 0) : foreach ($normalisasi as $norm) : ?>
      <tr>
        <td><?= $i; ?></td>
        <td><?= $norm[0]; ?></td>
        <?php foreach ($norm[2] as $sub) : ?>
        <td><?= $sub ?></td>
        <?php endforeach; ?>
      </tr>
      <?php $i++;
        endforeach;
      else : ?>
      <tr>
        <td colspan="<?= intval($rs_kriteria->num_rows()) + 2 ?>">Tidak ada data</td>
      </tr>
      <?php endif; ?>
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
        <?php foreach ($rs_kriteria->result() as $kriteria) : ?>
        <th scope="col"><?= $kriteria->nama; ?></th>
        <?php endforeach; ?>
      </tr>
    </thead>
    <tbody>
      <?php $i = 1;
      if (count($normalisasi) > 0) : foreach ($normalisasi as $norm) : ?>
      <tr>
        <td><?= $i; ?></td>
        <td><?= $norm[0]; ?></td>
        <?php foreach ($norm[1] as $sub) : ?>
        <td><?= number_format($sub, 2, ',', '.') ?></td>
        <?php endforeach; ?>
      </tr>
      <?php $i++;
        endforeach;
      else : ?>
      <tr>
        <td colspan="<?= intval($rs_kriteria->num_rows()) + 2 ?>">Tidak ada data</td>
      </tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>