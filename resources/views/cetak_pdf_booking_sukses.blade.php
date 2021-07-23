<!DOCTYPE html>
<html>
<head>
	<title>Cetak laporan booking sukses</title>
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
	</center>

	<table class='table table-bordered'>
		<thead class="bg-success text-white">
			<tr>
                <th>No</th>
				<th>Penyewa</th>
				<th>Nomor Penyewa</th>
				<th>Email Penyewa</th>
				<th>Alamat Penyewa</th>
				<th>Nama kos</th>
				<th>Kamar ID</th>
                <th>Lama Sewa</th>
                <th>Tanggal</th>
			</tr>
		</thead>
		<tbody>
            @php $i=1 @endphp
            @foreach($bookingMasukSukses as $booking)
			<tr>
                <td>{{$i++}}</td>
				<td>{{$booking->booking->user->name}}</td>
				<td>{{$booking->booking->user->no_hp}}</td>
				<td>{{$booking->booking->user->email}}</td>
				<td>{{$booking->booking->user->alamat}}</td>
				<td>{{$booking->kos->nama_kos}}</td>
                <td>{{$booking->kamar->id}}</td>
				<td>{{$booking->lama_sewa}} / Bulan</td>
                <td>{{date('d / M / Y',strtotime($booking->booking->created_at))}}</td>
			</tr>
            @endforeach
		</tbody>
	</table>

</body>
</html>