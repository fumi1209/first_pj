@extends('layouts.app')
@push('styles') 
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
@endpush
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card__title">商品情報詳細画面</div>

                <div class="list-blk form">
                  @csrf
                    <div class="row mb-3">
                        <label for="product_id" class="col-md-4 col-form-label text-md-end">ID</label> 
                        <p class="col-md-6">{{ $detail -> id }}</p>
                    </div>

                    <div class="row mb-3">
                        <label for="image" class="col-md-4 col-form-label text-md-end">商品画像</label> 
                        <p class="col-md-6"><img src="{{ asset('storage/'.$detail -> img_path) }}" alt="商品画像"></p>
                    </div>

                    <div class="row mb-3">
                        <label for="product_name" class="col-md-4 col-form-label text-md-end">商品名</label> 
                        <p class="col-md-6">{{ $detail -> product_name }}</p>
                    </div>

                    <div class="row mb-3">
                        <label for="maker" class="col-md-4 col-form-label text-md-end">メーカー</label> 
                        <p class="col-md-6">{{ $detail -> company -> company_name }}</p>
                    </div>

                    <div class="row mb-3">
                        <label for="price" class="col-md-4 col-form-label text-md-end">価格</label> 
                        <p class="col-md-6">{{ $detail -> price }}</p>
                    </div>

                    <div class="row mb-3">
                        <label for="stock" class="col-md-4 col-form-label text-md-end">在庫数</label> 
                        <p class="col-md-6">{{ $detail -> stock }}</p>
                    </div>

                    <div class="row mb-3">
                        <label for="comment" class="col-md-4 col-form-label text-md-end">コメント</label> 
                        <p class="col-md-6">{{ $detail -> comment }}</p>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <a href="{{ route('showEdit',$detail -> id) }}" class="btn btn-primary1">編集</a>
                            <a href="{{ route('productList') }}" class="btn btn-primary2">戻る</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
