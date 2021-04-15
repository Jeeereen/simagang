<div class="container">
    <div class="row">
        <div class="col">
            <div class="card mb-3" style="max-width: auto;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="/template/dist/img/<?= $datamagang['gambar']; ?>" alt=" ...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $datamagang['nama']; ?></h5>
                            <p class="card-text"><b>NIK</b> : <?= $datamagang['nik']; ?></p>
                            <p class="card-text"><b>Jurusan</b> : <?= $datamagang['jurusan']; ?></p>
                            <p class="card-text"><b>Email</b> : <?= $datamagang['email']; ?></p>
                            <p class="card-text"><b>Tanggal Lahir</b> : <?= $datamagang['ttl']; ?></p>
                            <p class="card-text"><b>Jenis Kelamin</b> : <?= $datamagang['jeniskelamin']; ?></p>
                            <p class="card-text"><b>Alamat</b> : <?= $datamagang['alamat']; ?></p>
                            <p class="card-text"><b>Nomor Telepon</b> : <?= $datamagang['notp']; ?></p>
                            <p class="card-text"><b>Agama</b> : <?= $datamagang['agama']; ?></p>

                            <a href="/datamagang/edit/<?= $datamagang['magang_id']; ?>" class="btn btn-warning">Edit</a>
                            <form action="/datamagang/<?= $datamagang['magang_id']; ?>" method="POST" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda ingin menghapus data <?= $datamagang['nama']; ?>')">Delete</button>
                            </form> <br><br>
                            <a href="/datamagang">Kembali ke daftar magang.</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>