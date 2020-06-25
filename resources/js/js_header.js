
  // --------------------HEADER ONSCROLL--------------------
  var navTop = $("header");
  var navMain = $(".hidden-header");

  window.onscroll = function sticky() {
    if (window.pageYOffset > navMain[0].offsetTop) {
      navTop[0].classList.add("hd");
      // $("header").css("margin-top", "10px");
      navMain[0].classList.remove("hd");
    } else {
      navTop[0].classList.remove("hd");
      // $("header").css("margin-top", "0px");
      navMain[0].classList.add("hd");
    }
  }
// --------------------HEADER ONSCROLL--------------------


// --------------------DROPDOWN HEADER--------------------
  $(document).on("mouseenter", "nav li:first-child", function () {

    $(this).find(".dropdown-outer").show();

  });

  $(document).on("mouseleave", ".dropdown-outer:visible", function () {

    $(this).hide();

  });
// --------------------DROPDOWN HEADER--------------------


// --------------------OWL CAROUSEL--------------------
$(".owl-carousel").owlCarousel({
                  items: 4,
                  margin: 15,
                  loop: true,
                  center: true,
                  dots: false,
                  autoWidth:true,
                  // nav: true,
                  autoplay: true,
                  autoplayTimeout: 2000
                  // navText : ['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>']
                });
// --------------------OWL CAROUSEL--------------------
