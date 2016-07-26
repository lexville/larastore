@extends('layouts.app')

@section('content')
<div class="container">
    <a class="btn btn-primary" href="/store/create">Create A New Store</a>
    <table class="table">
    <thead>
        <tr>
            <th>Store</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
        @foreach($allStores as $store)
        <tr>
            <td><a href="/store/{{ $store->id }}">{{ $store->name }}</a></td>
            <td>{{ $store->description }}</td>
        </tr>
        @endforeach
    </tbody>
  </table>
</div>
@endsection
