/**
 * Created by Front on 13.07.2016.
 */
function dark_disable () {
    _active(".makeup-modal","deactive");
};

function _active(selector,action) {
    if (action == "active"){
        $("body").append("<div class='dark'> </div>");
        $(".dark").fadeTo( "fast" , 0.2, function() {
            $(selector).toggleClass("active", true);
            $(".dark").fadeTo( "fast" , 0.3, function() { })
            $(".dark").bind("click",dark_disable);
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
       _active(".makeup-modal.option","active");
    });
    $(".makeup-designer").on("click",".makeup-option",function () {
        _active(".makeup-modal.setting","active");
    });
    $(".makeup-designer").on("click",".makeup-remove",function () {
        _active(".makeup-modal.remove","active");
    });
});