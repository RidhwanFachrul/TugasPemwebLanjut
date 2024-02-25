<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ridwan Tugas Pemweb PHP Native</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <br>
    <h3 class="text-center">Form Nilai Transkip Mahasiswa</h3> 
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="partisipasi">Nilai Partisipasi</label>
                        <input type="number" step="0.01" class="form-control" id="partisipasi" name="partisipasi" required>
                    </div>
                    <div class="form-group">
                        <label for="tugas">Nilai Tugas</label>
                        <input type="number" step="0.01" class="form-control" id="tugas" name="tugas" value="<?php echo isset($_POST['tugas']) ? $_POST['tugas'] : ''; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="uts">Nilai UTS</label>
                        <input type="number" step="0.01" class="form-control" id="uts" name="uts" value="<?php echo isset($_POST['uts']) ? $_POST['uts'] : ''; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="uas">Nilai UAS</label>
                        <input type="number" step="0.01" class="form-control" id="uas" name="uas" value="<?php echo isset($_POST['uas']) ? $_POST['uas'] : ''; ?>" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Hitung</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <br>
    <h3 class="text-center">Laporan Nilai Transkip Mahasiswa</h3> 
    <br>
    <?php
    require_once 'Grade.php';
    require_once 'db.php';

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

        // Ambil data dari database
        $result = $conn->query("SELECT * FROM nilai");

        // Tampilkan semua data
        echo "<table>
                <tr>
                    <th>Partisipasi</th>
                    <th>Tugas</th>
                    <th>UTS</th>
                    <th>UAS</th>
                    <th>Nilai Akhir</th>
                    <th>Nilai Huruf</th>
                </tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row['partisipasi'] . "</td>
                    <td>" . $row['tugas'] . "</td>
                    <td>" . $row['uts'] . "</td>
                    <td>" . $row['uas'] . "</td>
                    <td>" . $row['nilai_akhir'] . "</td>
                    <td>" . $row['grade'] . "</td>
                  </tr>";
        }
        echo "</table>";

    }
    ?>
</body>
</html>