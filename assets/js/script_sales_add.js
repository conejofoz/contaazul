function selectClient(obj){
    var id = $(obj).attr('data-id');
    var name = $(obj).html();
    
    $('.searchresults').hide();
    $('#client_name').val(name);
    $('#client_name').attr('data_id', id);
}

$(function () {
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
                        html += '<div class="si"><a href="javascript:;" onclick="selectClient(this)" data-id="'+json[i].id+'">' + json[i].name + '</a></div>';
                    }

                    $('.searchresults').html(html);
                    $('.searchresults').show();
                }
            });
        }

    });
});