<div class="container">
    <div class="row-mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Form Ubah Data
                </div>
                <div class="card-body">

                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?= $mahasiswa['id']; ?>">
                        <div class="form-group">
                            <label for="nama">Nama Mahasiswa</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $mahasiswa['nama'] ?>">
                            <small class="form-text text-danger">
                                <?= form_error('nama'); ?>
                            </small>
                        </div>
                        <div class="form-group">
                            <label for="nrp">NRP</label>
                            <input type="text" class="form-control" id="nrp" name="nrp" value="<?= $mahasiswa['nrp'] ?>">
                            <small class="form-text text-danger">
                                <?= form_error('nrp'); ?>
                            </small>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?= $mahasiswa['email'] ?>">
                            <small class="form-text text-danger">
                                <?= form_error('email'); ?>
                            </small>
                        </div>
                        <div class="form-group">
                            <label for="jurusan">Jurusan</label>
                            <select class="custom-select" id="jurusan" name="jurusan">
                                <?php foreach ($jurusan as $jrs) : ?>
                                    <?php if ($jrs == $mahasiswa['jurusan']) : ?>
                                        <option value="<?= $jrs ?>" selected><?= $jrs ?></option>
                                    <?php else : ?>
                                        <option value="<?= $jrs ?>"><?= $jrs ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary float-right" name="tambah">Ubah Data</button>
                    </form>
                </div>
            </div>


        </div>
    </div>
</div>