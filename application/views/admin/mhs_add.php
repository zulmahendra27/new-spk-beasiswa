<form method="post">
  <div class="mb-2 row align-items-center">
    <label for="nim" class="col-lg-2 col-form-label">NIM</label>
    <div class="col-lg-3">
      <input type="number" class="form-control" id="nim" name="nim" required value="<?= set_value('nim') ?>">
    </div>
    <div class="col-auto">
      <span class="form-text">
        <?= form_error('nim') ?>
      </span>
    </div>
  </div>

  <div class="mb-2 row">
    <label for="Nama" class="col-lg-2 col-form-label">Nama</label>
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
    <label for="tgl_lahir" class="col-lg-2 col-form-label">Tanggal Lahir</label>
    <div class="col-lg-3">
      <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" required
        value="<?= set_value('tgl_lahir') ?>">
    </div>
    <div class="col-auto">
      <span class="form-text">
        <?= form_error('tgl_lahir') ?>
      </span>
    </div>
  </div>

  <div class="mb-2 row">
    <label for="prodi" class="col-lg-2 col-form-label">Prodi</label>
    <div class="col-lg-3">
      <input type="text" class="form-control" id="prodi" name="prodi" required value="<?= set_value('prodi') ?>">
    </div>
    <div class="col-auto">
      <span class="form-text">
        <?= form_error('prodi') ?>
      </span>
    </div>
  </div>

  <div class="mb-2 row">
    <label for="nohp" class="col-lg-2 col-form-label">No. HP</label>
    <div class="col-lg-3">
      <input type="number" class="form-control" id="nohp" name="nohp" required value="<?= set_value('nohp') ?>">
    </div>
    <div class="col-auto">
      <span class="form-text">
        <?= form_error('nohp') ?>
      </span>
    </div>
  </div>

  <div class="mb-2 row">
    <label for="email" class="col-lg-2 col-form-label">Email</label>
    <div class="col-lg-3">
      <input type="email" class="form-control" id="email" name="email" required value="<?= set_value('email') ?>">
    </div>
    <div class="col-auto">
      <span class="form-text">
        <?= form_error('email') ?>
      </span>
    </div>
  </div>

  <div class="mb-2 row">
    <label for="alamat" class="col-lg-2 col-form-label">Alamat</label>
    <div class="col-lg-3">
      <input type="text" class="form-control" id="alamat" name="alamat" required value="<?= set_value('alamat') ?>">
    </div>
    <div class="col-auto">
      <span class="form-text">
        <?= form_error('alamat') ?>
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