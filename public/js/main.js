// (function(window, $){
    function removeAccents(str) {
        return str.normalize('NFD')
            .replace(/[\u0300-\u036f]/g, '')
            .replace(/đ/g, 'd').replace(/Đ/g, 'D').replace(/\s/g, '_').replace(/\W/g, '').replace(/_/g, '-').toLowerCase();
    }

    function readURL(input, selector) {
        if (input.files && input.files[0]) {
            let reader = new FileReader();

            reader.onload = function (e) {
                $(selector).attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
function readMultipleImage(input, selector) {
    selector.html(`<img src="http://placehold.it/100x100" alt="your image"
                                     style="max-width: 200px;margin-bottom: 20px;" class="img-fluid"/>`);
    if (input.files && input.files.length > 0) {
        selector.html('');
        for(let i = 0; i < input.files.length; i++){
            let reader = new FileReader();
            reader.onload = function (e) {
                selector.append(`<img src="${e.target.result}" title="${ input.files[i].name }" class="img-fluid w-100">`);
            };
            reader.readAsDataURL(input.files[i]);
        }
    }
}
function scrollToElement(element){
    $('html, body').animate({
        scrollTop: $(element).offset().top
    }, 500);
}
if($('#login').length > 0)
    scrollToElement('#login');
if($('#register').length > 0)
    scrollToElement('#register');



function formatNumber(num) {
    return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
}
// })(window, jQuery);
