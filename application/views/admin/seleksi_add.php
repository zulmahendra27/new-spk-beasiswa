<form method="post">
  <div class="mb-2 row">
    <label for="mhs" class="col-lg-2 col-form-label">Nama Mahasiswa</label>
    <div class="col-lg-3">
      <select name="mhs" id="mhs" class="form-control">
        <?php foreach ($rs_mhs->result() as $mhs): ?>
        <option value="<?= $mhs->id_mhs; ?>"><?= $mhs->nama; ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="col-auto">
      <span class="form-text">
        <?= form_error('mhs') ?>
      </span>
    </div>
  </div>

  <?php foreach ($rs_kriteria->result() as $kriteria): ?>
  <div class="mb-2 row">
    <label class="col-lg-2 col-form-label"><?= $kriteria->nama; ?></label>
    <div class="col-lg-3">
      <select name="kriteria[]" class="form-control">
        <?php foreach ($rs_subkriteria->result() as $subkriteria): if ($subkriteria->id_kriteria == $kriteria->id_kriteria): ?>
        <option value="<?= $subkriteria->id_subkriteria; ?>"><?= htmlspecialchars_decode($subkriteria->nama_sub); ?>
        </option>
        <?php endif; endforeach; ?>
      </select>
    </div>
    <div class="col-auto">
      <span class="form-text">
        <?= form_error('kriteria') ?>
      </span>
    </div>
  </div>
  <?php endforeach; ?>

  <div class="mb-2 row">
    <div class="col-lg-2"></div>
    <div class="col-lg-3">
      <button type="submit" class="btn btn-success"><span data-feather="save"></span> Simpan</button>
    </div>
  </div>
</form>