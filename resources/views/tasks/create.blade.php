@extends('layouts.app')

@section('content')
<tasks :user="{{ auth()->user() }}"></tasks>
@endsection
