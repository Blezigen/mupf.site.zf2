/**
 * Created by Front on 13.07.2016.
 */
function dark_disable () {
    _active(".makeup-modal","deactive");
};

function get_option(name_pack,name_template,id_section) {
    var container_option = $(".makeup-modal.option .makeup-modal-container");
    container_option.html("");
    $.ajax({
        url: 'index.php',
        type:"post",
        data: {
            action : "option",
            name_pack : name_pack,
            name_template : name_template,
            id_section : id_section
        },
        success:function (data) {
            container_option.html(data);
            $(".makeup-modal.option").toggleClass("active", true);
            $(".dark").fadeTo( "fast" , 0.3, function() { })
            $(".dark").bind("click",dark_disable);

        }
    });
}


function _active(selector,action) {
    if (action == "active"){
        $("body").append("<div class='dark'> </div>");
        $(".dark").fadeTo( "fast" , 0.2, function() {

        });
    }
    else if (action == "deactive"){
        $(".dark").unbind("click",dark_disable);
        $(".dark").fadeTo( "fast" , 0.2, function() {
            $(selector).toggleClass("active", false);
            $(".dark").fadeTo( "fast" , 0.0, function() {
                $(".dark").remove();
            })

        });
    }
    else {
        $(selector).toggleClass("active");
    }
}

$(document).ready(function () {
    $(".makeup-designer").on("click",".makeup-edit",function () {
        var name_pack = $(this).attr("name-pack");
        var name_template = $(this).attr("name-template");
        var id_section = $(this).attr("id-section");
        get_option(name_pack,name_template,id_section);
       _active(".makeup-modal.option","active");
    });
    $(".makeup-designer").on("click",".makeup-option",function () {
        _active(".makeup-modal.setting","active");
    });
    $(".makeup-designer").on("click",".makeup-remove",function () {
        _active(".makeup-modal.remove","active");
    });
});