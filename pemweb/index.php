<?php
require_once 'Grade.php';
require_once 'db.php';

class Read
{
    public static function get_contacts($conn)
    {
        // Prepare the SQL statement to get all records from our contacts table
        $result = $conn->query('SELECT * FROM nilai');

        $posts = [];
        while ($row = $result->fetch_assoc()) {
            $posts[] = $row;
        }

        return $posts;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $partisipasi = $_POST['partisipasi'];
    $tugas = $_POST['tugas'];
    $uts = $_POST['uts'];
    $uas = $_POST['uas'];

    $grade = new Grade($partisipasi, $tugas, $uts, $uas);
    $na = $grade->calculateNA();
    $gradeLetter = $grade->convertToGrade($na);

    // Simpan ke database
    $stmt = $conn->prepare("INSERT INTO nilai (partisipasi,tugas,uts,uas, nilai_akhir, grade) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ddddds", $partisipasi, $tugas, $uts, $uas, $na, $gradeLetter);
    $stmt->execute();
}

$posts = Read::get_contacts($conn);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ridwan Tugas Pemweb PHP Native</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">

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
                                    <form action="index.php" method="post" class="d-flex flex-column align-items-center gap-2 p-2 rounded-2 bg-black">
                                            <h1>Tambahkan Nilai</h1>
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th scope="col" class="text-center">Nilai Partisipasi</th>
                                                        <th scope="col" class="text-center">Nilai Tugas</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><input type="text" name="partisipasi" class="form-control" placeholder="Nilai Partisipasi"></td>
                                                        <td><input type="text" name="tugas" class="form-control" placeholder="Nilai Tugas"></td> 
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
                                                        
                                                        <td><input type="text" name="uts" class="form-control" placeholder="Nilai UTS"></td>
                                                        <td><input type="text" name="uas" class="form-control" placeholder="Nilai UAS"></td>
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
                                                        <td class="text-center"><?= $post['partisipasi'] ?></td>
                                                        <td class="text-center"><?= $post['tugas'] ?></td>
                                                        <td class="text-center"><?= $post['uts'] ?></td>
                                                        <td class="text-center"><?= $post['uas'] ?></td>
                                                        <td class="text-center"><?= $post['nilai_akhir'] ?></td>
                                                        <td class="text-center"><?= $post['grade'] ?></td>
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