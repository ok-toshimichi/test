@extends('layout')
@section('title', '商品登録')
@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h2>商品登録フォーム</h2>
        <form
            method="POST"
            action="{{ route('store') }}"
            onSubmit="return checkSubmit()"
            enctype="multipart/form-data"
        >
        @csrf
            <div class="form-group">
                <label for="product_name">
                    商品名
                </label>
                <input
                    id="product_name"
                    name="product_name"
                    class="form-control"
                    value="{{ old('product_name') }}"
                    type="text"
                >
                @if ($errors->has('product_name'))
                    <div class="text-danger">
                        {{ $errors->first('product_name') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="company_id">
                    メーカー
                </label>
                <select
                    name="company_id"
                    id="company_id"
                    value="{{ old('company_id') }}"
                >
                    <option value=""> - 選択してください - </option>
                    @foreach($companies as $company)
                        <option value="{{ $company->id }}">
                            {{ $company->company_name }}
                        </option>
                    @endforeach
                </select>
                @if ($errors->has('company_id'))
                    <div class="text-danger">
                        {{ $errors->first('company_id') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="price">
                    価格
                </label>
                <input
                    id="price"
                    name="price"
                    class="form-control"
                    value="{{ old('price') }}"
                    type="number"                    
                >
                @if ($errors->has('price'))
                    <div class="text-danger">
                        {{ $errors->first('price') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="stock">
                    在庫数
                </label>
                <input
                    id="stock"
                    name="stock"
                    class="form-control"
                    value="{{ old('stock') }}"
                    type="number"
                >
                @if ($errors->has('stock'))
                    <div class="text-danger">
                        {{ $errors->first('stock') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="comment">
                    商品説明
                </label>
                <textarea
                    id="comment"
                    name="comment"
                    class="form-control"
                    rows="4"
                >{{ old('comment') }}</textarea>
            </div>
            <div class="form-group">
                <label for="image">
                    商品画像
                </label>
                <input 
                    id="image"
                    name="image"
                    class="form-control"
                    value="{{ old('image') }}"
                    type="file"
                >
                @if ($errors->has('image'))
                    <div class="text-danger">
                        {{ $errors->first('image') }}
                    </div>
                @endif
            </div>
            <div class="mt-5">
                <a class="btn btn-secondary" href="{{ route('products') }}">
                    キャンセル
                </a>
                <button type="submit" class="btn btn-primary">
                    登録する
                </button>
            </div>
        </form>
    </div>
</div>
<script>
function checkSubmit(){
if(window.confirm('送信してよろしいですか？')){
    return true;
} else {
    return false;
}
}
</script>
@endsection