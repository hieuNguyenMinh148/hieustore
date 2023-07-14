

$(function(){
	// Modal
	$('button.delete').click(function (e) {
		e.preventDefault();
		var dataUrl = $(this).attr('data-url');
		$('#exampleModal a').attr('href', dataUrl);
	});

    $(".product-container").hover(function(){
        $(this).children(".button-product-action").toggle(400);
    });

    // Display or hidden button back to top
    $(window).scroll(function() { 
		 if ($(this).scrollTop()) { 
			 $(".back-to-top").fadeIn();
		 } 
		 else { 
			 $(".back-to-top").fadeOut(); 
		 } 
	 }); 

    // Khi click vào button back to top, sẽ cuộn lên đầu trang web trong vòng 0.8s
	 $(".back-to-top").click(function() { 
		$("html").animate({scrollTop: 0}, 800); 
	 });

	 // Hiển thị form đăng ký
	 $('.btn-register').click(function () {
	 	// $('#modal-login').modal('hide');
        $('#modal-register').modal('show');
    });

	 // Hiển thị form đăng nhập
	$('.btn-login').click(function () {
    	$('#modal-login').modal('show');
    });

	// Fix add padding-right 17px to body after close modal
	// Don't rememeber also attach with fix css
	$('.modal').on('hide.bs.modal', function (e) {
        e.stopPropagation();
        $("body").css("padding-right", 0);
        
    });

    // Hiển thị cart dialog
    $('.btn-cart-detail').click(function () {
    	$('#modal-cart-detail').modal('show');
    });

	$('.btn-outline-inverse').click(function () {
    	$('#modal-product-detail').modal('show');
    });

	$('input[name=checkout]').click(function(event) {
        /* Act on the event */
        window.location.href="dat-hang.php";
    });

	$('.btn-ok').click(function () {
    	window.location.href="../bill.php";
    });
});

// Paging
function goToPage(page) {
    var fullUrl = getUpdatedParam("page", page);
    window.location.href = fullUrl;
}

