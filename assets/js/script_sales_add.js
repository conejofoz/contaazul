function selectClient(obj) {
    var id = $(obj).attr('data-id');
    var name = $(obj).html();

    $('.searchresults').hide();
    $('#client_name').val(name);
    $('input[name=client_id]').val(id);
}



function addProd(obj){
    var id = $(obj).attr('data-id');
    var name = $(obj).attr('data-name');
    var price = $(obj).attr('data-price');
    var tr = 
            '<tr>'+
                '<td>'+name+'</td>'+
                '<td></td>'+
                '<td>'+price+'</td>'+
                '<td></td>'+
                '<td><a href="javascript:;" onclick="">Excluir</a></td>'+
            '</tr>';
    $('.searchresults').hide();
    $('#products_table').append(tr); //jogo da velha patiei
}




$(function () {

    $('input[name=total_price]').mask('000.000.000.000.000,00', {reverse: true, placeholder: "0,00"});

    $('.client_add_button').on('click', function (e) {
        e.preventDefault();
        var name = $('#client_name').val();
        if (name != '' && name.length >= 4) {
            if (confirm('Você deseja adicionar um cliente com nome: ' + name + ' ?')) {

                $.ajax({
                    url: BASE_URL + '/ajax/add_client',
                    type: 'POST',
                    data: {name: name},
                    dataType: 'jason',
                    success: function (json) {
                        $('.searchresults').hide();
                        $('input[name=client_id]').val(json.id);
                    }
                });
                return false;
            }
        }
    });



    $('#client_name').on('keyup', function () {

        var datatype = $(this).attr('data-type');
        var q = $(this).val();

        if (datatype != '') {
            $.ajax({
                url: BASE_URL + '/ajax/' + datatype,
                type: 'GET',
                data: {qz: q}, //estava dando conflito com o q do htaccess por isso mudei para qz
                dataType: 'json',
                success: function (json) {
                    if ($('.searchresults').length == 0) {
                        $('#client_name').after('<div class="searchresults"></div>');
                    }
                    $('.searchresults').css('left', $('#client_name').offset().left + 'px');
                    $('.searchresults').css('top', $('#client_name').offset().top + $('#client_name').height() + 3 + 'px');

                    var html = '';

                    for (var i in json) {
                        html += '<div class="si"><a href="javascript:;" onclick="selectClient(this)" data-id="' + json[i].id + '">' + json[i].name + '</a></div>';
                    }

                    $('.searchresults').html(html);
                    $('.searchresults').show();
                }
            });
        }

    });



    $('#add_prod').on('keyup', function () {

        var datatype = $(this).attr('data-type');
        var q = $(this).val();

        if (datatype != '') {
            $.ajax({
                url: BASE_URL + '/ajax/' + datatype,
                type: 'GET',
                data: {qz: q}, //estava dando conflito com o q do htaccess por isso mudei para qz
                dataType: 'json',
                success: function (json) {
                    if ($('.searchresults').length == 0) {
                        $('#add_prod').after('<div class="searchresults"></div>');
                    }
                    $('.searchresults').css('left', $('#add_prod').offset().left + 'px');
                    $('.searchresults').css('top', $('#add_prod').offset().top + $('#add_prod').height() + 3 + 'px');

                    var html = '';

                    for (var i in json) {
                        html += '<div class="si"><a href="javascript:;" onclick="addProd(this)" data-id="' + json[i].id + '" data-price="'+json[i].price+'" data-name="'+json[i].name+'">' + json[i].name + ' - R$ '+json[i].price+'</a></div>';
                    }

                    $('.searchresults').html(html);
                    $('.searchresults').show();
                }
            });
        }

    });
});
