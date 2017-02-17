@extends('layouts.app')

@section('content')
	<activity :user="{{ auth()->user() }}"></activity>
    
@stop