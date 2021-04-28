$(document).ready(function(){
    $("#all_users").click(function(){
        var xhr_all = new XMLHttpRequest();
        xhr_all.open('POST', 'get_users.php', true);
        xhr_all.send();
        xhr_all.onreadystatechange = function(){
            if(xhr_all.readyState != 4){
                return;
            }

            if(xhr_all.status == 200){
                $("#ajax_container").html(xhr_all.responseText);
            }
        }

        return false;
    });
    $("#search_btn").click(function(){
        let genre = $("#genres option:selected").text();
        let year = $("#year option:selected").text();
        let min_age = $("#min_age option:selected").text();
        let search = $("#search_name").val();
        let xhr = new XMLHttpRequest();
        xhr.open('GET', 'films_selector.php?genre=' + genre + "&year=" + year + "&min_age=" + min_age + "&text=" + search);
        xhr.send();

        xhr.onreadystatechange = function(){
            if(xhr.readyState != 4){
                return;
            }
            if(xhr.status == 200){
                if(JSON.parse(xhr.responseText) == ""){
                    $(".catalog").html("Такого товара нет");
                } else {
                    let data = JSON.parse(xhr.responseText);
                    console.log(data);
                    $(".catalog").empty();
                    let k = 1;
                    let j = 1;
                    let o = j;
                    for(let i = 0; i < data.length; i++){
                        if(k == 1 || k % 4 == 1){
                            $(".catalog").append("<div class='rows' id='div" + j + "'>");
                            o = j;
                            j++;
                        }
                        $(`#div${o}`).append("<div class='good' id='good" + k + "'>");
                        $(`#good${k}`).append("<img src='../pict/" + data[i].photo + "'>");
                        $(`#good${k}`).append("<p>Название: " + data[i].name + "</p>");
                        $(`#good${k}`).append("<p>Анонс: " + data[i].intro +"</p>");
                        $(`#good${k}`).append("<p>Возрастной рейтинг: " + data[i].age_min +"+</p>");
                        $(`#good${k}`).append("<p>Жанр: " + data[i].genre +"</p>");
                        $(`#good${k}`).append("<p>Продолжительность: " + data[i].duration +"</p>");
                        $(`#good${k}`).append("<p>Год выпуска: " + data[i].year +"г.</p>");
                        k++;
                    }
                }
            }
        }
    });
    $("#delete_btn").click(function(){
        let name = $("#names option:selected").text();
        let xhr = new XMLHttpRequest();
        xhr.open('GET', 'film_delete.php?name=' + name);
        xhr.send();
        xhr.onreadystatechange = function(){
            if(xhr.readyState != 4){
                return;
            }
        
            if(xhr.status == 200){
                $("#info").html("<div id=good_authorisation>"+xhr.responseText+"</div>");
            }
        }
        setTimeout("window.location.reload()",5000);
        return false;
        });
        $(".bron").click(function()
        {
            let some_val=$(this).val();
            console.log(some_val);
            let xhr = new XMLHttpRequest();
        xhr.open('GET', 'check_auth_seans.php');
        xhr.send();
        xhr.onreadystatechange = function()
        {
            if(xhr.readyState != 4){
                return;
            }
        
            if(xhr.status == 200){
                if(JSON.parse(xhr.responseText) == "1")
                {
                window.location="select_places.php?id="+some_val;
                }
                else
                {
                    alert("Вы не авторизованы. Сейчас Вас перекинет на страницу авторизации");
                    window.location="authorisation.php";
                }
            }
        }
        });

        
})


