<?php
$koneksi = new mysqli("localhost", "root", "", "inventori");

// Mencari kode barang terbaru
$query = "SELECT MAX(RIGHT(kode_barang, 3)) AS max_kode FROM gudang";
$hasil = $koneksi->query($query);
$data = $hasil->fetch_assoc();
$urutan = (int) $data['max_kode'];
$urutan++;

// Menghasilkan kode barang baru
$tanggal = date("ym");
$format = "BAR-" . $tanggal . sprintf("%03s", $urutan);

$jumlah = 0;
?>
							




 <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Tambah Stok</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">

							
							<div class="body">
							
							<form method="POST" enctype="multipart/form-data">
							
							<label for="">Kode Barang</label>
                            <div class="form-group">
                               <div class="form-line">
                                  <input type="text" name="kode_barang" class="form-control" id="kode_barang" value="<?php echo $format; ?>" readonly />	 
							</div>
                            </div>
							
						
							
							<label for="">Nama Barang</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="nama_barang" class="form-control" />	 
							</div>
                            </div>
							
						<label for="">Jenis Barang</label>
                            <div class="form-group">
                               <div class="form-line">
                                <select name="jenisbarang" class="form-control" />
								<option value="">-- Pilih Jenis Barang  --</option>
								<?php
								
								$sql = $koneksi -> query("select * from jenisbarang order by id");
								while ($data=$sql->fetch_assoc()) {
									echo "<option value='$data[id].$data[jenisbarang]'>$data[jenisbarang]</option>";
								}
								?>
								</select>
                                     
									 
							</div>
                            </div>
							
							
                            <label for="">Jumlah</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="jumlah" class="form-control" id="jumlah" value="<?php echo $jumlah; ?>" readonly />
                                     
									 
							</div>
                            </div>
                                     
						
							
						
                          
                              
				
							<label for="">Satuan Barang</label>
                            <div class="form-group">
                               <div class="form-line">
                                <select name="satuan" class="form-control" />
								<option value="">-- Pilih Satuan Barang --</option>
								<?php
								
								$sql = $koneksi -> query("select * from satuan order by id");
								while ($data=$sql->fetch_assoc()) {
									echo "<option value='$data[id].$data[satuan]'>$data[satuan]</option>";
								}
								?>
								</select>
                                     
									 
							</div>
                            </div>
							
							<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
							
							</form>
							
							
							
							<?php
							
							if (isset($_POST['simpan'])) {
		
								$kode_barang= $_POST['kode_barang'];
								$nama_barang= $_POST['nama_barang'];					
								$jenisbarang= $_POST['jenisbarang'];
								$pecah_jenis = explode(".", $jenisbarang);
								$id = $pecah_jenis[0];
								$jenisbarang = $pecah_jenis[1];
								$jumlah= $_POST['jumlah'];
								$satuan= $_POST['satuan'];
								$pecah_satuan = explode(".", $satuan);
								$id = $pecah_satuan[0];
								$satuan = $pecah_satuan[1];
								
								if (empty($nama_barang) || empty($jenisbarang) || empty($satuan)) {
									echo '<center><div class="alert alert-danger">Harap lengkapi semua data.</div></center>';
								}else{
								
								$sql = $koneksi->query("insert into gudang (kode_barang, nama_barang, jenisbarang, jumlah, satuan ) values('$kode_barang','$nama_barang','$jenisbarang','$jumlah','$satuan')");
								
								if ($sql) {
									?>
									
										<script type="text/javascript">
										alert("Data Berhasil Disimpan");
										window.location.href="?page=gudang";
										</script>
										
										<?php
								}
								}
							}
							
							
							?>
										
										
										
								
								
								
								
								
