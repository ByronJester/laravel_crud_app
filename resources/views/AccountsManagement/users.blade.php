@extends('Templates.layout')


@section('body')
<div id = "all-users">
	<users-list></users-list>
</div> 
<script src="{{asset('js/app.js')}}"></script>
@endsection