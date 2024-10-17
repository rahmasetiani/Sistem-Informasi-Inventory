

<?php
 $id = $_GET['id'];
 $sql2 = $koneksi->query("select * from kondisibarang where id = '$id'");
 $tampil = $sql2->fetch_assoc(); 
 
 
 ?>
 
  <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Ubah Kondisi Barang Keluar</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
							
							
							<div class="body">

							<form method="POST" enctype="multipart/form-data">
							
							<label for="">Kondisi Barang Keluar</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="kondisibarang" value="<?php echo $tampil['kondisibarang']; ?>" class="form-control" />
	 
							</div>
                            </div>
							
						
							
							<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
							
							</form>
							
							
							
							<?php
							
							if (isset($_POST['simpan'])) {
								
								$kondisibarang= $_POST['kondisibarang'];

								if (empty($kondisibarang) ) {
									echo '<center><div class="alert alert-danger">Harap lengkapi semua data.</div></center>';
								}else{	
								
								
								$sql = $koneksi->query("update kondisibarang set kondisibarang='$kondisibarang' where id='$id'"); 
								
								if ($sql) {
									?>
									    <script type="text/javascript">
										alert("Data Berhasil Diubah");
										window.location.href="?page=kondisibarang";
										</script>
									<?php
								}
                                else {
                                    echo "Gagal memperbarui data jenis barang.";
                                }
							
							}
						}
							
							
							?>
										
										
										
								
								
								
								
								
