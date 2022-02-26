@extends('layout')
@section('title', '商品一覧')
@section('content')
<div class="row">
  <div class="col-md-10 col-md-offset-2">
      <h2 style="float: left;">商品一覧</h2>
      @if (session('err_msg'))
            <h2 class="text-danger" style="text-align: center;">
                {{ session('err_msg') }}
            </h2>
      @endif
      <form action="{{ url('/dashboard') }}" method="GET" style="float: right;">
            @include('search')
      </form>
      @if($products->count())
      <table class="table table-striped">
          <tr>
              <th>商品番号</th>
              <th>商品画像</th>
              <th>商品名</th>
              <th>価格</th>
              <th>在庫数</th>
              <th>メーカー名</th>
              <th></th>
              <th></th>
          </tr>
          @foreach($products as $product)
          <tr>
              <td>{{ $product->id }}</td>
              <td style="width: 10rem; float: left; margin:16px;">
                <img src="{{ Storage::url($product->image) }}" style="width: 100%;"/>                
              </td>
              <td><a href="/product/{{ $product->id }}">{{ $product->product_name }}</a></td>
              <td>{{ $product->price }}</td>
              <td>{{ $product->stock }}</td>
              <td>{{ $product->company->company_name }}</td>
              <td><button type="button" class="btn btn-primary" onclick="location. href='/product/edit/{{ $product->id }}' ">編集</button></td>
              <form method="POST" action="{{ route('delete', $product->id) }}" onSubmit="return checkDelete()">
              @csrf
              <td><button type="submit" class="btn btn-primary" onclick=>削除</button></td>
              </form>
          </tr>
          @endforeach
      </table>
      @else
      <h2 style="color: red;">　※検索結果：該当なし</h2>
      @endif
  </div>
</div>
<script>
function checkDelete(){
    if(window.confirm('削除してよろしいですか？')){
        return true;
    } else {
        return false;
    }
}
</script>
@endsection