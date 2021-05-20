<page>
	<h2>Laporan Aset</h2>
	<hr>
	<table>
		<tr>
			<th>NO#</th>
			<th>Hardware Type</th>
			<th>Serial Number</th>
			<th>Jenis</th>
			<th>Tgl. Pembelian</th>
			<th>Harga</th>
			<th>Jangka Waktu</th>
			<th>Cabang</th>
			<th>Status</th>
		</tr>
			@foreach($asset as $key => $value)
				<tr>
					<td>{{ $key+1 }}</td>
					<td>{{ $value->hardware_type }}</td>
					<td>{{ $value->serial_number }}</td>
					<td>{{ $value->jenis->name }}</td>
					<td>{{ date('d-m-Y', strtotime($value->tanggal_pembelian)) }}</td>
					<td>{{number_format($value->harga, 0, ',', '.')}}</td>
					<td>{{ date('d-m-Y', strtotime($value->jangka_waktu)) }}</td>
					<td>{{ $value->cabang->name}}</td>
					<td>{{ $value->status->name}}</td>
				</tr>
			@endforeach
	</table>
</page>