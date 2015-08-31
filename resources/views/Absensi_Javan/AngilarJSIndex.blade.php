@extends('Absensi_Javan.App')
@section('konten')
<div ng-app="">
<table>
	<tr ng-repeat="jow in show">
		<td>{{ jow.absensi_tanggal }}</td>
	</tr>
</table>
</div>
@stop