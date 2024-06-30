<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Company;
use Illuminate\Http\Request;  //データの取得やバリデーションなど、アプリケーション内でリクエストを処理する際に使用
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function __construct()
    {
        $this -> product = new Product();
        $this -> company = new Company();
    }

    const VIEW_BASE_PATH = "product/product_";

    //viewファイルで指定している$lists変数に$lists(取得したデータ)を渡す (一覧画面)
    public function index(Request $request){
        $keyword = $request -> query('keyword'); //クエリ文字列から入力の取得
        $company_name = $request -> query('company_name');
        
        if (isset($keyword) || isset($company_name)){ //isset:変数に値が入っているか、かつ、NULLではないか
            $lists = $this -> product -> seach($keyword, $company_name);
        } else {
            $lists = $this -> product -> getAllData(); 
        }
        $company_name = $this -> company -> getCompanyData();
        return view(self::VIEW_BASE_PATH . "list",['lists' => $lists ,'names' => $company_name]);
    }

  //ルートからIDを受け取り、引数に渡す。productテーブルからidを指定して取得。viewファイルのlists変数に、$detailを渡す　（詳細画面）
    public function showDetail($id){
        $detail = $this -> product -> getSelectData($id);
        return view(self::VIEW_BASE_PATH . "detail",['detail' => $detail]);
    }

    // (新規登録画面表示)
    public function showCreate(){
        $company_name = $this -> company -> getCompanyData();
        return view(self::VIEW_BASE_PATH . "register", ['names' => $company_name]); 
    }
    // (新規登録)
    public function exeStore(ProductRequest $request){  //リクエストオブジェクトをリクエスト変数に代入(代入時にバリデーションチェックを実施している)
        $store = $this -> product -> store($request);
        return redirect(route('createRegister'));
    }

    //(編集画面)
    public function showEdit($id){
        $edit = $this -> product -> getSelectData($id);
        $company_name = $this -> company  -> getCompanyData();
        return view(self::VIEW_BASE_PATH . "edit",['edit' => $edit ,'names' => $company_name]); 
    }

    //(編集内容登録)
    public function exeUpdata(ProductRequest $request, $id){
        $updata = $this -> product -> updata($request,$id); //updataクラスを実行し、返り値をupdata変数に代入
        return redirect(route('showEdit',[ 'id' => $updata -> id])); //updata変数のidカラムをidパラメータにする
    }
    
    //(削除)
    public function exeDelete($id){
        $delete = $this -> product -> deleteData($id);
        return redirect(route('productList'));
    }

}
