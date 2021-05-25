<page>
	<h2>Laporan Proyek</h2>
	<hr>
	<p>Nama Proyek : {{$proyek->nama_proyek}}</p>
	<p>Pemegang Proyek : {{$proyek->pemegang_proyek}}</p>
	<p>Lokasi Proyek : {{$proyek->lokasi_proyek}}</p>
	<p>Owner Proyek : {{$proyek->owner_proyek}}</p>
	<p>Status Proyek : {{$proyek->status->name}}</p>
	<h4>Material</h4>
	<table border="1px">
		<tr style="font-weight: bold;">
			<td>NO</td>
			<td>MATERIAL</td>
			<td>JUMLAH</td>
		</tr>
		@foreach ($material_proyek as $key => $value)
		<tr>
			<td>{{$key+1}}</td>
			<td>{{$value->material->nama_material}}</td>
			<td>{{$value->jumlah}}</td>
		</tr>
		@endforeach
	</table>
	<h4>Schedule</h4>
	<table border="1px">
		<tr style="font-weight: bold;">
			<td>NO</td>
			<td>TANGGAL MULAI</td>
			<td>TANGGAL SELESAI</td>
			<td>SCHEDULE</td>
		</tr>
		@foreach ($schedule_proyek as $key => $value)
		<tr>
			<td>{{$key+1}}</td>
			<td>{{$value->tanggal_mulai}}</td>
			<td>{{$value->tanggal_selesai}}</td>
			<td>{{$value->schedule}}</td>
		</tr>
		@endforeach
	</table>
	<h4>Progress</h4>
	<table border="1px">
		<tr style="font-weight: bold;">
			<td>NO</td>
			<td>LOKASI</td>
			<td>PROGRESS</td>
			<td>STATUS</td>
			<td>PERSENTASE</td>
		</tr>
		@foreach ($progress_proyek as $key => $value)
		<tr>
			<td>{{$key+1}}</td>
			<td>{{$value->lokasi}}</td>
			<td>{{$value->progress}}</td>
			<td>{{$value->statusProyek->name}}</td>
			<td>{{$value->persentase}}</td>
		</tr>
		@endforeach
	</table>
</page>