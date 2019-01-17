
$(document).ready(function(){
    $(function(){
        $('#thongbao').hide(5000);
    });

});
function xoa(msg) {
    if(window.confirm(msg)){
        return true;
    }
    return false;
};

$(document).ready(function(){
    $("a#del_product").on('click',function () {
        var url ="http://minhhao.vn/admin/product/delimg/";
        var idImage = $(this).parent().find("img").attr("idImage");
        var rid = $(this).parent().find("img").attr("id");
        var _tonken =$("form[name='frmEditPro']").find("input[name='_token']").val();
        $.ajax({
            url:url+idImage,
            type:'GET',
            data:{"_token":_tonken,"idImage":idImage},
            success:function (data) {
                if (data=="OK") {
                    $("#"+rid).remove();
                }else {
                    alert("ERROR");
                }
            }
        })


    })

});

















