<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Aap\Models\Sale;
use App\Models\Company;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'product_name',
        'company_id',
        'price',
        'stock',
        'comment',
        'img_path',
    ];

    public function sales(){
        return $this -> hasMany(Sale::class);
    }

    public function company(){
        return $this -> belongsTo(Company::class);
    }

    //商品一覧の全データ取得
    public function getAllData(){
        $products = Product::paginate(7);
        return $products;
    }

    //絞り込み条件で該当のデータを取得
    public function seach($keyword, $company_name){
        if (empty($keyword)){    //キーワードが空文字であれば、
            $lists = Product::where('company_id', $company_name) -> paginate(7);  //company_idとcompany_nameが一致するデータを１P７件で表示
        } else {
            $lists = Product::where('product_name', 'like', '%'. $keyword. '%') //空文字でなければ、product_nameとキーワードが部分一致するデータ、company_idとcompany_nameが一致するデータを１P７件で表示
            -> orwhere('company_id', $company_name) -> paginate(7);
        }
        return $lists;
    }

    //新規登録
    public function store($request){
        $this -> company_id = $request -> company_id;
        $this -> product_name = $request -> product_name;
        $this -> price = $request -> price;
        $this -> stock = $request -> stock;
        $this -> comment = $request -> comment;

        if ($request->hasFile('img_path')) {   //'image'があれば、ファイル名を取得
            $file_name = $request -> img_path -> getClientOriginalName();
            $img_path = $request -> img_path -> storeAs('public' , $file_name); //storage/app/publicフォルダ内に、取得したファイル名で保存
            $this -> img_path = $file_name; //$file_nameのファイル名をimg_pathカラムに代入
        }
        $this -> save();
    }

    //該当IDでデータ取得(詳細画面表示/編集画面表示)
    public function getSelectData($id){
        $product = Product::find($id);
        return $product;
    }

    //該当IDを削除
    public function deleteData($id){
        return $this -> destroy($id);  //delete() = 複数削除、destroy() = 単体削除
    }

    // 該当IDの編集内容登録
    public function updata($request,$id){
        $product_updata = Product::find($id);  //該当のIDデータを取得
        $product_updata -> company_id = $request -> company_id;  // ProductDBのcompany_idカラムに対して、repuest変数のcompany_idを代入
        $product_updata -> product_name = $request -> product_name;
        $product_updata -> price = $request -> price;
        $product_updata -> stock = $request -> stock;
        $product_updata -> comment = $request -> comment;
        
        if ($request->hasFile('img_path')) {   //'image'があれば、ファイル名を取得
            $file_name = $request -> img_path -> getClientOriginalName();
            $img_path = $request -> img_path -> storeAs('public' , $file_name); //storage/app/publicフォルダ内に、取得したファイル名で保存
            $product_updata -> img_path = $file_name; //$file_nameのファイル名をimg_pathカラムに代入
        }
        $product_updata -> save(); 
        return $product_updata; //上書きしたproduct_updata変数（最新のDB情報）を返す
    }
}
