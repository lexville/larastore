@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Store</h2>
    {!! Form::open(array('route' => 'store', 'method' => 'POST')) !!}

    <div class="form-group">
        {!! Form::label('store', 'Store's Name:', ['class' => 'control-label']) !!}
        {!! Form::text('store', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('description', 'Store's Description:', ['class' => 'control-label']) !!}
        {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
    </div>
    {!! Form::submit('Add New Store', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
</div>
@endsection
