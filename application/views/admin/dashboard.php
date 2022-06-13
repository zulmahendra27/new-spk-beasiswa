<div class="card mb-3">
  <div class="card-header bg-info pt-3">
    <h5>Nilai Preferensi yang paling tinggi adalah yang paling berhak menerima beasiswa</h5>
  </div>
</div>

<div class="form-group">
  <h5>Preferensi</h5>
</div>

<div class="table-responsive">
  <table class="table table-striped table-sm text-center">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama Siswa</th>
        <th scope="col">Preferensi</th>
        <th scope="col">Ranking</th>
      </tr>
    </thead>
    <tbody>
      <?php $i = 1;
      if (count($preferensi) > 0) : foreach ($preferensi as $pref) : ?>
          <tr>
            <td><?= $i; ?></td>
            <td><?= $pref[0]; ?></td>
            <td><?= number_format($pref[1], 2, ',', '.'); ?></td>
            <td><?= $i; ?></td>
          </tr>
        <?php $i++;
        endforeach;
      else : ?>
        <tr>
          <td colspan="4">Tidak ada data</td>
        </tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>