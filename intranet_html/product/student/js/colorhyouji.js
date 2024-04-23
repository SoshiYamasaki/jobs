const Favoritelist ="1";

const Favorite = Favoritelist.split(",");

Favorite.forEach((colornumber) => {
    if(colornumber !=  ""){
        color(colornumber);
    }
});

function buttonClick() {
    if(Favorite[0] != ""){
        for (var i = 0; i < ItemList.length; i++) {
            ids[i] = ItemList.item(i).getAttribute('id');
        }
        for (let i = 0; i < ids.length; i++) {
            harfText[i].style.display = "none";
            Favorite.forEach((sentaku) => {
                if (String(ids[i]) === sentaku) {
                    // 完全一致のときの処理
console.log(sentaku);
                    
                    document.getElementById(String(ids[i])).style.display = "block";
                }
            });
        }
    }else{
        alert("お気に入りが登録されていません")
    }
}
function color(num) {
    
    var number = document.getElementById("favorite"+ String(num));
   
    if (number.style.opacity != 1) {
        number.style.color = 'yellow';
        number.style.opacity = 1;
        number.style['-webkit-transform'] = 'scale(1.1)';
        if(Favorite.indexOf(String(num)) !== -1){
           
        }else{
            if(Favorite[0] == ''){
                Favorite[0]=String(num);
            }else{
                Favorite.push(String(num));
            }
           
        }
    } else {
        number.style.color = 'black';
        number.style.opacity = 0.5;
        number.style['-webkit-transform'] = 'scale(1)';
        if(Favorite.indexOf(String(num) !== -1)){
            for(var i = Favorite.indexOf(String(num));i < Favorite.length-1;i++){
                Favorite[i] = Favorite[i + 1];
            }
            if(Favorite.length == 1){
                Favorite[0]="";
            }else{
                Favorite.pop();
            }
            
        }else{
            console.log("お気に入りに登録されていません");
        }
    }
}