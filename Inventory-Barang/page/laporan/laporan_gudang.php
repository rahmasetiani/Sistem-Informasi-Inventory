



<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Stok Gudang</h6>
            </div>
            <div class="card-body">

            <div style="position: absolute; top: 8px; right: 8px;">
    <a href="page/laporan/export_laporan_gudang_excel.php" class="btn btn-primary"><i class="fa fa-print"></i> ExportToExcel</a>
</div>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                                        <tr>
											<th>No</th>
											<th>Kode Barang</th>
											<th>Nama Barang</th>											
											<th>Jenis Barang</th>
											
											<th>Jumlah Barang</th>
											<th>Satuan</th>
										
                                         
                                        </tr>
										</thead>
										
               
                  <tbody>
                    <?php 
									
									$no = 1;
									$sql = $koneksi->query("select * from gudang");
									while ($data = $sql->fetch_assoc()) {
										
									?>
									
                                        <tr>
                                            <td><?php echo $no++; ?></td>
											<td><?php echo $data['kode_barang'] ?></td>
											<td><?php echo $data['nama_barang'] ?></td>
											<td><?php echo $data['jenisbarang'] ?></td>
											
											<td><?php echo $data['jumlah'] ?></td>
											<td><?php echo $data['satuan'] ?></td>
								

								

										
                                        </tr>
									<?php }?>

										 
                </table>
              </div>
            </div>
          </div>

        </div>












