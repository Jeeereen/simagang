<div class="container">
    <div class="row">
        <div class="col-8">
            <form action="/datamagang/save" method="post" class="mt-5" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" value="<?= old('nama'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="nik" class="col-sm-2 col-form-label">NIK</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('nik')) ? 'is-invalid' : ''; ?>" id="nik" value="<?= old('nik'); ?>" name="nik">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nik'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="file" class="custom-file-input <?= ($validation->hasError('gambar')) ? 'is-invalid' : ''; ?>" id="gambar" name="gambar">
                            <label class="custom-file-label" for="gambar">Pilih gambar...</label>
                            <div class="invalid-feedback">
                                <?= $validation->getError('gambar'); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="ttl" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="ttl" value="<?= old('ttl'); ?>" name="ttl">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" value="<?= old('email'); ?>" name="email">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="jeniskelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="jeniskelamin" value="<?= old('jeniskelamin'); ?>" name="jeniskelamin">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="alamat" value="<?= old('alamat'); ?>" name="alamat">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="notp" class="col-sm-2 col-form-label">Nomor Telepon</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="notp" value="<?= old('notp'); ?>" name="notp" placeholder="08**********">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="agama" class="col-sm-2 col-form-label">Agama</label>
                    <div class="col-sm-10">
                        <input type="select" class="form-control" id="agama" value="<?= old('agama'); ?>" name="agama">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="jurusan" class="col-sm-2 col-form-label">Jurusan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="jurusan" value="<?= old('jurusan'); ?>" name="jurusan">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Tambah Magang</button>
                <br><br> <a href="/datamagang">Kembali ke daftar magang.</a>
            </form>
        </div>
    </div>
</div>