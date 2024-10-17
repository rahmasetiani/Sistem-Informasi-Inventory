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

// Mencari kode barang terbaru
$query = "SELECT MAX(RIGHT(id_transaksi, 3)) AS max_kode FROM barang_keluar";
$hasil = $koneksi->query($query);
$data = $hasil->fetch_assoc();
$urutan = (int) $data['max_kode'];
$urutan++;

// Menghasilkan kode barang baru
$tanggal = date("ymd");
$format = "TRK-" . $tanggal . sprintf("%03s", $urutan);

$jumlah = 0;

  
  
$tanggal_keluar = date("Y-m-d");


?>
  
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Barang Keluar</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="body">
                    <form method="POST" enctype="multipart/form-data">
                        <label for="">Id Transaksi</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="id_transaksi" class="form-control" id="id_transaksi" value="<?php echo $format; ?>" readonly />
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
                                    <option value="">-- Pilih Barang  --</option>
                                    <?php
                                    $sql = $koneksi->query("select * from gudang order by kode_barang");
                                    while ($data = $sql->fetch_assoc()) {
                                        echo "<option value='$data[kode_barang].$data[nama_barang]'>$data[kode_barang] | $data[nama_barang]</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="tampung"></div>
                        
                        <label for="">Jumlah</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="jumlahkeluar" id="jumlahkeluar" onkeyup="sum()" class="form-control" />
                            </div>
                                <span id="error_jumlahkeluar" style="color: red;"></span>
                        </div>
                        
                        <label for="total">Total Stok</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input readonly="readonly" name="total" id="total" type="number" class="form-control">
                            </div>
                        </div>
                        <div class="tampung1"></div>

                        <label for="">Keterangan</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="keterangan" class="form-control" />
                            </div>
                        </div>

                        <label for="">Pilih  Kondisi Barang</label>
                        <div class="form-group">
                            <div class="form-line">
                                <select name="kondisibarang" id="cmb_kondisibarang" class="form-control" />
                                    <option value="">-- Pilih Kondisi Barang  --</option>
                                    <?php
                                    $sql = $koneksi->query("select * from kondisibarang order by kondisibarang");
                                    while ($data = $sql->fetch_assoc()) {
                                        echo "<option value='$data[kondisibarang]'>$data[kondisibarang] </option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="tampung3"></div>
                        
                        
                        <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                    </form>
                    <?php
                  
                   if (isset($_POST['simpan'])) {
                    $id_transaksi = $_POST['id_transaksi'];
                    $tanggal = $_POST['tanggal_keluar'];
                    $barang = $_POST['barang'];
                    $pecah_barang = explode(".", $barang);
                    $kode_barang = $pecah_barang[0];
                    $nama_barang = $pecah_barang[1];
                    $jumlah = $_POST['jumlahkeluar'];
                    $satuan = $_POST['satuan'];
                    $keterangan = $_POST['keterangan'];
                    $kondisibarang = $_POST['kondisibarang'];
                    $total = $_POST['total'];
                    $sisa2 = $total;

                    if ($jumlah <= 0)  {
                        ?>
                        <script type="text/javascript">
                            alert("Jumlah tidak boleh kurang dari 0");
                            window.location.href="?page=barangkeluar&aksi=tambahbarangkeluar";
                        </script>
                        <?php
                    }else {                
                
                    // Validasi jumlah
                    
                        // Periksa apakah stok cukup sebelum melakukan pengurangan
                        if ($sisa2 >= 0) {
							// Gunakan prepared statements untuk menghindari SQL Injection
							$stmtInsert = $koneksi->prepare("INSERT INTO barang_keluar (id_transaksi, tanggal, kode_barang, nama_barang, jumlah, satuan, keterangan, kondisibarang) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
                            $stmtInsert->bind_param("ssssdsss", $id_transaksi, $tanggal, $kode_barang, $nama_barang, $jumlah, $satuan, $keterangan, $kondisibarang);

					
							$stmtUpdate = $koneksi->prepare("UPDATE gudang SET jumlah = ? WHERE kode_barang = ?");
							$stmtUpdate->bind_param("ds", $sisa2, $kode_barang);

                            // Jalankan query INSERT
                            if ($stmtInsert->execute()) {
                                // Jalankan query UPDATE
                                if ($stmtUpdate->execute()) {
                                    ?>
                                    <script type="text/javascript">
                                        alert("Simpan Data Berhasil");
                                        window.location.href="?page=barangkeluar";
                                    </script>
                                    <?php
                                } else {
                                    echo "Error dalam melakukan pengurangan stok: " . $stmtUpdate->error;
                                }
                            } else {
                                echo "Error dalam menyimpan data keluar: " . $stmtInsert->error;
                            }
                
                            // Tutup statement
                            $stmtInsert->close();
                            $stmtUpdate->close();
                        
                        } else {
                            ?>
                            <script type="text/javascript">
                                alert("Stok Barang Habis, Transaksi Tidak Dapat Dilakukan");
                                window.location.href="?page=barangkeluar&aksi=tambahbarangkeluar";
                            </script>
                            <?php
                        }
                    }
                }
                
                
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
