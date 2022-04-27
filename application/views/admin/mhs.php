<div class="form-group">
  <a href="<?= base_url('mhs/add') ?>" class="btn btn-success mb-3">
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
        <th scope="col">NIM</th>
        <th scope="col">Nama</th>
        <th scope="col">Tanggal Lahir</th>
        <th scope="col">Prodi</th>
        <th scope="col">No. HP</th>
        <th scope="col">Email</th>
        <th scope="col">Alamat</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php if ($result->num_rows()): $i = 1; foreach ($result->result() as $mhs): ?>
      <tr>
        <td><?= $i ?></td>
        <td><?= $mhs->nim ?></td>
        <td><?= $mhs->nama ?></td>
        <td><?= date('d-m-Y', strtotime($mhs->tgl_lahir)) ?></td>
        <td><?= $mhs->prodi ?></td>
        <td><?= $mhs->nohp ?></td>
        <td><?= $mhs->email ?></td>
        <td><?= $mhs->alamat ?></td>
        <td>
          <a href="<?= base_url('mhs/edit/'.$mhs->nim) ?>" class="btn btn-sm btn-primary">
            <span data-feather="edit"></span>
          </a>
          <a href="<?= base_url('mhs/delete/'.$mhs->nim) ?>" class="btn btn-sm btn-danger"
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