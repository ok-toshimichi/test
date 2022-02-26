@extends('layout')
@section('title', '商品詳細')
@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h2>商品情報ID：{{ $product->id }}</h2>
        <div style="width: 15rem; float: left; margin: 16px">
            <img src="{{ Storage::url($product->image) }}" style="width: 100%;">
        </div>
        <h2>商品名：{{ $product->product_name }}</h2>
        <p>メーカー：{{ $product->company->company_name }}</p>
        <span>価格：{{ $product->price }}</span>
        <span>在庫数：{{ $product->stock }}</span>
        <p>{{ $product->comment }}</p>
    </div>
</div>
@endsection