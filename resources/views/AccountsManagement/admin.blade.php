@extends('Templates.login')


@section('body')
<div id = "all-users">
	<admin-login></admin-login>
</div> 
<script src="{{asset('js/app.js')}}"></script>
@endsection