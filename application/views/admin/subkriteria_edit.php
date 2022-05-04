<?php if ($result->num_rows()): $subkriteria = $result->row(); ?>
<div class="card bg-info mb-2">
  <div class="card-header">
    <div class="row">
      <div class="col-lg-2">
        <h5>Nama Kriteria</h5>
      </div>
      <div class="col-lg-10">
        <h5>: <?= $subkriteria->nama; ?></h5>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-2">
        <h5>Bobot</h5>
      </div>
      <div class="col-lg-10">
        <h5>: <?= $subkriteria->bobot; ?></h5>
      </div>
    </div>
  </div>
</div>
<form method="post">
  <div class="mb-2 row">
    <label for="nama_sub" class="col-lg-2 col-form-label">Nama</label>
    <div class="col-lg-3">
      <input type="text" class="form-control" id="nama_sub" name="nama_sub" required
        value="<?= htmlspecialchars_decode($subkriteria->nama_sub) ?>">
    </div>
    <div class="col-auto">
      <span class="form-text">
        <?= form_error('nama_sub') ?>
      </span>
    </div>
  </div>

  <div class="mb-2 row">
    <label for="bobot_sub" class="col-lg-2 col-form-label">Bobot</label>
    <div class="col-lg-3">
      <input type="number" class="form-control" id="bobot_sub" name="bobot_sub" required
        value="<?= $subkriteria->bobot_sub ?>">
    </div>
    <div class="col-auto">
      <span class="form-text">
        <?= form_error('bobot_sub') ?>
      </span>
    </div>
  </div>

  <div class="mb-2 row">
    <div class="col-lg-2"></div>
    <div class="col-lg-3">
      <button type="submit" class="btn btn-success"><span data-feather="save"></span> Simpan</button>
    </div>
  </div>
</form>
<?php else: echo "<script>alert('Data tidak ditemukan');</script>"; echo "<script>window.location.href='".base_url('kriteria')."';</script>"; endif; ?>