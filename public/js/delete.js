// 商品一覧の削除ボタン押下
function submitCheck(){
    let message = confirm("削除してもよろしいですか？");
    if(message === true) {
      return true; 
    }
    else {
      return false; 
    }
  }