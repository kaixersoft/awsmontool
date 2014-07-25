@extends('layouts.admin')

@section('content')

<div class="jumbotron">

	<form  id="frmAdmin" action="{{Config::get('facebook.BASE_URL')}}index.php/admin" method="POST">
	<table>
		<tr>
			<td><b>Username :</b></td>
			<td><input name="username" type="text" value="" /></td>
		</tr>

		<tr>
			<td><b>Password :</b></td>
			<td><input name="password" type="password" value="" /></td>
		</tr>
		<tr>
			<td colspan="2">{{ isset($error) ? $error : '' }}</td>
		</tr>

		<tr>
			<td colspan="2">
				<input type="submit" class="btn btn-lg btn-primary" role="button" />
			</td>
		</tr>

	</table>
	</form>


</div>


@stop