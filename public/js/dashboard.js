$(function () {

    var entrie = 0;
    var exit = 0;
    var entrie_o = 0;
    var exit_o = 0;
    var result = 0;
    var result_o = 0;

    $.ajax(
        entrada1(),
        saida1(),
        entrada2(),
        saida2()
    )


    //retorna valor para a div entries do card entradas dos dízimos de períodos em abertos
    function entrada1(){
        $.ajax({
            type: "GET",
            url: "sum?status=1&operation=1&caixa=1&closing_status=1",
            dataType: "json",
            success: function (response) {
                entrie = response;
                $("#entries").html('R$' + number_format(entrie,2,',','.'));
                
            }
        })
        return entrie;
    }

    //retorna valor para a div exits do card saídas
    function saida1(){
        $.ajax({
            type: "GET",
            url: "sum?status=1&operation=2&caixa=1&closing_status=1",
            dataType: "json",
            success: function (response) {
                exit = response;
                $("#exits").html('R$' + number_format(exit,2,',','.')); 
                
            }
        })
        return exit;  
    } 
    
    //retorna o valor do card saldo dos dízímos de períodos em abertos
    $.ajax({
        success: function (response) {
            result = entrada1()-saida1();
            $("#balance").html('R$' + number_format(result,2,',','.'));
        }
    })
    


    //retorna valor para a div entries do card entradas das ofertas
    function entrada2(){
        $.ajax({
            type: "GET",
            url: "sum?status=1&operation=1&caixa=2&closing_status=1",
            dataType: "json",
            success: function (response) {
                entrie_o = response;
                $("#entries_o").html('R$' + number_format(entrie_o,2,',','.'));
            }
        })
        return entrie_o
    }
    

    //retorna valor para a div exits do card saídas 
    function saida2(){
        $.ajax({
            type: "GET",
            url: "sum?status=1&operation=2&caixa=2&closing_status=1",
            dataType: "json",
            success: function (response) {
                exit_o = response;
                $("#exits_o").html('R$' + number_format(exit_o,2,',','.'));
                
            }
        })
        return exit_o
    }
    
    //retorna o valor do carda saldo das ofertas
    $.ajax({
        success: function (response) {
            result_o = entrada2() - saida2();
            $("#balance_o").html('R$' + number_format(result_o,2,',','.'));
        }
    })

    


    //retorna lançamentos pendentes dos dízimos
    $.ajax({
        type: "GET",
        url: "pend?status=0&caixa=1",
        dataType: "json",
        success: function (response) {
            $("#pend").html(response);
        }
    })

    //retorna lançamentos pendentes das ofertas
    $.ajax({
        type: "GET",
        url: "pend?status=0&caixa=2",
        dataType: "json",
        success: function (response) {
            $("#pend_o").html(response);
        }
    })



})