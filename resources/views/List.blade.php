<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Kehadiran $name</title>
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
	<div class="col-sm-12 col-md-12">
		<form action="#" method="POST">
			<br>
			<div class="col-sm-12 col-md-12">
				<!-- dropdown bulan -->
				<label>Bulan</label>
				<select class="selectpicker show-tick">
					<option name="januari">Januari</option>
					<option name="januari">Januari2</option>
					<option name="januari">Januari3</option>
					<option name="januari">Januari4</option>
					<option name="januari">Januari5</option>
				</select>
				<!-- dropdown tahun -->
				&nbsp;&nbsp;&nbsp;<label>Bulan</label>
				<select class="selectpicker show-tick">
				@for($tahun=2010;$tahun<=2020;$tahun++)
					<option name="{{ $tahun }}">{{ $tahun }}</option>
				@endfor
				</select>

				&nbsp;&nbsp;&nbsp;<input type="submit" class="btn btn-success" value="Lihat"/>
			</div>

			

		</form><!-- end form -->
	</div><!-- col -->
	
	
	<div class="col-sm-12 col-md-12"><br>
		<!-- condition -->
		<?php
		$jamkerja = '08.00';
		?>
		<!-- batas -->

		<div class="table-responsive">
		<table class="table table-condensed" width="647">
		    <thead>
		    <tr>
			    <th>Tanggal</th>
			    <th>Masuk</th>
			    <th>Keluar</th>
			    <th>Jam Kerja</th>
			    <th>Status</th>
			    <th>Keterangan</th>
		    </tr>
		    </thead>
		    <tbody>

		    @if($jamkerja < 9)
			<tr class="danger">
			    <td>1</td>
			    <td>07.00</td>
			    <td>17.00</td>
			    <td>{{$jamkerja}}</td>
			    <td>Hadir</td>
			    <td>-</td>
		    </tr>
		    @elseif($jamkerja >= 9)
			<tr>
			    <td>1</td>
			    <td>07.00</td>
			    <td>17.00</td>
			    <td>{{$jamkerja}}</td>
			    <td>Hadir</td>
			    <td>-</td>
		    </tr>
		    @endif

		    <tr>
		    <td></td>
		    <td colspan="5" align="center"></td>
		    </tr>
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