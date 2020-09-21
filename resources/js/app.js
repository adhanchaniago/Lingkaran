require('./bootstrap');
require('datatables.net-bs4');

try {
    // Mengambil tinggi body pada browser
    const tinggi = $(window).height() / 2;

    // Membuat fungsi scroll ditampilkan navbar sticky-top
    $(window).on('scroll', function () {
        if ($(this).scrollTop() > tinggi) {
            $('#nav-sticky').addClass('sticky-top');
        } else {
            $('#nav-sticky').removeClass('sticky-top');
        }
    });

    // Membuat fungsi scroll ditampilkan Tombol Back-top
    $(window).on('scroll', function () {
        if ($(this).scrollTop() > tinggi) {
            $('#back-top').addClass('active');
        } else {
            $('#back-top').removeClass('active');
        }
    });

    // Membuat fungsi scroll to top
    $('#back-top').on('click', function () {
        $('html, body').animate({
            scrollTop: 0
        }, 300);
    });
} catch (error) {
    console.log(error);
}
