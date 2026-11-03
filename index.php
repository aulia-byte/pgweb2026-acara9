<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rumahsakit_mlg";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$sql = "SELECT * FROM rumahsakit";
$result = $conn->query($sql);

echo "<h2>Sebaran Rumah Sakit Kota Malang</h2>";
echo "<a href='input/index.html'>+ Input Data Rumah Sakit Baru</a><br><br>";

if ($result->num_rows > 0) {
    echo "<table border='1' cellpadding='8' cellspacing='0'>
    <tr bgcolor='#CCCCCC'>
        <th>ID</th>
        <th>Nama Rumah Sakit</th>
        <th>Jenis</th>
        <th>Alamat</th>
        <th>Kecamatan</th>
        <th>Latitude</th>
        <th>Longitude</th>
        <th colspan='2'>Aksi</th>
    </tr>";
    
    while($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>" . $row["id"] . "</td>
            <td>" . $row["nama"] . "</td>
            <td>" . $row["jenis"] . "</td>
            <td>" . $row["alamat"] . "</td>
            <td>" . $row["kec"] . "</td>
            <td>" . $row["latitude"] . "</td>
            <td>" . $row["longitude"] . "</td>
            <td><a href='delete.php?id=" . $row["id"] . "' onclick=\"return confirm('Apakah Anda yakin ingin menghapus data ini?')\">Hapus</a></td>
            <td><a href='edit/index.php?id=" . $row["id"] . "'>Edit</a></td>
        </tr>";
    }
    echo "</table>";
} else {
    echo "Belum ada data rumah sakit.";
}

$conn->close();
?>