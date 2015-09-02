<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Kehadiran <?php echo $nama; ?></title>
	<!-- FA -->
	<link rel="stylesheet" type="text/css" href="{{ asset('font-awesome-4.4.0/css/font-awesome.min.css') }}">

	<!-- fav icon -->
	<link rel="SHORTCUt ICON" href="{{ asset('image/javan.png') }}" type="x/icons" />

	<!-- bootstrap -->
	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
	<script src="{{ asset('js/jquery.js') }}"></script>

	<!-- bootstrap select plugin -->
	<link rel="stylesheet" href=" {{ asset('css/bootstrap-select.css') }}">
	<script src="{{ asset('js/bootstrap-select.js') }}"></script>
	

</head>
<body>
<div class="container">
	<div class="row">
	<?php if ($month=='01') {
		$Bulan = 'Januari';
		}elseif ($month=='02') {
			$Bulan = 'Februari';
		}elseif ($month=='03') {
			$Bulan = 'Maret';
		}elseif ($month=='04') {
			$Bulan = 'April';
		}elseif ($month=='05') {
			$Bulan = 'Mei';
		}elseif ($month=='06') {
			$Bulan = 'Juni';
		}elseif ($month=='07') {
			$Bulan = 'Juli';
		}elseif ($month=='08') {
			$Bulan = 'Agustus';
		}elseif ($month=='09') {
			$Bulan = 'September';
		}elseif ($month=='10') {
			$Bulan = 'Oktober';
		}elseif ($month=='11') {
			$Bulan = 'November';
		}elseif ($month=='12') {
			$Bulan = 'Desember';
		} 
		?>
	<h2>{{$Bulan}} - {{$year}}</h2>
    <ol class="breadcrumb">
      <li><a href="{{ url('/index') }}">Home</a></li>
      <li class="active">History</li>
    </ol>
	<div class="col-sm-12 col-md-12">
		{!! Form::open(['url'=>['historyabsenperbulan', $id], 'method'=>'POST']) !!}
			<br>
			<div class="col-sm-12 col-md-12">
				<!-- dropdown bulan -->
				<label>Bulan</label>
				<select class="selectpicker show-tick" name="bulan">
					<option value="01" <?php if ($month == '01') {echo 'selected="selected"';} ?> >Januari</option>
					<option value="02" <?php if ($month == '02') {echo 'selected="selected"';} ?> >Februari</option>
					<option value="03" <?php if ($month == '03') {echo 'selected="selected"';} ?> >Maret</option>
					<option value="04" <?php if ($month == '04') {echo 'selected="selected"';} ?> >April</option>
					<option value="05" <?php if ($month == '05') {echo 'selected="selected"';} ?> >Mei</option>
					<option value="06" <?php if ($month == '06') {echo 'selected="selected"';} ?> >Juni</option>
					<option value="07" <?php if ($month == '07') {echo 'selected="selected"';} ?> >Juli</option>
					<option value="08" <?php if ($month == '08') {echo 'selected="selected"';} ?> >Agustus</option>
					<option value="09" <?php if ($month == '09') {echo 'selected="selected"';} ?> >September</option>
					<option value="10" <?php if ($month == '10') {echo 'selected="selected"';} ?> >Oktober</option>
					<option value="11" <?php if ($month == '11') {echo 'selected="selected"';} ?> >November</option>
					<option value="12" <?php if ($month == '12') {echo 'selected="selected"';} ?> >Desember</option>
				</select>
				<!-- dropdown tahun -->
				&nbsp;&nbsp;&nbsp;<label>Tahun</label>
				<select class="selectpicker show-tick" name="tahun">
				@for($tahun=2015;$tahun<=2100;$tahun++)
					<option value="{{ $tahun }}" <?php if ($tahun == $year) {echo 'selected="selected"';} ?> >{{ $tahun }}</option>
				@endfor
				</select>
 
				&nbsp;&nbsp;&nbsp;<input type="submit" class="btn btn-success" value="Lihat"/>

			</div>

			

		{!! Form::close() !!}<!-- end form -->
	</div><!-- col -->
	
	
	<div class="col-sm-12 col-md-12"><br>
	
		<div class="table-responsive">
		<table class="table table-condensed" width="647">
		    <thead>
		    <tr>
			    <th>Tanggal</th>
			    <th>Masuk</th>
			    <th>Keluar</th>
			    <th>Durasi Kerja</th>
			    <th>Status</th>
			    <th>Keterangan</th>
		    </tr>
		    </thead>
		    <tbody>
		@foreach($show as $shows)
		<!-- condition -->
		<?php
		date_default_timezone_set('Asia/Jakarta'); 
			$jam_masuk_absensi = $shows->absensi_masuk; 
			$jam_masuknya_absensi = strtotime($jam_masuk_absensi);
			$ow = date('H:i:s', $jam_masuknya_absensi);

			
			if ($ow == '07:00:00' Or $ow == '00:00:00') {
				$jammasukreal = '';

			}else{
				$jammasukreal = $ow;
			}
			$jam_keluar = $shows->absensi_keluar;
			$jammkeluar = new DateTime($jam_keluar);
				$jam_keluarnya = strtotime($jam_keluar);
			$jammm_keluar = date('H:i:s', $jam_keluarnya);
			if ($jammm_keluar == '07:00:00' Or $jammm_keluar == '00:00:00') {
				$jamkeluar = '';
			}else{
				$jamkeluar = $jammm_keluar;
			}
		$jam_masuk = $shows->absensi_masuk;
			$jammasuk = new DateTime($jam_masuk);
		$jam_keluar = $shows->absensi_keluar;
			$jammkeluar = new DateTime($jam_keluar);
		$jamkerja = $jammasuk->diff($jammkeluar)->format('%H:%I');

		$izin = $shows->absensi_izin;
		?>
		<!-- batas -->
		
		@if($jamkerja == '00:00' AND $jammasukreal == null AND $jamkeluar == null AND $izin == null)
			<tr class="warning">
			    <td>{{ $shows->absensi_tanggal }}</td>
			    <td><?php echo $jammasukreal; ?></td>
			    <td><?php echo $jamkeluar; ?></td>
			    <td>{{$jamkerja}}</td>
			    <td>Tidak Hadir</td>
			    <td>@if($jamkerja == '00.00')
					<div class="label label-success"></div>
			    	@endif

							@if($jammasukreal==null)
							<div class="label label-success"></div>
							@elseif($jammasukreal > '08.00')
					    	<div class="label label-danger">Datang Terlambat</div>
							@elseif($jammasukreal < '08.00')
					    	<div class="label label-success">Datang Tepat Waktu</div>
							@endif
									@if($jamkeluar==null)
									<div class="label label-success"></div>
									@endif

					@if($jamkerja >= 9)
					<div class="label label-success">Jam Kerja Cukup</div>
					@elseif($jamkerja < 9 AND $jamkeluar != null)
					<div class="label label-danger">Pulang Cepat</div>
					@endif</td>
		    </tr>
		    @elseif($izin != null)
		    <tr class="info">
			    <td>{{ $shows->absensi_tanggal }}</td>
			    <td><?php echo $jam_masuk; ?></td>
			    <td><?php echo $jam_keluar; ?></td>
			    <td>{{$jamkerja}}</td>
			    <td><?php echo $izin; ?></td>
			    <td>-</td>
		    </tr>
		    @elseif($jamkerja < 9)
			<tr class="danger">
			    <td>{{ $shows->absensi_tanggal }}</td>
			    <td><?php echo $jammasukreal; ?></td>
			    <td><?php echo $jamkeluar; ?></td>
			    <td>{{$jamkerja}}</td>
			    <td>Hadir</td>
			    <td>@if($jamkerja == '00.00')
					<div class="label label-success"></div>
			    	@endif

							@if($jammasukreal==null)
							<div class="label label-success"></div>
							@elseif($jammasukreal > '08.00')
					    	<div class="label label-danger">Datang Terlambat</div>
							@elseif($jammasukreal < '08.00')
					    	<div class="label label-success">Datang Tepat Waktu</div>
							@endif
									@if($jamkeluar==null)
									<div class="label label-success"></div>
									@endif

					@if($jamkerja >= 9)
					<div class="label label-success">Jam Kerja Cukup</div>
					@elseif($jamkerja < 9 AND $jamkeluar != null)
					<div class="label label-danger">Pulang Cepat</div>
					@endif</td>
		    </tr>
		    @elseif($jamkerja >= 9)
			<tr>
			    <td>{{ $shows->absensi_tanggal }}</td>
			    <td><?php echo $jammasukreal; ?></td>
			    <td><?php echo $jamkeluar; ?></td>
			    <td>{{$jamkerja}}</td>
			    <td>Hadir</td>
			    <td>@if($jamkerja == '00.00')
					<div class="label label-success"></div>
			    	@endif

							@if($jammasukreal==null)
							<div class="label label-success"></div>
							@elseif($jammasukreal > '08.00')
					    	<div class="label label-danger">Datang Terlambat</div>
							@elseif($jammasukreal < '08.00')
					    	<div class="label label-success">Datang Tepat Waktu</div>
							@endif
									@if($jamkeluar==null)
									<div class="label label-success"></div>
									@endif

					@if($jamkerja >= 9)
					<div class="label label-success">Jam Kerja Cukup</div>
					@elseif($jamkerja < 9 AND $jamkeluar != null)
					<div class="label label-danger">Pulang Cepat</div>
					@endif</td>
		    </tr>
		    @endif
		    
		    
			@endforeach
		    
		    </tbody>
		</table>
		</div><!-- table responsive-->
	</div><!-- col -->

	</div><!-- row -->
</div><!-- container -->


<!-- all script -->
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>

</body>
</html>