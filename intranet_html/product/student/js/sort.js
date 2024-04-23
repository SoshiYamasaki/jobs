window.addEventListener('load', function () {
	let column_no = 0; //今回クリックされた列番号
	let column_no_prev = 0; //前回クリックされた列番号
	document.querySelectorAll('#job_table #titles div').forEach(elm => {
		elm.onclick = function () {
			var table = document.getElementById('table');
			column_no = jQuery(this).index();//クリックされた列番号
		
			let sortType = 0; //0:数値 1:文字
			let sortArray = new Array; //クリックした列のデータを全て格納する配列
			const ABCList = Array.from(ItemList);//アレイライクなオブジェクトを配列に戻す
			
			for (let r = 0; r < ABCList.length; r++) {
				//行番号と値を配列に格納
				let column = new Object;
				column.row = ABCList[r];
				column.value = ABCList[r].children[column_no].textContent;
				
				sortArray.push(column);
				//数値判定
				if (isNaN(Number(column.value))) {
					sortType = 1; //値が数値変換できなかった場合は文字列ソート
				}
			}
			if (sortType == 0) { //数値ソート
				if (column_no_prev == column_no) { //同じ列が2回クリックされた場合は降順ソート
					sortArray.sort(compareNumberDesc);
				} else {
					sortArray.sort(compareNumber);
				}
			} else { //文字列ソート
				if (column_no_prev == column_no) { //同じ列が2回クリックされた場合は降順ソート
					sortArray.sort(compareStringDesc);
				} else {
					sortArray.sort(compareString);
				}
			}
			//ソート後のTRオブジェクトを順番にtbodyへ追加（移動）
			let tbody = table;
			
			for (let i = 0; i < sortArray.length; i++) {
				tbody.appendChild(sortArray[i].row);
			}
			//昇順／降順ソート切り替えのために列番号を保存
			if (column_no_prev == column_no) {
				column_no_prev = -1; //降順ソート
			} else {
				column_no_prev = column_no;
			}
		};
	});
});
//数値ソート（昇順）
function compareNumber(a, b)
{
	return a.value - b.value;
}window.addEventListener('load', function () {
	let column_no = 0; //今回クリックされた列番号
	let column_no_prev = 0; //前回クリックされた列番号
	let clicknum = 0;
	document.querySelectorAll('#job_table #titles div').forEach(elm => {
		elm.onclick = function () {
			var table = document.getElementById('table');
			column_no = jQuery(this).index();//クリックされた列番号
			
			let sortType = 0; //0:数値 1:文字
			let sortArray = new Array; //クリックした列のデータを全て格納する配列
			const ABCList = Array.from(ItemList);//アレイライクなオブジェクトを配列に戻す
			
			if(clicknum == 0){
				$('.number_s').removeClass('active');
			}
			if(clicknum == 1){
				$('.company_s').removeClass('active');
			}
			if(clicknum == 2){
				$('.prefecture_s').removeClass('active');
			}
			if(clicknum == 3){
				$('.Profession_s').removeClass('active');
			}
			$(this).addClass('active');
			for (let r = 0; r < ABCList.length; r++) {
				//行番号と値を配列に格納
				let column = new Object;
				column.row = ABCList[r];
				column.value = ABCList[r].children[0].children[column_no].textContent;
				
				sortArray.push(column);
				//数値判定
				if (isNaN(Number(column.value))) {
					sortType = 1; //値が数値変換できなかった場合は文字列ソート
				}
			}
			if (sortType == 0) { //数値ソート
				if (column_no_prev == column_no) { //同じ列が2回クリックされた場合は降順ソート
					sortArray.sort(compareNumberDesc);
				} else {
					sortArray.sort(compareNumber);
				}
			} else { //文字列ソート
				if (column_no_prev == column_no) { //同じ列が2回クリックされた場合は降順ソート
					sortArray.sort(compareStringDesc);
				} else {
					sortArray.sort(compareString);
				}
			}
			//ソート後のTRオブジェクトを順番にtbodyへ追加（移動）
			let tbody = table;
			
			clicknum = column_no;
			for (let i = 0; i < sortArray.length; i++) {
				tbody.appendChild(sortArray[i].row);
			}
			//昇順／降順ソート切り替えのために列番号を保存
			if (column_no_prev == column_no) {	
				column_no_prev = -1; //降順ソート
			} else {
				column_no_prev = column_no;
			}
		};
	});
});
//数値ソート（昇順）
function compareNumber(a, b)
{
	return a.value - b.value;
}
//数値ソート（降順）
function compareNumberDesc(a, b)
{
	return b.value - a.value;
}
//文字列ソート（昇順）
function compareString(a, b) {
	if (a.value < b.value) {
		return -1;
	} else {
		return 1;
	}
	return 0;
}
//文字列ソート（降順）
function compareStringDesc(a, b) {
	if (a.value > b.value) {
		return -1;
	} else {
		return 1;
	}
	return 0;
}
//数値ソート（降順）
function compareNumberDesc(a, b)
{
	return b.value - a.value;
}
//文字列ソート（昇順）
function compareString(a, b) {
	if (a.value < b.value) {
		return -1;
	} else {
		return 1;
	}
	return 0;
}
//文字列ソート（降順）
function compareStringDesc(a, b) {
	if (a.value > b.value) {
		return -1;
	} else {
		return 1;
	}
	return 0;
}