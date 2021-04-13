<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="m-4">Daftar Magang</h1>
            <a href="/datamagang/create" class="btn btn-primary m-3">Tambah Data Magang</a>
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">NIK</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Gambar</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($datamagang as $m) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $m['nik']; ?></td>
                            <td><?= $m['nama']; ?></td>
                            <td><img src="/template/dist/img/<?= $m['gambar']; ?>" class="gambar" alt=""></td>
                            <td><a href="/datamagang/<?= $m['nik']; ?>" class="btn btn-info">Detail</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>