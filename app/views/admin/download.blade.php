@extends('layouts.admin')

@section('content')

      <div class="jumbotron">

      		<h3>Donwloads</h3>

	        <p>
	          <a class="btn btn-lg btn-primary" href="{{Config::get('facebook.BASE_URL')}}index.php/admin/downloads/registrants" role="button">Registrants Report</a>
	        </p>


	        
      </div>

@stop