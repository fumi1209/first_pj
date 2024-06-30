@extends('layouts.app')
@push('styles') 
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
@endpush
@push('scripts')
  <script src="{{ asset('/js/delete.js') }}" ></script>
@endpush
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card__title">商品一覧画面</div>

                <div>
                    <form method="GET" action="">
                    @csrf
                        <div class="row mb-3 search-blk">
                            <input  type="search" class="form-control search-item" name="keyword" placeholder="検索キーワード" value="{{ request() -> query('keyword') }}">
                            <select class="form-control search-item" name="company_name" value="{{ request() -> query('company_name') }}">
                                <option value="" >メーカー名を選択してください</option>
                                @foreach ($names as $name)  
                                <option value="{{ $name -> id }}" @if(request() -> query('company_name') == $name -> id) selected @endif> {{ $name -> company_name }} </option>
                                @endforeach
                            </select>
                      
                            <input type="submit" class="btn search-btn" value="検索"> 
                        </div>
                    </form>   
                    <table class="list-blk">
                        <thead class="list-title">
                            <tr>
                                <th class="list-title__text">ID</th>
                                <th class="list-title__text">商品画像</th>
                                <th class="list-title__text">商品名</th>
                                <th class="list-title__text">価格</th>
                                <th class="list-title__text">在庫数</th>
                                <th class="list-title__text">メーカー名</th>
                                <th class="list-title__btn"><a class="btn btn-primary1" href="{{ route('createRegister') }}">新規登録</a></th>
                            </tr>
                        </thead>
                        <tbody class="list-content">
                            @foreach($lists as $list)
                            <tr>
                            <td class="list-content__text">{{ $list -> id }}</td>
                            <td class="list-content__text"><img src="{{ asset('storage/'.$list -> img_path) }}" alt="商品画像"></td>
                            <td class="list-content__text">{{ $list -> product_name }}</td>
                            <td class="list-content__text">{{ $list -> price }}</td>
                            <td class="list-content__text">{{ $list -> stock }}</td>
                            <td class="list-content__text">{{ $list -> company -> company_name }}</td>
                            <td class="list-content__text"><a class="btn btn-primary1" href="http://localhost/first_pj/public/product/detail/{{ $list->id }}">詳細</a></td>
                            <form method="POST" action="{{ route('delete',$list -> id) }}">
                                @csrf
                                @method('DELETE')
                                <td class="list-content__text7"><button class="btn btn-primary2" type=”submit” onclick="return submitCheck()">削除</button></td>
                            </form>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                        
                    
                    {{ $lists -> appends(request()->query())->links() }}
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
