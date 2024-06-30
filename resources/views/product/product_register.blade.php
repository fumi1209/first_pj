@extends('layouts.app')
@push('styles') 
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
@endpush
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card__title">商品新規登録画面</div>

                <div class="list-blk">
                    <form method="POST" action="{{ route('storeRegister') }}" class="form" enctype="multipart/form-data">
                     @csrf

                        <div class="row mb-3">
                            <label for="product_name" class="col-md-4 col-form-label text-md-end">商品名&ast;</label> 

                            <div class="col-md-6">
                                <input id="product_name" type="text" class="form-control @error('product_name') is-invalid @enderror" name="product_name" value="{{ old('product_name') }}" autofocus>
                                @error('product_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="company_id" class="col-md-4 col-form-label text-md-end">メーカー名&ast;</label> 

                            <div class="col-md-6">
                                <select id="company_id" class="form-control @error('company_id') is-invalid @enderror" name="company_id" autofocus>
                                @foreach ($names as $name)    
                                <option value="{{ $name -> id }}">{{ $name -> company_name }}</option>
                                @endforeach
                                </select>
                                @error('company_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="price" class="col-md-4 col-form-label text-md-end">価格&ast;</label> 

                            <div class="col-md-6">
                                <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}"  name="price">
                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="stock" class="col-md-4 col-form-label text-md-end">在庫数&ast;</label> 

                            <div class="col-md-6">
                                <input id="stock" type="text" class="form-control @error('stock') is-invalid @enderror"  value="{{ old('stock') }}" name="stock">
                                @error('stock')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="comment" class="col-md-4 col-form-label text-md-end">コメント</label> 

                            <div class="col-md-6">
                                <textarea id="comment" class="form-control" name="comment"></textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="img-path" class="col-md-4 col-form-label text-md-end">商品画像</label> 

                            <div class="col-md-6">
                                <div class="file-upload">
                                <input id="img_path" class="form-control hidden" type="file" name="img_path">
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary1">新規登録</button>
                                <a href="{{ route('productList') }}" class="btn btn-primary2">戻る</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
