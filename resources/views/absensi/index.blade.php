@extends('layouts.admin')
@section('content')
<div class="container-fluid">
	<div class="row">
	<div class="col-md-12">
	
			  <div class="panel-heading">Data Absensi
			  	<div class="btn btn-warning pull-right"><a href="{{ route('absensi.create') }}">Tambah</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			  <div class="table-responsive">
				  <table class="table table-borderless table-striped table-earning">
				  	<thead>
			  		<tr>
			  		  <th>No</th>
					  <th>Tgl_absen</th>
					  <th>Kelas</th>
					  <th>Nama_Siswa</th>
					  <th>Keterangan</th>
					  <th colspan="3">Action</th>
			  		</tr>
				  	</thead>
				  	<tbody>
				  		<?php $nomor = 1; ?>
				  		@php $no = 1; @endphp
				  		@foreach($b as $data)
				  	  <tr>
				    	<td>{{ $no++ }}</td>
				    	<td>{{ $data->tgl_absen }}</td>
				    	<td>{{ $data->Siswa->Kelas->kelas }}</td>
				    	<td>{{ $data->Siswa->nama }}</td>
				    	<td>{{ $data->keterangan }}</td>
						<td>
							<a class="zmdi zmdi-edit" data-toggle="tooltip" data-placement="top" title="Edit" href="{{ route('absensi.edit',$data->id) }}"></a>
						</td>
						<td>
							
						</td>
						<td>
							<form method="post" action="{{ route('absensi.destroy',$data->id) }}">
								<input name="_token" type="hidden" value="{{ csrf_token() }}">
								<input type="hidden" name="_method" value="DELETE">

								<button type="submit" class="zmdi zmdi-delete" data-toggle="tooltip" data-placement="top" title="Delete" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')"></button>
							</form>
						</td>
				      </tr>
				      @endforeach	
				  	</tbody>
				  </table>
				</div>
			  </div>
			</div>	
		</div>
	</div>
</div>
<div class="row">
 <div class="col-md-12">
  <div class="copyright">
   <p>Copyright © 2018 Colorlib. All rights reserved. Website by RizalPradana</a>.</p>
    </div>
    </div>
    </div>
    </div>
@endsection