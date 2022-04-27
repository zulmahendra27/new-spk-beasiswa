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
        <th scope="col">Kriteria</th>
        <th scope="col">Value</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php if ($result->num_rows()): $i = 1; foreach ($result->result() as $seleksi): ?>
      <tr>
        <td><?= $i ?></td>
        <td><?= $seleksi->nama_mhs ?></td>
        <td><?= $seleksi->nama ?></td>
        <td><?= $seleksi->nilai ?></td>
        <td>
          <a href="<?= base_url('seleksi/edit/'.$seleksi->id_seleksi) ?>" class="btn btn-sm btn-primary">
            <span data-feather="edit"></span>
          </a>
          <a href="<?= base_url('seleksi/delete/'.$seleksi->id_seleksi) ?>" class="btn btn-sm btn-danger"
            onclick="return confirm('Hapus data?')">
            <span data-feather="delete"></span>
          </a>
        </td>
      </tr>
      <?php $i++; endforeach; else: ?>
      <tr class="text-center">
        <td colspan="7">Tidak ada data</td>
      </tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>