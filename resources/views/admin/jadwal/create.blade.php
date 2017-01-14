@extends('layouts.admin')
@section('content')
	<div class="container-fluid">
    	<div class="row">
		    <div class="col-lg-12">
		        <h1 class="page-header">Jadwal</h1>
		        
		        <ol class="breadcrumb">
		            <li>
		                <i class="fa fa-dashboard"></i> Dashboard
		            </li>
		            <li>
		                Jadwal
		            </li>
		            <li class="active">
		                Tambah
		            </li>
		        </ol>
		    </div>
		</div>
		{!! Form::open(['url'=>'admin/jadwal']) !!}
            @include('admin.jadwal._form',['submitButtonText'=>'Tambah'])
        {!! Form::close() !!}	
	</div>
@stop