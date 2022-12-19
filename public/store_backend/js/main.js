/*  ==========================================
    SHOW UPLOADED IMAGE
* ========================================== */
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#imageResult')
                .attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

$(document).ready(function () {
    $("#upload").change(readURL);

    if ($('.tooltip-content').length){
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    }
    //click action trang product
    $('.setting-custom .dropdown-toggle').click(function () {
        // Kiểm tra có phải click vào menu đã active ko
        // nếu phải thì ko làm gì, ngược lại sẽ xử lý xổ menu con ra
        if ($(this).parent().hasClass("active")) {
            $('.setting-custom .dropdown').removeClass('active');
            $('body .overlay-block').removeClass('active');
        } else {
            // Xóa class active khỏi các thẻ li khác
            $('.setting-custom .dropdown').removeClass('active');
            // Thêm class selected vào thẻ li hiện tại
            $(this).parent().addClass("active");
            $('.overlay-block').addClass('active');
            $('body .overlay-block').click(function () {
                $('body .overlay-block').removeClass('active');
                $('.setting-custom .dropdown').removeClass('active');
            })
            $('.delete-product').click(function (e) {
                $('.setting-custom .dropdown').removeClass('active');
                $('body .overlay-block').removeClass('active');
            })
        }
        // return false nghĩa là cho trang đứng im
        return false;
    });
    //Mô tả sp ck
    // if ($('#upload').length){
    //     Dropzone.options.imageUpload = {
    //         maxFilesize         :       1,
    //         acceptedFiles: ".jpeg,.jpg,.png,.gif"
    //     };
    // }
    $(document).on('click','.delete-product',function(){
        var product_name=$(this).attr('data-name'),product_id=$(this).attr('data-id');
        $('#product_name').val(product_name);
        $('#product_id').val(product_id);
        $('#question').html('Bạn có chắc chắn muốn xóa:' +product_name+'?');
    });
});
function numberFomart(nStr) {
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}
function readURL() {
    var $input = $(this);
    if (this.files && this.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $input.parent().next().find('#imageResult').attr('src', e.target.result).show();
        }
        reader.readAsDataURL(this.files[0]);
    }
}
// //Format Number When typing
// var $form = $( ".card-body" );
// var $input = $form.find( ".price-change" );
//
// $input.on( "keyup", function( event ) {
//     // When user select text in the document, also abort.
//     var selection = window.getSelection().toString();
//     if ( selection !== '' ) {
//         return;
//     }
//     // When the arrow keys are pressed, abort.
//     if ( $.inArray( event.keyCode, [38,40,37,39] ) !== -1 ) {
//         return;
//     }
//     var $this = $( this );
//
//     // Get the value.
//     var input = $this.val();
//
//     var input = input.replace(/[\D\s\._\-]+/g, "");
//     input = input ? parseInt( input, 10 ) : 0;
//
//     $this.val( function() {
//         return ( input === 0 ) ? "" : input.toLocaleString( "en-US" );
//     } );
// });


