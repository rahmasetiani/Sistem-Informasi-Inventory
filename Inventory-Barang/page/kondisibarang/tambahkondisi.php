  <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Tambah Kondisi Barang Keluar</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
							
							
							<div class="body">
							
							<form method="POST" enctype="multipart/form-data">
							

							<label for="">Kondisi Barang Keluar</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="kondisibarang" class="form-control" />	 
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
					
								$sql = $koneksi->query("insert into kondisibarang (kondisibarang) values('$kondisibarang')");
								
								if ($sql) {
									?>
									
										<script type="text/javascript">
										alert("Data Berhasil Disimpan");
										window.location.href="?page=kondisibarang";
										</script>
										
										<?php
								}
								}
							}
							
							
							?>
										
										
										
								
								
								
								
								
