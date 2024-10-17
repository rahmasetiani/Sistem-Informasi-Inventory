

<?php
 $id = $_GET['id'];
 $sql2 = $koneksi->query("select * from jenisbarang where id = '$id'");
 $tampil = $sql2->fetch_assoc(); 
 
 
 ?>
 
  <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Ubah Jenis barang</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
							
							
							<div class="body">

							<form method="POST" enctype="multipart/form-data">
							
							<label for="">Jenis Barang</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="jenisbarang" value="<?php echo $tampil['jenisbarang']; ?>" class="form-control" />
	 
							</div>
                            </div>
							
						
							
							<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
							
							</form>
							
							
							
							<?php
							
							if (isset($_POST['simpan'])) {
								
								$jenisbarang= $_POST['jenisbarang'];

								if (empty($jenisbarang) ) {
									echo '<center><div class="alert alert-danger">Harap lengkapi semua data.</div></center>';
								}else{	
								
								
								$sql = $koneksi->query("update jenisbarang set jenisbarang='$jenisbarang' where id='$id'"); 
								
								if ($sql) {
									?>
									    <script type="text/javascript">
										alert("Data Berhasil Diubah");
										window.location.href="?page=jenisbarang";
										</script>
									<?php
								}
                                else {
                                    echo "Gagal memperbarui data jenis barang.";
                                }
							
							}
						}
							
							
							?>
										
										
										
								
								
								
								
								
