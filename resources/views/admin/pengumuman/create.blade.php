@extends('layouts.admin')
@section('content')
	<div class="container-fluid">
    	<div class="row">
		    <div class="col-lg-12">
		        <h1 class="page-header">Pengumuman</h1>
		        
		        <ol class="breadcrumb">
		            <li>
		                <a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
		            </li>
		            <li>
		                <a href="{{ url('admin/pengumuman') }}">Pengumuman</a>
		            </li>
		            <li class="active">
		                Tambah
		            </li>
		        </ol>
		    </div>
		</div>
		{!! Form::open(['url'=>'admin/pengumuman']) !!}
            @include('admin.pengumuman._form',['submitButtonText'=>'Tambah'])
        {!! Form::close() !!}	
	</div>
@stop