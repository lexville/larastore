@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Product</h2>
    {!! Form::open(array('url' => '/store/1/product/create', 'method' => 'POST')) !!}

    <div class="form-group">
        {!! Form::label('product_name', 'Product Name:', ['class' => 'control-label']) !!}
        {!! Form::text('product_name', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('product_price', 'Product Price:', ['class' => 'control-label']) !!}
        {!! Form::text('product_price', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('product_description', 'Product Description:', ['class' => 'control-label']) !!}
        {!! Form::textarea('product_description', null, ['class' => 'form-control']) !!}
    </div>
    {!! Form::submit('Add New Product', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
</div>
@endsection
