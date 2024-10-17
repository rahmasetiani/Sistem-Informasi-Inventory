  <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Tambah Jenis Barang</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
							
							
							<div class="body">
							
							<form method="POST" enctype="multipart/form-data">
							

							<label for="">Jenis Barang</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="jenisbarang" class="form-control" />	 
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
					
								$sql = $koneksi->query("insert into jenisbarang (jenisbarang) values('$jenisbarang')");
								
								if ($sql) {
									?>
									
										<script type="text/javascript">
										alert("Data Berhasil Disimpan");
										window.location.href="?page=jenisbarang";
										</script>
										
										<?php
								}
								}
							}
							
							
							?>
										
										
										
								
								
								
								
								
