<form method="post">
  <div class="mb-2 row">
    <label for="nama_sub" class="col-lg-2 col-form-label">Nama Subkriteria</label>
    <div class="col-lg-3">
      <input type="text" class="form-control" id="nama_sub" name="nama_sub" required
        value="<?= set_value('nama_sub') ?>">
    </div>
    <div class="col-auto">
      <span class="form-text">
        <?= form_error('nama_sub') ?>
      </span>
    </div>
  </div>

  <div class="mb-2 row">
    <label for="bobot" class="col-lg-2 col-form-label">Bobot</label>
    <div class="col-lg-3">
      <input type="number" class="form-control" id="bobot" name="bobot" required value="<?= set_value('bobot') ?>">
    </div>
    <div class="col-auto">
      <span class="form-text">
        <?= form_error('bobot') ?>
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