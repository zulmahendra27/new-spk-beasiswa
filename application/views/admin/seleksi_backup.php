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
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php if ($rs_mhs->num_rows()): $i = 1; foreach ($rs_mhs->result() as $mhs): ?>
      <tr>
        <td><?= $i ?></td>
        <td><?= $mhs->nama; ?></td>
        <?php foreach ($result->result() as $seleksi): if ($seleksi->id_mhs == $mhs->id_mhs): ?>
        <td><?= htmlspecialchars_decode($seleksi->nama_sub); ?></td>
        <?php endif; endforeach; ?>
        <td>
          <a href="<?= base_url('seleksi/delete/'.$mhs->id_mhs) ?>" class="btn btn-sm btn-danger"
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
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php if ($rs_mhs->num_rows()): $i = 1; foreach ($rs_mhs->result() as $mhs): ?>
      <tr>
        <td><?= $i ?></td>
        <td><?= $mhs->nama; ?></td>
        <?php
        foreach ($result->result() as $seleksi) {
          if ($seleksi->id_mhs == $mhs->id_mhs) {
            foreach ($rs_max_min->result() as $max_min) {
              if ($max_min->id_kriteria == $seleksi->id_kriteria) {
                if ($max_min->type == 'benefit') {
                  $normal = $seleksi->bobot_sub / $max_min->max_bobot;
                } else {
                  $normal = $max_min->min_bobot / $seleksi->bobot_sub;
                }
        ?>
        <td><?= $normal; ?></td>
        <?php } } } } ?>
        <td>
          <a href="<?= base_url('seleksi/delete/'.$mhs->id_mhs) ?>" class="btn btn-sm btn-danger"
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