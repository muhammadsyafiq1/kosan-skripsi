<!DOCTYPE html>
<html>
<head>
	<title>Booking kos - {{$booking_detail->kos->nama_kos}}</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5> <span class="text-success">JURAGAN</span> KOS</h5>
		<P>Booking kos - {{$booking_detail->kos->nama_kos}} #{{$booking_detail->booking->id}}</P>
	</center>

	<table class='table table-bordered'>
		<thead class="bg-success text-white">
			<tr>
				<th>Nama</th>
				<th>Periode Sewa</th>
				<th>Lama / bulan</th>
				<th>Biaya DP</th>
				<th>Nama kos</th>
				<th>Kamar ID</th>
                <th>Status Booking</th>
                <th>Tanggal</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>{{$booking_detail->booking->user->name}}</td>
				<td>
                    {{date('d / M / Y',strtotime($booking->booking->mulai_sewa ?? ''))}} - <br>  {{date('d / M / Y',strtotime($booking->booking->habis_sewa ?? ''))}}  
                </td>
				<td>{{$booking_detail->lama_sewa}}</td>
				<td>{{number_format($booking_detail->total_bayar)}}</td>
				<td>{{$booking_detail->kos->nama_kos}}</td>
				<td>{{$booking_detail->kamar->id}}</td>
                <td>{{$booking_detail->booking->status}}</td>
                <td>{{date('d / M / Y',strtotime($booking_detail->booking->created_at))}}</td>
			</tr>
		</tbody>
	</table>

</body>
</html>