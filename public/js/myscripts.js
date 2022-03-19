function loadbaitap(id) {
    var url = id;
    $.ajax({
        type: 'GET',
        url: url,
        success: function (data) {
            if (data != 'false') {
                // console.log(data);
                // $('#showbaitap').html(data);
            };
        }
    });
    return false;
}
function changeitem(item, url, id) {
    if (item.checked) {
        url = url + '/addquestion/' + id + '/baitap/' + item.value;
        $.ajax({
            type: 'GET',
            url: url,
            success: function (data) {
                if (data != 'false') {
                    $('#tabdebai').html(data);
                };
            }
        });
        return false;
    }
    else {
        url = url + '/removequestion/' + id + '/baitap/' + item.value;
        $.ajax({
            type: 'GET',
            url: url,
            success: function (data) {
                if (data != 'false') {
                    $('#tabdebai').html(data);
                };
            }
        });
        return false;
    }

}
function removeshowbaitap() {
    $('#removeshow').remove();
}
function showbaitap(id) {
    $('#' + id).show();
}
function hidebaitap(id) {
    $('#' + id).hide();
}
function onchangekhoi(url) {
    $('#theloai').html('<option value="">--</option>');
    var tag = document.getElementById('khoi');
    if (tag.value == '') {
        $('#chuong').html('<option value="">--</option>');
        return false;
    }
    var dai = document.getElementById('dai').value;
    url = url + tag.value + '/dai/' + dai;
    $.ajax({
        type: 'GET',
        url: url,
        success: function (data) {
            if (data != 'false') {
                var ex = '<option value="">--</option>';
                $('#chuong').html(ex + data);
            };
        }
    });
    return false;
}
function onchangechuong(url, tag) {
    if (tag.value == '') {
        $('#theloai').html('');
        return false;
    }
    url = url + tag.value;
    $.ajax({
        type: 'GET',
        url: url,
        success: function (data) {
            if (data != 'false') {
                var ex = '<option value="">--</option>';
                $('#theloai').html(ex + data);
            };
        }
    });
    return false;
}
function changeda(url) {
    // alert($('#tokenajax').value);
    var items = $('form#form-kq').serializeArray();
    var data = "";
    for(var i = 1; i<items.length; i++){
        data = data+"-"+items[i]['value'];
    }
    data = data.slice(1);
    $.ajax({
        url : url,
        type : "post",
        dataType:"text",
        data : {
            dapan : data
        },
        success : function (data){
            
        }
    });
}
function demnguoc(m) {
    alert("ok");
    // m--;
    // while(m>=0){
    //     var s = 59;
    //     for(s; s>0; s--){
    //         $('#remaining').html(m+" : "+ s);
    //         setTimeout(function(){
    //         }, 1000);
    //     }
    // }
}