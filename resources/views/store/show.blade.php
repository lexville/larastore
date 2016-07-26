@extends('layouts.app')

@section('content')
<div class="container">
    <a class="btn btn-primary" href="/store/{{ $store->id }}/product/create">Create New Product</a>
</div>
@endsection
