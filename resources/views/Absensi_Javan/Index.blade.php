@extends('Absensi_Javan.App')
@section('konten')
<div class="col-lg-12 col-md-12 col-xs-12">
	<table class="table table-hover">
		<tr>
			<th>Nama</th>
			<th>NIK</th>
			<th>Jam Masuk</th>
			<th>Jam Keluar</th>
			<th>Durasi Kerja</th>
			<th>Status</th>
		</tr>
	@foreach($show as $shows)
	<?php 
			$jam_masuk_absensi = $shows->absensi_masuk; 
			$jam_masuknya_absensi = strtotime($jam_masuk_absensi);
			$ow = date('H:i:s', $jam_masuknya_absensi);

			
			if ($ow == '07:00:00' Or $ow == '00:00:00') {
				$jammasukreal = '';

			}else{
				$jammasukreal = $ow;
			}
			$jam_keluar = $shows->absensi_keluar;
				$jam_keluarnya = strtotime($jam_keluar);
			$jammm_keluar = date('H:i:s', $jam_keluarnya);
			if ($jammm_keluar == '07:00:00' Or $jammm_keluar == '00:00:00') {
				$jamkeluar = '';
			}else{
				$jamkeluar = $jammm_keluar;
			}
			date_default_timezone_set('Asia/Jakarta'); 

			$kini = new DateTime('now');
			$jam_masuk = $shows->absensi_masuk;
			$jammasuk = new DateTime($jam_masuk);
			$durasikerja = $jammasuk->diff($kini)->format('%H:%I:%s');
			if ($durasikerja == '00:00:0') {
				$durasireal = '';
			}else{
				$durasireal = $durasikerja;
			}
			

	?>
	<tr>
		<td></td>
		<td>{{ $shows->absensi_pin }}</td>
		<td><?php echo $jammasukreal; ?></td>
		<td><?php echo $jamkeluar; ?></td>
		<td><?php echo $durasireal; ?></td>
		<td><?php ?></td>
	</tr>
	@endforeach
	</table>
</div>

@stop