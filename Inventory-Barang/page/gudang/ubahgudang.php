

<?php
 $kode_barang = $_GET['kode_barang'];
 $sql2 = $koneksi->query("select * from gudang where kode_barang = '$kode_barang'");
 $tampil = $sql2->fetch_assoc();
 
 $level = $tampil['level'];

 
 
 
 ?>
 
  <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Ubah Gudang</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
							
							
							<div class="body">

							<form method="POST" enctype="multipart/form-data">
							
							<label for="">Kode Barang</label>
                            <div class="form-group">
                               <div class="form-line">
                                  <input type="text" name="kode_barang" class="form-control" id="kode_barang" value="<?php echo $tampil['kode_barang']; ?>" readonly />	 
							</div>
                            </div>
							
								
							<label for="">Nama Barang</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="nama_barang" value="<?php echo $tampil['nama_barang']; ?>" class="form-control" /> 	 
							</div>
                            </div>
				
							
							
						<label for="">Jenis Barang</label>
                            <div class="form-group">
                               <div class="form-line">
                                <select name="jenisbarang" value="<?php echo $tampil['jenisbarang'];?>" class="form-control" />
								
								<?php
								
								$sql = $koneksi -> query("select * from jenisbarang order by id");
								while ($data=$sql->fetch_assoc()) {
									echo "<option value='$data[id].$data[jenisbarang]'>$data[jenisbarang]</option>";
								}
								?>
								</select>
                                     
									 
							</div>
                            </div>

							<label for="">Jumlah Barang</label>
							<div class="form-group">
								<div class="form-line">
									<input type="number" name="jumlah" value="<?php echo $tampil['jumlah']; ?>" class="form-control" />
								</div>
							</div>
							
			
							<label for="">Satuan Barang</label>
                            <div class="form-group">
                               <div class="form-line">
                                <select name="satuan" value="<?php echo $tampil['satuan'];?>" class="form-control" />
								
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
								

								$sql = $koneksi->query("update gudang set kode_barang='$kode_barang', nama_barang='$nama_barang', jenisbarang='$jenisbarang', jumlah='$jumlah', satuan='$satuan' where kode_barang='$kode_barang'"); 
								
								if ($sql2) {
									?>
									
										<script type="text/javascript">
										alert("Data Berhasil Diubah");
										window.location.href="?page=gudang";
										</script>
										
										<?php
								}
							}
						}
							?>
										
										
										
										
								
								
								
								
								
