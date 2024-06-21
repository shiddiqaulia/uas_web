<?php 
require '../../koneksi/koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak</title>
</head>
<body>
<?php 
try {
    $sql = "SELECT kode_booking, ktp, nama, no_tlp, tanggal, lama_sewa, total_harga, konfirmasi_pembayaran FROM booking";
    $stmt = $koneksi->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    if (count($results) > 0) {
        echo "<table border='1'>
                <tr>
                    <th>Kode Booking</th>
                    <th>KTP</th>
                    <th>Nama</th>
                    <th>Telepon</th>
                    <th>Tanggal Sewa</th>
                    <th>Lama Sewa</th>
                    <th>Total Harga</th>
                    <th>Status</th>
                </tr>";
        
        foreach ($results as $row) {
            echo "<tr>
                    <td>" . htmlspecialchars($row["kode_booking"]) . "</td>
                    <td>" . htmlspecialchars($row["ktp"]) . "</td>
                    <td>" . htmlspecialchars($row["nama"]) . "</td>
                    <td>" . htmlspecialchars($row["no_tlp"]) . "</td>
                    <td>" . htmlspecialchars($row["tanggal"]) . "</td>
                    <td>" . htmlspecialchars($row["lama_sewa"]) . "</td>
                    <td>" . htmlspecialchars($row["total_harga"]) . "</td>
                    <td>" . htmlspecialchars($row["konfirmasi_pembayaran"]) . "</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
} catch (PDOException $e) {
    echo 'Query failed: ' . $e->getMessage();
}
?>
<script>
    window.print();
</script>
</body>
</html>