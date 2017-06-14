@extends('layouts.master')

@section('content')
@if (isset($movements) && ! is_null($movements))
	@foreach ($movements as $movement)
		<p>{{ $movement->tenDeno }}</p>
	@endforeach
@endif
     <p>No content</p>
@stop
