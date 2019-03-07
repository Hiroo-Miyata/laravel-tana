<!DOCTYPE html>

<html lang="ja">
    <head>

        <meta charset="utf-8">
        <meta name = "viewport" content = "width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link rel="stylesheet" href="magnific-popup.css" />
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script type="text/javascript" src="/js/jquery.magnific-popup.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script type="text/javascript" src="/js/Sortable.js"></script>
        <script>
            var goodslist = @json($array);
            var GoodObjectDic = @json($goodObjectDic);
            console.log(goodslist);
            console.log(GoodObjectDic);
        </script>
    </head>

    <body>
      <div class="modal fade" id="modal_box">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="box_inner">
                          <div class="modal-wrap">
                              <div class="modal-search">
                                  <input type="text" class="modal-searchTerm" placeholder="search...">
                                  <button type="submit" class="modal-searchButton">
                                      <i class="fa fa-search"></i>
                                  </button>
                              </div>
                          </div>

                          <div id = "modal-content-wrapper"></div>

                      <p class="text-center"><a class="btn btn-primary" id="goodselectbutton" href="#" onclick="goodselectedinmodal()" value="q">選択</a><a class="btn btn-primary" data-dismiss="modal" href="#" onclick="closemodal()">閉じる</a></p>
                  </div>
              </div>
          </div>
      </div>
        <div id="container">
            <div id="main" class="row">
                <div id="left" class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div id="left-body" class="box">
                      <div id="left-body-container-head" class="box-header">
                        <div class="btn-group">
                            <a class="btn btn-info" title="Save" style="color: white;"><i class="fa fa-save"></i><span class="hidden-sm">&nbsp;Save</span></a>
                        </div>
                      </div>
                      <div id="left-body-container-body" class="sortable dd">

                      </div>
                    </div>
                </div>

                <div id="right" class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
                    <div id="jyuki-container">
                        <div id="jyuki">
                            <ul id="right-container">

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <style>

            #popup_deltana{
                background-color: #fff;
                width:60%;
                height:30%;
                margin: 30px auto;
                padding:20px;
                box-sizing: border-box;
            }


            #popup_deljyuki{
                background-color: #fff;
                width:60%;
                height:30%;
                margin: 30px auto;
                padding:20px;
                box-sizing: border-box;
            }

            html, body, #container, #main, #left, #right, #left-body, #juki-container, #left-body, #jyuki-container, #left-body-container{
                height:100%;
            }

            body {
              font-family: 'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif;
              font-size: 13px;
            }

            #left-body {
              font-weight: bold;
            }

            #left-body-container-body{
                overflow-y:scroll;
                width: 100%
            }

            #left-body-container-body::-webkit-scrollbar{
                height:10px;
            }
            #left-body-container-body::-webkit-scrollbar-track{
                background: transparent;
                border:none;
            }
            #left-body-container-body::-webkit-scrollbar-thumb{
                background: rgba(#fff, 0.1);
                border-radius:10px;
                box-shadow: inset 0 0 4px rgba(255,255,255,0.8);
            }

            #jyuki{
                background-color: azure;
                height:95%;
            }

            .icon {
              margin-left: 1em;
              margin-right: 0.3em;
            }

            .fa-plus {
              color: #e08e0b
            }

            .flex_wrapper {
              padding: 8px 0;
              border: 1px solid #ddd;
              border-radius: 5px;
              display: -webkit-flex;
              display: flex;
              align-items: center;
            }

            .good_flex_wrapper {
              margin: 1px 0 1px 1em;
              padding: 8px 0;
              border: 1px solid #ddd;
              border-radius: 5px;
              display: -webkit-flex;
              display: flex;
              align-items: center;
            }

            .jyuki_wrapper {
              margin: 1px 0;
              padding: 8px 0;
              border: 1px solid #ddd;
              border-radius: 5px;
              display: -webkit-flex;
              display: flex;
              align-items: center;
            }

            .jyuki_num{
              margin: 1px 0;
            }

            .jyuki_add{

            }

            .jyuki_num_content{

            }

            .jyuki_delete{
                margin-left: auto;
                margin-right: 1em;
                min-height: 10px;
                min-width: 10px;
                color: #3c8dbc;
            }

            .tana_num{
              margin: 1px 0 1px 1em;
            }
            .tana_content{

            }
            .tana_delete{
              margin-left: auto;
              margin-right: 1em;
              min-height: 10px;
              min-width: 10px;
              color: #3c8dbc;
            }
            .tana_add{

            }

            .goodwrapper {
              margin: 1px 0 1px 1em;
            }

            .goodelement{
              padding-left: 1em;
            }
            .count{
              margin-left: auto;
              display: -webkit-flex;
              display: flex;
              margin-right: 1em;
            }

            .show_num{

            }

            .btns{
              justify-content: center;
            }

            .plus_btn{
              padding: 0 3px 0 6px;
            }
            .minus_btn{
              padding: 0 0 0 3px;
            }

            .addgood{

            }

            #right-container{
                overflow-x: scroll;
                white-space: nowrap;
                -webkit-overflow-scrolling: touch;
                height: 100%;
                width: 100%;
                min-height: 700px;
                background-color:black;
                padding:3px;
                position: relative;

            }

            #right-container::-webkit-scrollbar{
                width:10px;
            }
            #right-container::-webkit-scrollbar-track{
                background: transparent;
                border:none;
            }
            #right-container::-webkit-scrollbar-thumb{
                background: rgba(rgb(81, 12, 209), 0.1);
                border-radius:10px;
                box-shadow: inset 0 0 4px rgba(255,255,255,0.8);
            }

            .jyuki_view_container{
                display: inline-block;
                height: 100%;
                width: 400px;
                background-color: black;
                margin:1px;
                padding:2px;
                position: absolute;
                border:solid;
            }

            .jyuki_view{
                height: 100%;
                widows: 100%;
            }

            .modal-wrap{
                width: 100%;
            }

            .modal-search{
                width: 60%;
                margin-left: auto;
                margin-right: auto;
                position: relative;
            }

            .modal-searchTerm{
                width: 80%;
                display: inline-block;
            }

            .modal-searchButton{
                display: inline-block;
            }

            .modal-content-wrapper{
                width: 100%;
            }

            #modal_box {

            }


        </style>

        <script>
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
                wrapper = document.createElement("div");
                wrapper.classList.add("flex_wrapper");
                add_element = document.createElement("div");
                add_element.classList.add('jyuki_add');
                add_element.innerHTML = "什器を追加";
                wrapper.appendChild(add_element);
                oya_element.appendChild(wrapper);
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
                wrapper = document.createElement("div");
                wrapper.classList.add("good_flex_wrapper");
                icon = document.createElement("i");
                icon.classList.add("icon");
                icon.classList.add("fa");
                icon.classList.add("fa-plus");
                wrapper.appendChild(icon);
                element = document.createElement("div");
                element.classList.add("tana_add");
                element.innerHTML = "棚を追加";
                wrapper.appendChild(element);
                oya_element.appendChild(wrapper);

            }


            function hidetana(id){
                oya_element = document.getElementById("jyuki_" + id.split('_')[2]);
                var hoge = oya_element.childElementCount;
                for(var i=0; i<hoge-1; i++){
                    oya_element.removeChild(oya_element.lastChild);
                }
            }

            function createjyukiel(jyuki_number, parent){
              element = document.createElement("div");
              element.classList.add("jyuki_num");
              element.id = 'jyuki_' + String(jyuki_number);
              parent.appendChild(element);
              wrapper = document.createElement("div");
              wrapper.classList.add("flex_wrapper");
              element.appendChild(wrapper);
              icon = document.createElement("i");
              icon.classList.add("icon");
              icon.classList.add("fa");
              icon.classList.add("fa-caret-right");
              wrapper.appendChild(icon);
              mago_element = document.createElement("div");
              mago_element.classList.add('jyuki_num_content');
              mago_element.innerHTML = "什器" + String(jyuki_number);
              mago_element.id = "jyuki_content_" + String(jyuki_number);
              wrapper.appendChild(mago_element);
              delete_button = document.createElement("i");
              delete_button.classList.add("jyuki_delete");
              delete_button.classList.add("fa");
              delete_button.classList.add("fa-trash");
              delete_button.id = "del_jyu_" + String(jyuki_number);
              delete_button.setAttribute("data-mfp-src", "#popup_deljyuki");
              wrapper.appendChild(delete_button);
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
                wrapper = document.createElement("div");
                wrapper.classList.add("flex_wrapper");
                element.appendChild(wrapper);
                icon = document.createElement("i");
                icon.classList.add("icon");
                icon.classList.add("fa");
                icon.classList.add("fa-caret-right");
                wrapper.appendChild(icon);
                mago_element = document.createElement("div");
                mago_element.classList.add("tana_content");
                mago_element.innerHTML = "棚" + String(tana_number);
                mago_element.id = "tana_content_" + String(jyuki_number) + "_" + String(tana_number);
                wrapper.appendChild(mago_element);
                delete_button = document.createElement("i");
                delete_button.classList.add("tana_delete");
                delete_button.classList.add("fa");
                delete_button.classList.add("fa-trash");
                delete_button.id = "del_tana_" + String(jyuki_number) + "_" + String(tana_number);
                delete_button.setAttribute("data-mfp-src", "#popup_deltana");
                wrapper.appendChild(delete_button);
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
                wrapper = document.createElement("div");
                wrapper.classList.add("flex_wrapper");
                icon = document.createElement("i");
                icon.classList.add("icon");
                icon.classList.add("fa");
                icon.classList.add("fa-plus");
                wrapper.appendChild(icon);
                add_element = document.createElement("div");
                add_element.classList.add('jyuki_add');
                add_element.innerHTML = "什器を追加";
                wrapper.appendChild(add_element);
                jyuki_element.appendChild(wrapper);
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
                wrapper = document.createElement("div");
                wrapper.classList.add("good_flex_wrapper");
                element = document.createElement("div");
                element.classList.add("addgood");
                element.innerHTML = "商品を追加";
                element.id = "addgood_" + String(jyuki_num) + "_" + String(tana_num);
                wrapper.appendChild(element);
                oya_element.appendChild(wrapper);
            }

            //el_name は実質商品のidになった。
            function creategoodlist(parent, el_name, ver_count,jyuki_num, tana_num, good_num){
                element = document.createElement("div");
                element.classList.add("goodwrapper");
                element.id = "good_" + String(jyuki_num) + "_" + String(tana_num) + "_" + String(good_num);
                wrapper = document.createElement("div");
                wrapper.classList.add("flex_wrapper");
                mago_element = document.createElement("div");
                mago_element.classList.add("goodelement");
                mago_element.innerHTML = GoodObjectDic[el_name]["name"];
                mago_element.style.overflow = "hidden";
                wrapper.appendChild(mago_element);
                mago_element2 = document.createElement("div");
                mago_element2.classList.add("count");
                himago_element = document.createElement("div");
                himago_element.classList.add("show_num");
                himago_element.innerHTML = String(ver_count);
                mago_element2.appendChild(himago_element);
                himago_element2 = document.createElement("div");
                himago_element2.classList.add("btns");
                var plus_btn = document.createElement("i");
                var minus_btn = document.createElement("i");
                plus_btn.classList.add("fa");
                plus_btn.classList.add("fa-plus");
                plus_btn.classList.add("plus_btn");
                minus_btn.classList.add("fa");
                minus_btn.classList.add("fa-minus");
                minus_btn.classList.add("minus_btn");
                himago_element2.appendChild(plus_btn);
                himago_element2.appendChild(minus_btn);
                mago_element2.appendChild(himago_element2);
                wrapper.appendChild(mago_element2);
                element.appendChild(wrapper);
                parent.appendChild(element);
                addsortlistener(".tana_num", ".goodwrapper");

            }

            function hidegoods(id){
                var splited_id = id.split('_');
                var jyuki_num = parseInt(splited_id[2]);
                var tana_num = parseInt(splited_id[3]);
                oya_element = document.getElementById("tana_" + String(jyuki_num) + "_" + String(tana_num));
                var hoge = oya_element.childElementCount;
                for(var i=0; i<hoge-1; i++){
                    oya_element.removeChild(oya_element.lastChild);
                }
            }

            $(document).on("click", ".tana_add", function(){
                var oya_element_id = $(this).parent().parent().attr("id");
                oya_element = document.getElementById(oya_element_id);
                var jyuki_num = parseInt(oya_element_id.split("_")[1]);
                oya_element.removeChild(oya_element.lastChild);
                goodslist[jyuki_num-1].push([]);
                createtanael(jyuki_num, goodslist[jyuki_num-1].length, oya_element);
                wrapper = document.createElement("div");
                wrapper.classList.add("good_flex_wrapper");
                icon = document.createElement("i");
                icon.classList.add("icon");
                icon.classList.add("fa");
                icon.classList.add("fa-plus");
                wrapper.appendChild(icon);
                element = document.createElement("div");
                element.classList.add("tana_add");
                element.innerHTML = "棚を追加";
                wrapper.appendChild(element);
                oya_element.appendChild(wrapper);

                loadjyukiview(jyuki_num);
            });

            $(document).on("click", ".plus_btn", function(){
                var position = $(this).parent().parent().parent().parent().attr("id");
                oya_element = document.getElementById("position");
                var position_splt = position.split("_");
                goodslist[parseInt(position_splt[1])-1][parseInt(position_splt[2])-1][(parseInt(position_splt[3])-1)*2+1]++;
                var target = $("#" + position).find('.show_num')[0];
                target.innerHTML = String(parseInt(target.innerHTML)+1);

                loadtanaview(parseInt(position_splt[1]), parseInt(position_splt[2]));
            });

            $(document).on("click", ".minus_btn", function(){
                var position = $(this).parent().parent().parent().parent().attr("id");
                oya_element = document.getElementById("position");
                var position_splt = position.split("_");
                goodslist[parseInt(position_splt[1])-1][parseInt(position_splt[2])-1][(parseInt(position_splt[3])-1)*2+1]--;
                var target = $("#" + position).find('.show_num')[0];
                target.innerHTML = String(parseInt(target.innerHTML)-1);

                if (parseInt(target.innerHTML) == 0){
                    //0になったら削除する
                    hidegoods("tana_content_" + position_splt[1] + "_" + position_splt[2]);
                    goodslist[parseInt(position_splt[1])-1][parseInt(position_splt[2])-1].splice((parseInt(position_splt[3])-1)*2,2);

                    showgoods("tana_content_" + position_splt[1] + "_" + position_splt[2]);
                }

                loadtanaview(parseInt(position_splt[1]), parseInt(position_splt[2]));

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

                    var sortable = Sortable.create(new_element1,{
                        group:'shared_tanaview',
                        onEnd:function(evt){

                            //商品がドラッグアンドドロップされたときにgoodslist,棚の高さを更新する。1000行目あたりに記述
                            ongooddragged(evt.from.id, evt.to.id, evt.oldIndex, evt.newIndex);
                        }
                    });

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
                    mago_element.src = "https://s3-ap-northeast-1.amazonaws.com/laravel-photo-sampler/" + GoodObjectDic[good_id].goods_image_url;
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
                console.log(parent_element)
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


            //preview ドラッグ＆ドロップ
            function ongooddragged(id_from, id_to, index_from, index_to){
                id_from_splited = id_from.split('_');
                id_to_splited = id_to.split('_');

                var good_from_list = goodslist[parseInt(id_from_splited[2])-1][parseInt(id_from_splited[3])-1];
                var good_to_list = goodslist[parseInt(id_to_splited[2])-1][parseInt(id_to_splited[3])-1];

                var good_from_id;

                var good_from_index;

                if(id_from_splited[2] == id_to_splited[2]){
                    if(id_from_splited[3] == id_to_splited[3]){
                        good_from_id = good_from_list[2*index_from];
                        good_from_index = good_from_list[2*index_from+1];
                        good_from_list.splice(2*index_from,2);
                        good_from_list.splice(2*index_to,0,good_from_id, good_from_index);
                    }else{
                        good_from_id = good_from_list[2*index_from];
                        good_from_index = good_from_list[2*index_from+1];
                        good_from_list.splice(2*index_from,2);
                        good_to_list.splice(2*index_to, 0, good_from_id, good_from_index);
                        loadjyukiview(parseInt(id_from_splited[2]));
                    }
                }else{
                    good_from_id = good_from_list[2*index_from];
                    good_from_index = good_from_list[2*index_from+1];
                    good_from_list.splice(2*index_from,2);
                    good_to_list.splice(2*index_to, 0, good_from_id, good_from_index);
                    loadallview();
                }

                var hoge_from = "tana_content_" + id_from_splited[2] + "_" + id_from_splited[3];
                var hoge_to = "tana_content_" + id_to_splited[2] + "_" + id_to_splited[3];
                if(hoge_from == clicked_tana || hoge_to == clicked_tana){
                    hidegoods(clicked_tana);
                    showgoods(clicked_tana);
                }
            }


        </script>
    </body>
</html>
