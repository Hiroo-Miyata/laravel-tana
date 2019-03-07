//以下データの処理についてのコード
//動的にdivを追加する
var element;
var mago_element;
var oya_element;
var add_element;
var delete_button;

loadleftcontent();

//什器初期状態：0
var clicked_jyuki = 0;
var clicked_tana = 0;

$(document).on("click", ".jyuki_num_content", function(){
    var id = $(this).attr("id");

    if(clicked_jyuki == id){
        hidetana(id);
        clicked_jyuki = 0;
        clicked_tana = 0;
    }else if(clicked_jyuki == 0){
        showtana(id);
        clicked_jyuki = id;
    }else{
        hidetana(clicked_jyuki);
        showtana(id);
        clicked_jyuki = id;
        clicked_tana = 0;
    }
})


$(document).on("click", ".jyuki_add", function(){
    oya_element = document.getElementById("left-body-container-body");
    oya_element.removeChild(oya_element.lastChild);
    var jyuki_num = goodslist.length + 1;
    goodslist.push([[]]);
    createjyukiel(jyuki_num, oya_element);
    add_element = document.createElement("div");
    add_element.classList.add('jyuki_add');
    add_element.innerHTML = "什器を追加";
    oya_element.appendChild(add_element);
    //ここをloadjyukiviewにすることで早くなる。
    loadallview();

});

$(document).on("click", ".jyuki_delete", function(){
    var btn = document.getElementById("jyuki_confirm_btn");
    btn.value = $(this).attr("id");
});

$(document).on("click", "#jyuki_confirm_btn", function(){
    var jyuki_num = parseInt($(this).attr("value").split('_')[2]) - 1;
    var pre_clicked_jyuki = clicked_jyuki;
    goodslist.splice(jyuki_num, 1);
    //ずれた名前を表示し直す。
    loadleftcontent();
    //この機能は削除したものがクリックしているものの上にあるか下にあるかで処理が別なので、めんどくさいうえ、ユーザーは自分が
    //クリックしてみたものに対して削除すると考えられ、あまり必要ないと思われるので実装しない。
    //if(pre_clicked_jyuki != 0){
    //    if(parseInt(pre_clicked_jyuki.split('_')[2]) == jyuki_num+1){
    //        showtana(pre_clicked_jyuki);
    //        clicked_jyuki = pre_clicked_jyuki;
    //    }
    loadallview();
    $.magnificPopup.close();
});

$(document).on("click", "#jyuki_dismiss_btn", function(){
    $.magnificPopup.close();
});

$(document).on("click", ".tana_delete", function(){
    var btn = document.getElementById("tana_confirm_btn");
    btn.value = $(this).attr("id");
});

$(document).on("click", "#tana_dismiss_btn", function(){
    $.magnificPopup.close();
});
$(document).on("click", "#tana_confirm_btn", function(){
    var pre_clicked_jyuki = clicked_jyuki;
    //var pre_clicked_tana = clicked_tana;
    var jyuki_num = parseInt($(this).attr("value").split('_')[2]) - 1;
    var tana_num = parseInt($(this).attr("value").split('_')[3]) - 1;
    goodslist[jyuki_num].splice(tana_num,1);
    loadleftcontent();
    if(pre_clicked_jyuki != 0){
        if(parseInt(pre_clicked_jyuki.split('_')[2]) == jyuki_num+1){
            showtana(pre_clicked_jyuki);
            clicked_jyuki = pre_clicked_jyuki;

            //再ロード後の表示補助は棚までにする。商品までするとめんどくさい、下の処理だけでは足りない

            //if(pre_clicked_tana != 0){
            //    if(parseInt(pre_clicked_tana.split('_')[3]) == tana_num+1){
            //        showgoods(pre_clicked_tana);
            //    }
            //}
        }
    }
    loadjyukiview(jyuki_num+1);

    $.magnificPopup.close();
})



function showtana(id){
    var jyuki_num = parseInt(id.split('_')[2]);
    oya_element = document.getElementById("jyuki_" + String(jyuki_num));
    var tana_len = goodslist[jyuki_num-1].length;
    for(var i=0; i<tana_len; i++){
        createtanael(jyuki_num, i+1,oya_element);
    }

    element = document.createElement("div");
    element.classList.add("tana_add");
    element.innerHTML = "棚を追加";
    oya_element.appendChild(element);

}


function hidetana(id){
    oya_element = document.getElementById("jyuki_" + id.split('_')[2]);
    var hoge = oya_element.childElementCount;
    for(var i=0; i<hoge-2; i++){
        oya_element.removeChild(oya_element.lastChild);
    }
}

function createjyukiel(jyuki_number, parent){
    element = document.createElement("div");
    element.classList.add("jyuki_num");
    element.id = 'jyuki_' + String(jyuki_number);
    parent.appendChild(element);
    mago_element = document.createElement("div");
    mago_element.classList.add('jyuki_num_content');
    mago_element.innerHTML = "什器" + String(jyuki_number);
    mago_element.id = "jyuki_content_" + String(jyuki_number);
    element.appendChild(mago_element);
    delete_button = document.createElement("div");
    delete_button.classList.add("jyuki_delete");
    delete_button.innerHTML = "削除";
    delete_button.id = "del_jyu_" + String(jyuki_number);
    delete_button.setAttribute("data-mfp-src", "#popup_deljyuki");
    element.appendChild(delete_button);
    $(document).ready(function(){
        $(".jyuki_delete").magnificPopup({
            type:'inline',
            showCloseBtn: false,
        });
    });
}

function createtanael(jyuki_number,tana_number, parent){
    element = document.createElement("div");
    element.classList.add('tana_num');
    element.id = "tana_" + String(jyuki_number) + "_" + String(tana_number);
    mago_element = document.createElement("div");
    mago_element.classList.add("tana_content");
    mago_element.innerHTML = "棚" + String(tana_number);
    mago_element.id = "tana_content_" + String(jyuki_number) + "_" + String(tana_number);
    element.appendChild(mago_element);
    delete_button = document.createElement("div");
    delete_button.innerHTML = "削除";
    delete_button.classList.add("tana_delete");
    delete_button.id = "del_tana_" + String(jyuki_number) + "_" + String(tana_number);
    delete_button.setAttribute("data-mfp-src", "#popup_deltana");
    element.appendChild(delete_button);
    parent.appendChild(element);
    addsortlistener(".jyuki_num",".tana_num");
    $(document).ready(function(){
        $(".tana_delete").magnificPopup({
            type:'inline',
            showCloseBtn: false,
        });
    });
}

function loadleftcontent(){
    var jyuki_element = document.getElementById("left-body-container-body");
    jyuki_element.textContent = null;
    clicked_jyuki = 0;
    clicked_tana = 0;
    for(var i=0; i<goodslist.length; i++){
        createjyukiel(i+1, jyuki_element);
    }

    add_element = document.createElement("div");
    add_element.classList.add('jyuki_add');
    add_element.innerHTML = "什器を追加";
    jyuki_element.appendChild(add_element, jyuki_element);
}

//棚ボタンがクリックされた時の処理を以下に書く
$(document).on("click", ".tana_content", function(){
    var id = $(this).attr("id");
    console.log(id);

    if(clicked_tana == id){
        hidegoods(id);
        clicked_tana = 0;
    }else if(clicked_tana == 0){
        showgoods(id);
        clicked_tana = id;
    }else{
        hidegoods(clicked_tana);
        showgoods(id);
        clicked_tana = id;
    }
});

//id:tana_idのこと
function showgoods(id){
    var splited_id = id.split('_');
    var jyuki_num = parseInt(splited_id[2]);
    var tana_num = parseInt(splited_id[3]);
    var list_ = goodslist[jyuki_num-1][tana_num-1];
    oya_element = document.getElementById("tana_" + String(jyuki_num) + "_" + String(tana_num));
    for(var i=0; i<list_.length/2; i++){
        creategoodlist(oya_element, list_[2*i], list_[2*i+1], jyuki_num, tana_num, i+1);
    }

    element = document.createElement("div");
    element.classList.add("addgood");
    element.innerHTML = "商品を追加";
    element.id = "addgood_" + String(jyuki_num) + "_" + String(tana_num);
    oya_element.appendChild(element);
}

//el_name は実質商品のidになった。
function creategoodlist(parent, el_name, ver_count,jyuki_num, tana_num, good_num){
    element = document.createElement("div");
    element.classList.add("goodwrapper");
    element.id = "good_" + String(jyuki_num) + "_" + String(tana_num) + "_" + String(good_num);
    mago_element = document.createElement("div");
    mago_element.classList.add("goodelement");
    mago_element.innerHTML = GoodObjectDic[el_name]["name"];
    mago_element.style.overflow = "hidden";
    element.appendChild(mago_element);
    var show_count = document.createElement("div");
    var plus_btn = document.createElement("div");
    var minus_btn = document.createElement("div");
    show_count.classList.add("show_count");
    plus_btn.classList.add("plus_btn");
    minus_btn.classList.add("minus_btn");
    show_count.innerHTML = String(ver_count);
    plus_btn.innerHTML="+";
    minus_btn.innerHTML = "-";
    element.appendChild(show_count);
    element.appendChild(plus_btn);
    element.appendChild(minus_btn);
    parent.appendChild(element);
    addsortlistener(".tana_num", ".goodwrapper");

}

function hidegoods(id){
    var splited_id = id.split('_');
    var jyuki_num = parseInt(splited_id[2]);
    var tana_num = parseInt(splited_id[3]);
    oya_element = document.getElementById("tana_" + String(jyuki_num) + "_" + String(tana_num));
    var hoge = oya_element.childElementCount;
    for(var i=0; i<hoge-2; i++){
        oya_element.removeChild(oya_element.lastChild);
    }
}

$(document).on("click", ".tana_add", function(){
    var oya_element_id = $(this).parent().attr("id");
    oya_element = document.getElementById(oya_element_id);
    var jyuki_num = parseInt(oya_element_id.split("_")[1]);
    oya_element.removeChild(oya_element.lastChild);
    goodslist[jyuki_num-1].push([]);
    createtanael(jyuki_num, goodslist[jyuki_num-1].length, oya_element);
    element = document.createElement("div");
    element.classList.add("tana_add");
    element.innerHTML = "棚を追加";
    oya_element.appendChild(element);

    loadjyukiview(jyuki_num);
});

$(document).on("click", ".plus_btn", function(){
    var position = $(this).parent().attr("id");
    oya_element = document.getElementById("position");
    var position_splt = position.split("_");
    goodslist[parseInt(position_splt[1])-1][parseInt(position_splt[2])-1][(parseInt(position_splt[3])-1)*2+1]++;
    var target = $("#" + position).find('.show_count')[0];
    target.innerHTML = String(parseInt(target.innerHTML)+1);

    loadtanaview(parseInt(position_splt[1]), parseInt(position_splt[2]));
});

$(document).on("click", ".minus_btn", function(){
    var position = $(this).parent().attr("id");
    oya_element = document.getElementById("position");
    var position_splt = position.split("_");
    goodslist[parseInt(position_splt[1])-1][parseInt(position_splt[2])-1][(parseInt(position_splt[3])-1)*2+1]--;
    var target = $("#" + position).find('.show_count')[0];
    target.innerHTML = String(parseInt(target.innerHTML)-1);

    loadtanaview(parseInt(position_splt[1]), parseInt(position_splt[2]));

    if (parseInt(target.innerHTML) == 0){
        //0になったら削除する
        hidegoods("tana_content_" + position_splt[1] + "_" + position_splt[2]);
        goodslist[parseInt(position_splt[1])-1][parseInt(position_splt[2])-1].splice((parseInt(position_splt[3])-1)*2,2);

        showgoods("tana_content_" + position_splt[1] + "_" + position_splt[2]);
    }

    //loadtanaview(parseInt(position_splt[1]), parseInt(position_splt[2]));
});

//sort機能
$('#left-body-container-body').sortable({
    revert:true,
    items:'.jyuki_num',
    update: function(){
        var log = $(this).sortable("toArray");
        console.log(log);
        updategoodlistbyjyuki(log);
        loadallview();
    }
});

function addsortlistener(parent_class, sort_class){
    $(parent_class).sortable({
        revert:true,
        items:sort_class,
        update: function(){
            var log = $(this).sortable("toArray");
            console.log(log);
            updategoodlistbytanaorgood(log);
            //ここも本当は場合分けすれば計算量が減る
            loadjyukiview(parseInt(log[0].split('_')[1]));
        }
    });
}

//ソートによるリストの変化を実装する。
function updategoodlistbyjyuki(log){
    var new_array = Array(log.length);
    for(var i=0; i<log.length; i++){
        var list_num = parseInt(log[i].split('_')[1]);
        new_array[i] = goodslist[list_num-1].concat();
    }

    for(var i=0; i<log.length; i++){
        goodslist[i] = new_array[i];
    }

    loadleftcontent();
}

function updategoodlistbytanaorgood(log){
    var hoge = log[0].split('_').length;
    console.log(hoge);
    if(hoge == 3){
        var jyuki_num = parseInt(log[0].split('_')[1]);
        var new_array = Array(log.length);
        for(var i=0; i<log.length; i++){
            var list_num = parseInt(log[i].split('_')[2]);
            new_array[i] = goodslist[jyuki_num-1][list_num-1].concat();
        }
        for(var i=0; i<log.length; i++){
            goodslist[jyuki_num-1][i] = new_array[i];
        }

        hidetana("jyuki_content_" + String(jyuki_num));
        showtana("jyuki_content_" + String(jyuki_num));

    }else if(hoge == 4){

        var jyuki_num = parseInt(log[0].split('_')[1]);
        var tana_num = parseInt(log[0].split('_')[2]);
        var new_array = new Array(log.length*2);
        for(var i=0; i<log.length; i++){
            var list_num = parseInt(log[i].split('_')[3]);
            //ここは値だから値渡し
            new_array[2*i] = goodslist[jyuki_num-1][tana_num-1][(list_num-1)*2];
            new_array[2*i+1] = goodslist[jyuki_num-1][tana_num-1][(list_num-1)*2+1];
        }

        goodslist[jyuki_num-1][tana_num-1] = new_array;

        hidegoods("tana_content_" + String(jyuki_num) + "_" + String(tana_num));
        showgoods("tana_content_" + String(jyuki_num) + "_" + String(tana_num));
    }else{
        console.log("error");
    }
}

//以下右側のビューの実装
function loadallview(){
    var preview_container = document.getElementById("right-container");
    $("#right-container").empty();
    for(var i=0; i<goodslist.length; i++){
        element = document.createElement("li");
        element.classList.add("jyuki_view_container");
        element.style.left = String(400*i + 2*i) + "px";
        mago_element = document.createElement("div");
        mago_element.classList.add("jyuki_view");
        mago_element.id = "jyuki_view_" + String(i+1);
        element.appendChild(mago_element);
        preview_container.appendChild(element);
    }

    for(var i=0; i<goodslist.length; i++){
        loadjyukiview(i + 1);
    }
}

function loadjyukiview(jyuki_num){

    $("#jyuki_view_" + String(jyuki_num)).empty();

    for(var i=0; i<goodslist[jyuki_num-1].length; i++){
        loadtanaview(jyuki_num, i+1);
        loadtanasupporter(jyuki_num);
    }
}

function loadtanaview(jyuki_num, tana_num){
    var new_element1 = document.getElementById("tana_view_" + String(jyuki_num) + "_" + String(tana_num));
    var elementid;
    console.log(new_element1);
    if(new_element1 == null){
        oya_element = document.getElementById("jyuki_view_" + String(jyuki_num));
        new_element1 = document.createElement("div");
        elementid = "tana_view_" + String(jyuki_num) + "_" + String(tana_num);
        new_element1.id = elementid;
        new_element1.style.width = "100%";
        oya_element.appendChild(new_element1);
    }else{
        elementid = new_element1.id;
        console.log(elementid);
        $("#"+elementid).empty();
    }

    var max_height = 0;

    for(var i=0; i<goodslist[jyuki_num-1][tana_num-1].length/2; i++){

        var new_height = addgoodtotana(elementid, goodslist[jyuki_num-1][tana_num-1][2*i], goodslist[jyuki_num-1][tana_num-1][2*i+1]);
        if(new_height > max_height){
            max_height = new_height;
        }
    }
    element = document.getElementById(elementid);
    element.style.height = String(max_height) + "px";
}


function loadtanasupporter(jyuki_num){
    oya_element = document.getElementById("jyuki_view_" + String(jyuki_num));
    element = document.createElement("div");
    element.classList.add("tana_supporter");
    element.style.width = "100%";
    element.style.height = "20px";
    element.style.backgroundColor = "grey";
    oya_element.appendChild(element);
}
//商品を一つロードする関数。商品をdivでラップして、上に何個でも追加できるようにする
function addgoodtotana(parent_tana_id, good_id, number){
    oya_element = document.getElementById(parent_tana_id);
    var tana_height = GoodObjectDic[good_id].height * number;
    var tana_width = GoodObjectDic[good_id].width;
    element = document.createElement("div");
    element.style.height = String(tana_height) + "px";
    element.style.width = String(tana_width) + "px";
    element.style.display = "inline-block";


    for(var i=0; i<number; i++){

        mago_element = document.createElement("img");
        mago_element.src = "images/" + good_id + ".png";
        mago_element.width = GoodObjectDic[good_id].width;
        mago_element.height = GoodObjectDic[good_id].height;
        mago_element.style.display = "block";
        element.appendChild(mago_element);
    }
    oya_element.appendChild(element);
    return tana_height;

}

loadallview();

//以下modal をいじる
var clicked_item = 0;
var clicked_tana_id = 0;
$(document).on("click", ".addgood", function(){
    clicked_tana_id = $(this).attr('id');
    console.log(clicked_tana_id);
    var parent_element = document.getElementById("modal-content-wrapper");
    for(key in GoodObjectDic){
        addgoodcard(key, parent_element);
    }

    $('#modal_box').modal('show');
})


function addgoodcard(key, parent_element){

    var element = document.createElement("div");

    element.innerHTML = GoodObjectDic[key].name;
    element.value = key;
    element.id = "goodid_" + key;
    parent_element.appendChild(element);
    element.addEventListener('click', function(){

        if(clicked_item != 0){
            var pre_element = document.getElementById("goodid_" + clicked_item);
            pre_element.style.backgroundColor = "white";
        }

        clicked_item = key;
        element.style.backgroundColor = "#00BFFF";
    });
}

function closemodal(){
    $("#modal-content-wrapper").empty();
    clicked_item = 0;

}

function goodselectedinmodal(){
    if(clicked_item == 0){
        alert("商品をまず選択してください");
    }else{
        console.log(clicked_item);

        var splited_id = clicked_tana_id.split('_');
        goodslist[parseInt(splited_id[1])-1][parseInt(splited_id[2])-1].push(clicked_item);
        goodslist[parseInt(splited_id[1])-1][parseInt(splited_id[2])-1].push(1);
        hidegoods('tana_content_' + splited_id[1] + '_' + splited_id[2]);
        showgoods('tana_content_' + splited_id[1] + '_' + splited_id[2]);
        closemodal();
        $('#modal_box').modal('hide');
        loadtanaview(parseInt(splited_id[1]), parseInt(splited_id[2]));
    }
}
