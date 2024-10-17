<?php

	$koneksi = new mysqli("localhost","root","","inventori");

	
	
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Laporan_Data_Kondisi (".date('d-m-Y').").xls");

?>	

<h2>Laporan Data Kondisi Barang Keluar</h2>

<table border="1">
	<tr>
            <th>No</th>
            <th>Id Transaksi</th>
            <th>Tanggal Keluar</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Jumlah Keluar</th>
            <th>Satuan</th>
            <th>Kondisi Barang</th>
            <th>Keterangan</th>

											
	</tr>
	
	<?php
		$no = 1;
		$sql = $koneksi->query("select * from datakondisi");
		while ($data = $sql->fetch_assoc()) {	
	
		
	
	
	
	?>
	
	<tr>
		   <td><?php echo $no++; ?></td>
           <td><?php echo $data['id_transaksi'] ?></td>
            <td><?php echo $data['tanggal'] ?></td>
            <td><?php echo $data['kode_barang'] ?></td>
            <td><?php echo $data['nama_barang'] ?></td>
            <td><?php echo $data['jumlah'] ?></td>
            <td><?php echo $data['satuan'] ?></td>
            <td style="text-align: center;">
                <button class="btn btn-danger btn-sm"><?php echo $data['kondisibarang'] ?></button>
            </td>
            <td><?php echo $data['keterangan'] ?></td>
	</tr>
	
	
	
	
	<?php
	
	}
	
	?>
	
	</table>