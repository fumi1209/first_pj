@extends('layouts.app')
@push('styles') 
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
@endpush
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card__title">商品情報編集画面</div>

                <div class="list-blk">
                    <form method="POST" action="{{ route('updata',$edit -> id) }}" class="form" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end">ID</label> 
                            <p class="col-md-6">{{ $edit -> id }}</p>
                        </div>

                        <div class="row mb-3">
                            <label for="product_name" class="col-md-4 col-form-label text-md-end">商品名&ast;</label> 

                            <div class="col-md-6">
                                <input id="product_name" type="text" class="form-control @error('product_name') is-invalid @enderror" name="product_name" value="{{ $edit -> product_name }}" autofocus>
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
                                <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" value="{{ $edit -> price }}" name="price" >

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
                                <input id="stock" type="text" class="form-control @error('stock') is-invalid @enderror" name="stock" value="{{ $edit -> stock }}" >

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
                                <textarea id="comment" class="form-control" name="comment">{{ $edit -> comment }}</textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="img-path" class="col-md-4 col-form-label text-md-end">商品画像</label> 

                            <div class="col-md-6">
                            <input id="img_path" class="form-control hidden" type="file" name="img_path">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary1">更新</button>
                                <a href="{{ route('showDetail',$edit -> id) }}" class="btn btn-primary2">戻る</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection