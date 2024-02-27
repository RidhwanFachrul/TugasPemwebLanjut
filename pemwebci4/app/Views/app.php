<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Konversi Nilai Mahasiswa</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url('css/app.css'); ?>">

</head>

<body>
    <section class="intro">
        <div class="bg-image h-100" style="background-image: url('https://mdbootstrap.com/img/Photos/new-templates/tables/img2.jpg');">
            <div class="mask d-flex align-items-center h-100" style="background-color: rgba(0,0,0,.25);">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="card bg-dark shadow-2-strong">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <br>
                                        <form action="<?= route_to('app.store') ?>" method="post" class="d-flex flex-column align-items-center gap-2 p-2 rounded-2 bg-black">

                                            <h1>Tambahkan Nilai</h1>
                                            <?= csrf_field() ?>
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th scope="col" class="text-center">Nilai Partisipasi</th>
                                                        <th scope="col" class="text-center">Nilai Tugas</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><input type="text" name="nilai_partisipasi" class="form-control" placeholder="Nilai Partisipasi"></td>
                                                        <td><input type="text" name="nilai_tugas" class="form-control" placeholder="Nilai Tugas"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <table>
                                                <thead>
                                                    <tr>

                                                        <th scope="col" class="text-center">Nilai UTS</th>
                                                        <th scope="col" class="text-center">Nilai UAS</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>

                                                        <td><input type="text" name="nilai_uts" class="form-control" placeholder="Nilai UTS"></td>
                                                        <td><input type="text" name="nilai_uas" class="form-control" placeholder="Nilai UAS"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <br>
                                            <button class="btn btn-primary px-5" type="submit">Hitung</button>
                                        </form>
                                        <table class="table table-dark table-borderless mb-0">
                                            <thead>
                                                <h1 class="text-center">Daftar Nilai Transkrip Mahasiswa</h1>
                                                <tr class="text-center">
                                                    <th scope="col">PARTISIPASI</th>
                                                    <th scope="col">TUGAS</th>
                                                    <th scope="col">UTS</th>
                                                    <th scope="col">UAS</th>
                                                    <th scope="col">NILAI ANGKA</th>
                                                    <th scope="col">NILAI HURUF</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($posts as $post) : ?>
                                                    <tr>
                                                        <td class="text-center"><?= $post['nilai_partisipasi'] ?></td>
                                                        <td class="text-center"><?= $post['nilai_tugas'] ?></td>
                                                        <td class="text-center"><?= $post['nilai_uts'] ?></td>
                                                        <td class="text-center"><?= $post['nilai_uas'] ?></td>
                                                        <td class="text-center"><?= $post['na'] ?></td>
                                                        <td class="text-center"><?= $post['nh'] ?></td>
                                                    </tr>
                                                <?php endforeach ?>
                                                </tr>

                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>