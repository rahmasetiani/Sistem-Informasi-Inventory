

<?php
$koneksi = new mysqli("localhost", "root", "", "inventori");

// Mencari kode supplier terbaru
$query = "SELECT MAX(RIGHT(kode_supplier, 3)) AS max_kode FROM tb_supplier";
$hasil = $koneksi->query($query);
$data = $hasil->fetch_assoc();
$urutan = (int) $data['max_kode'];
$urutan++;

// Menghasilkan kode supplier baru
$tanggal = date("ym");
$format = "SUP-" . $tanggal . sprintf("%03s", $urutan);

$jumlah = 0;
?>
							



  <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Tambah Supplier</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
							
							
							<div class="body">
							
							<form method="POST" enctype="multipart/form-data">
							
							<label for="">Kode Supplier</label>
                            <div class="form-group">
                               <div class="form-line">
                             <input type="text" name="kode_supplier" class="form-control" id="kode_supplier" value="<?php echo $format; ?>" readonly />
							</div>
                            </div>
							
						
							
							<label for="">Nama Supplier</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="nama_supplier" class="form-control" />	 
							</div>
                            </div>
							
					
							<label for="">Alamat</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="alamat" class="form-control" />
                          	 
								</div>
                            </div>
					
							
							<label for="">Telepon</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="number" name="telepon" class="form-control" />	 
							</div>
                            </div>
							
							
						
								<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
							
							</form>
						
							
							
							
							<?php
							
							if (isset($_POST['simpan'])) {
								$kode_supplier= $_POST['kode_supplier'];
								$nama_supplier= $_POST['nama_supplier'];
								$alamat= $_POST['alamat'];
								
								$telepon= $_POST['telepon'];

								if (empty($nama_supplier) || empty($alamat) || empty($telepon)) {
									echo '<center><div class="alert alert-danger">Harap lengkapi semua data.</div></center>';
								}else{
								
			
								
								$sql = $koneksi->query("insert into tb_supplier (kode_supplier, nama_supplier, alamat, telepon) values('$kode_supplier','$nama_supplier','$alamat','$telepon')");
								
								if ($sql) {
									?>
									
										<script type="text/javascript">
										alert("Data Berhasil Disimpan");
										window.location.href="?page=supplier";
										</script>
										
										<?php
								}
								}
							}
							
							?>
										
										
										
								
								
								
								
								
