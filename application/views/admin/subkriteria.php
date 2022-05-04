<?php if ($result->num_rows()): $kriteria = $result->row(); ?>
<div class="form-group">
  <a href="<?= base_url('subkriteria/add/'.$kriteria->id_kriteria) ?>" class="btn btn-success mb-3">
    <span data-feather="plus"></span> Tambah Data
  </a>
</div>
<?php if ($this->session->flashdata('alt')): ?>
<div class="alert alert-<?= $this->session->flashdata('alt') ?>"><?= $this->session->flashdata('msg') ?></div>
<?php endif; ?>
<div class="card bg-info">
  <div class="card-header">
    <div class="row">
      <div class="col-lg-2">
        <h5>Nama Kriteria</h5>
      </div>
      <div class="col-lg-10">
        <h5>: <?= $kriteria->nama; ?></h5>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-2">
        <h5>Bobot</h5>
      </div>
      <div class="col-lg-10">
        <h5>: <?= $kriteria->bobot; ?></h5>
      </div>
    </div>
  </div>
</div>
<div class="table-responsive">
  <table class="table table-striped table-sm text-center">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama</th>
        <th scope="col">Bobot</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php if ($kriteria->id_subkriteria != null): $i = 1; foreach ($result->result() as $subkriteria): ?>
      <tr>
        <td><?= $i ?></td>
        <td><?= htmlspecialchars_decode($subkriteria->nama_sub) ?></td>
        <td><?= $subkriteria->bobot_sub ?></td>
        <td>
          <a href="<?= base_url('subkriteria/edit/'.$subkriteria->id_kriteria.'/'.$subkriteria->id_subkriteria) ?>"
            class="btn btn-sm btn-primary">
            <span data-feather="edit"></span>
          </a>
          <a href="<?= base_url('subkriteria/delete/'.$subkriteria->id_kriteria.'/'.$subkriteria->id_subkriteria) ?>"
            class="btn btn-sm btn-danger" onclick="return confirm('Hapus data?')">
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
<?php else: echo "<script>alert('Data tidak ditemukan');</script>"; echo "<script>window.location.href='".base_url('kriteria')."';</script>"; endif; ?>