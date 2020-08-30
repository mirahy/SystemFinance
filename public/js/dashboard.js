$(function () {

    var entrie = 0;
    var exit = 0;
    var entrie_o = 0;
    var exit_o = 0;
    var result = 0;
    var result_o = 0;


    //retorna valor para a div entries do card entradas dos dízimos
    $.ajax({
        type: "GET",
        url: "sum?status=1&operation=1&caixa=1",
        dataType: "json",
        success: function (response) {
            entrie = response;
            $("#entries").html('R$' + response);
        }
    })

    //retorna valor para a div exits do card saídas e retorna o valor do carda saldo dos dízímos
    $.ajax({
        type: "GET",
        url: "sum?status=1&operation=2&caixa=1",
        dataType: "json",
        success: function (response) {
            $("#exits").html('R$' + response);
            exit = response;
            result = entrie - exit;
            $("#balance").html('R$' + result);
        }
    })

    //retorna valor para a div entries do card entradas das ofertas
    $.ajax({
        type: "GET",
        url: "sum?status=1&operation=1&caixa=2",
        dataType: "json",
        success: function (response) {
            entrie_o = response;
            $("#entries_o").html('R$' + response);
        }
    })

    //retorna valor para a div exits do card saídas e retorna o valor do carda saldo das ofertas
    $.ajax({
        type: "GET",
        url: "sum?status=1&operation=2&caixa=2",
        dataType: "json",
        success: function (response) {
            $("#exits_o").html('R$' + response);
            exit_o = response;
            result_o = entrie_o - exit_o;
            $("#balance_o").html('R$' + result_o);
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