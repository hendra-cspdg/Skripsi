@extends('layouts.peserta')
@section('content')
	<div class="container">
    	<div class="row">
		    <div class="col-lg-12">
		        <h1 class="page-header">Biodata</h1>
		        @include('_partial.flash_message')
		    </div>
		</div>
		@if(isset($peserta))
			
			@foreach($peserta as $biodata)
				<div class="col-md-2 col-md-offset-1">
					@if(isset($biodata->foto))
						{!! Html::image(asset('fotoupload/'.$biodata->foto),null,['class'=>'img-rounded img-responsive','width'=>'200px']) !!}
					@else
						@if($biodata->jenis_kelamin == 'L')
							<img src="{{ asset('fotoupload/dummymale.jpg') }}">
						@else
							<img src="{{ asset('fotoupload/dummyfemale.jpg') }}">
						@endif
					@endif
					
				</div>
				<div class="col-md-6">
					<table class="table table-striped">
						<tr>
							<th width="150">No. Pendaftaran</th>
							<td>{{ $biodata->id }}</td>
						</tr>
						<tr>
							<th>Nama Lengkap</th>
							<td>{{ $biodata->nama }}</td>
						</tr>
						<tr>
							<th>Program Keahlian</th>
							<td>{{ $biodata->jurusan->nama }}</td>
						</tr>
						<tr>
							<th>Sekolah Asal</th>
							<td>{{ $biodata->sekolah->nama }}</td>
						</tr>
						<tr>
							<th>Status</th>
							<td><h1><span class="label label-{{ $biodata->status->label }}">{{ $biodata->status->nama }}</span></h1></td>
						</tr>
					</table>
				</div>
			@endforeach
		@else
			<p>create</p>
			<a href="#">Create</a>
		@endif
	</div>	
@stop