<script>
function sum() {
    var stok = document.getElementById('stok').value;
    var jumlahkeluar = document.getElementById('jumlahkeluar').value;
    var result = parseInt(stok) - parseInt(jumlahkeluar);
    if (!isNaN(result)) {
        document.getElementById('total').value = result;
    }
    if (parseInt(jumlahkeluar) <= 0) {
        document.getElementById('error_jumlahkeluar').innerText = 'Jumlah keluar harus lebih besar dari 0.';
    } else {
        document.getElementById('error_jumlahkeluar').innerText = '';
    }
}
</script>

<?php
$koneksi = new mysqli("localhost", "root", "", "inventori");

$id_transaksi = $_GET['id_transaksi'];
$query = "SELECT * FROM barang_keluar WHERE id_transaksi = '$id_transaksi'";
$hasil = $koneksi->query($query);
$data = $hasil->fetch_assoc();

$tanggal_keluar = $data['tanggal'];
$barang = $data['kode_barang'] . '.' . $data['nama_barang'];
$jumlah_keluar = $data['jumlah'];
$keterangan = $data['keterangan'];
$kondisi_barang = $data['kondisibarang'];

// Ambil data stok dari gudang
$pecah_barang = explode(".", $barang);
$kode_barang = $pecah_barang[0];

$sql_gudang = $koneksi->query("SELECT jumlah FROM gudang WHERE kode_barang = '$kode_barang'");
$data_gudang = $sql_gudang->fetch_assoc();
$stok = $data_gudang['jumlah'];
?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Ubah Barang Keluar</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="body">
                    <form method="POST" enctype="multipart/form-data">
                        <label for="">Id Transaksi</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="id_transaksi" class="form-control" id="id_transaksi" value="<?php echo $id_transaksi; ?>" readonly />
                            </div>
                        </div>

                        <label for="">Tanggal Keluar</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="date" name="tanggal_keluar" class="form-control" id="tanggal_keluar" value="<?php echo $tanggal_keluar; ?>" min="<?php echo $tanggal_keluar; ?>" max="<?php echo $tanggal_keluar; ?>" />
                            </div>
                        </div>

                        <label for="">Barang</label>
                        <div class="form-group">
                            <div class="form-line">
                                <select name="barang" id="cmb_barang" class="form-control" />
                                    <option value="">-- Pilih Barang --</option>
                                    <?php
                                    $sql = $koneksi->query("SELECT * FROM gudang ORDER BY kode_barang");
                                    while ($data = $sql->fetch_assoc()) {
                                        $selected = ($barang == $data['kode_barang'] . '.' . $data['nama_barang']) ? 'selected' : '';
                                        echo "<option value='$data[kode_barang].$data[nama_barang]' $selected>$data[kode_barang] | $data[nama_barang]</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <label for="">Jumlah</label>
        <div class="form-group">
            <div class="form-line">
                <input type="text" name="jumlahkeluar" id="jumlahkeluar" onkeyup="sum()" class="form-control" value="<?php echo $jumlah_keluar; ?>" />
            </div>
            <span id="error_jumlahkeluar" style="color: red;"></span>
        </div>

        <label for="total">Total Stok</label>
        <div class="form-group">
            <div class="form-line">
                <input readonly="readonly" name="total" id="total" type="number" class="form-control" value="<?php echo $stok; ?>">
            </div>
        </div>

                        <label for="">Keterangan</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="keterangan" class="form-control" value="<?php echo $keterangan; ?>" />
                            </div>
                        </div>

                        <label for="">Pilih Kondisi Barang</label>
                        <div class="form-group">
                            <div class="form-line">
                                <select name="kondisibarang" id="cmb_kondisibarang" class="form-control" />
                                    <option value="">-- Pilih Kondisi Barang --</option>
                                    <?php
                                    $sql = $koneksi->query("SELECT * FROM kondisibarang ORDER BY kondisibarang");
                                    while ($data = $sql->fetch_assoc()) {
                                        $selected = ($kondisi_barang == $data['kondisibarang']) ? 'selected' : '';
                                        echo "<option value='$data[kondisibarang]' $selected>$data[kondisibarang]</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">

                    </form>

                    <?php
                    if (isset($_POST['simpan'])) {
                        // Proses penyimpanan data yang diubah
                        $id_transaksi = $_POST['id_transaksi'];
                        $tanggal_keluar = $_POST['tanggal_keluar'];
                        $barang = $_POST['barang'];
                        $pecah_barang = explode(".", $barang);
                        $kode_barang = $pecah_barang[0];
                        $nama_barang = $pecah_barang[1];
                        $jumlah_keluar_baru = $_POST['jumlahkeluar'];
                        $keterangan = $_POST['keterangan'];
                        $kondisibarang = $_POST['kondisibarang'];
                        $total = $_POST['total'];
                        $sisa2 = $total;

                        // Validasi jumlah
                        if ($jumlah_keluar <= 0)  {
                            ?>
                            <script type="text/javascript">
                                alert("Jumlah tidak boleh kurang dari 0");
                                window.location.href="?page=barangkeluar&aksi=ubahbarangkeluar&id_transaksi=<?php echo $id_transaksi; ?>";
                            </script>
                            <?php
                            
                        } else {
                              // Update jumlah di gudang
        $sisa_stok = $stok + ($jumlah_keluar - $jumlah_keluar_baru);
        $sql_update_gudang = $koneksi->query("UPDATE gudang SET jumlah = '$sisa_stok' WHERE kode_barang = '$kode_barang'");

        if ($sql_update_gudang) {
            // Proses update data
            $stmtUpdate = $koneksi->prepare("UPDATE barang_keluar SET tanggal = ?, kode_barang = ?, nama_barang = ?, jumlah = ?, keterangan = ?, kondisibarang = ? WHERE id_transaksi = ?");
            $stmtUpdate->bind_param("sssdsss", $tanggal_keluar, $kode_barang, $nama_barang, $jumlah_keluar_baru, $keterangan, $kondisibarang, $id_transaksi);

            $stmtUpdate->execute();

            if ($stmtUpdate->affected_rows > 0) {
                ?>
                <script type="text/javascript">
                    alert("Data Berhasil Diubah");
                    window.location.href="?page=barangkeluar";
                </script>
                <?php
            } else {
                echo "Gagal mengubah data: " . $stmtUpdate->error;
            }

            $stmtUpdate->close();
        } else {
            echo "Gagal mengubah stok di gudang.";
        }
    }
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>
