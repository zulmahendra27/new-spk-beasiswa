<form method="post">
  <div class="mb-2 row">
    <label for="nama" class="col-lg-2 col-form-label">Nama</label>
    <div class="col-lg-3">
      <input type="text" class="form-control" id="nama" name="nama" required value="<?= set_value('nama') ?>">
    </div>
    <div class="col-auto">
      <span class="form-text">
        <?= form_error('nama') ?>
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
    <label for="type" class="col-lg-2 col-form-label">Type</label>
    <div class="col-lg-3">
      <select name="type" id="type" class="form-control">
        <option value="cost">Cost</option>
        <option value="benefit">Benefit</option>
      </select>
    </div>
    <div class="col-auto">
      <span class="form-text">
        <?= form_error('type') ?>
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