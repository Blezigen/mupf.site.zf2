/**
 * Created by Front on 13.07.2016.
 */
function dark_disable () {
    _active(".makeup-modal","deactive");
};

function loading_screen () {
    $("body").append("<div class='makeup-load'></div>");
    $.ajax({
       url:"view/controls/preloader.phtml",
       success: function (data) {
           $(".makeup-load").html(data);
           Bricks();
           $(".makeup-load").fadeTo( "fast" , 1.0 , function() {

           });
       }
    });


};
function complete_screen () {
    $(".makeup-load").fadeTo( "slow" , 0.0, function() {
        $(".makeup-load").remove();
    })
};

function get_option(name_pack,name_template,id_section) {
    var container_option = $(".makeup-modal.option .makeup-modal-container .makeup-modal-body");
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
        beforeSend : loading_screen,
        success:function (data) {
            complete_screen();
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