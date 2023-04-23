$(function () {
  function mobileMenu() {
    const hamburgerButton = $("nav .hamburger span");
    const crossButton = $(".mobile-content .cross button");
    const mobileContainer = $(".mobile-menu");

    hamburgerButton.on("click", function () {
      mobileContainer.addClass("show");
    });

    crossButton.on("click", function () {
      mobileContainer.removeClass("show");
    });
  }

  function donation() {
    const donateButton = $(".donate");
    const donationCrossButton = $(".donation-widget .cross button");
    const donationContent = $(".donation-section");
    donateButton.on("click", function () {
      donationContent.fadeIn("slow");
    });
    donationCrossButton.on("click", function () {
      donationContent.fadeOut("slow");
    });
  }

  function bannerCarousel() {
    var owl = $(".banner-carousel");
    owl.owlCarousel({
      items: 1,
      loop: true,
      autoplay: true,
      autoplayTimeout: 5000,
      animateOut: "fadeOut",
    });
  }

  function aimsCarousel() {
    var owl = $(".aims-carousel");
    owl.owlCarousel({
      items: 3,
      loop: true,
      autoplay: true,
      animateOut: "fadeOut",
      autoplayHoverPause: true,
      nav: true,
      navText: [
        "<i class='fa fa-chevron-left'></i>",
        "<i class='fa fa-chevron-right'></i>",
      ],
      responsiveClass: true,
      responsive: {
        1280: {
          items: 3,
        },
        1024: {
          items: 2,
        },
        0: {
          items: 1,
        },
      },
    });
  }

  function articlesCarousel() {
    var owl = $(".articles-carousel");

    if (owl.hasClass("owl-carousel")) {
      owl.owlCarousel({
        items: 3,
        loop: true,
        autoplay: true,
        autoplayHoverPause: true,
        nav: true,
        navText: [
          "<i class='fa fa-chevron-left'></i>",
          "<i class='fa fa-chevron-right'></i>",
        ],
        responsiveClass: true,
        responsive: {
          1280: {
            items: 3,
          },
          1024: {
            items: 2,
          },
          0: {
            items: 1,
          },
        },
      });
    }
  }

  function headerScroll() {
    $(window).scroll(function () {
      if ($(this).scrollTop() > 100) {
        $("header").css("background-color", "white");
        $("header").addClass("shadow");
      }
      if ($(this).scrollTop() < 100) {
        $("header").css("background-color", "transparent");
        $("header").removeClass("shadow");
      }
    });
  }

  function milestoneCounter() {
    $(".milestone-counter-number").each(function () {
      const $this = $(this);
      let toValue = $this.data("to-value");
      let duration = $this.data("duration");
      let fromValue = $this.data("from-value");

      jQuery({ Counter: fromValue }).animate(
        { Counter: toValue },
        {
          duration: duration,
          easing: "swing",
          step: function () {
            $this.text(Math.ceil(this.Counter));
          },
        }
      );
    });
  }

  function scrollButtonHide() {
    const scrollButton = $(".scroll-button");
    $(window).scroll(function () {
      var scrollTop = $(window).scrollTop();
      if (scrollTop < 400) {
        scrollButton.fadeOut("slow");
      } else if (scrollTop > 400) {
        scrollButton.fadeIn("slow");
      }
    });
  }

  function form() {
    $(".contact-form").on("submit", function (e) {
      const form = $("form.contact-form");
      e.preventDefault();
      let formData = {
        action: "contact",
        name: $("#name").val(),
        email: $("#email").val(),
        subject: $("#subject").val(),
        message: $("#message").val(),
        "contact-security": $("#contact-security").val(),
      };

      $.ajax({
        type: "POST",
        dataType: "json",
        url: window.ruthcare23.ajaxurl,
        data: formData,
        success: function (response) {
          const alertsContainer = form.find(".alerts");
          let alertsMarkup = "";

          console.log(response);

          for (var i = 0; i < response.messages.length; i++) {
            alertsMarkup +=
              '<div class="alert alert-' +
              response.messages[i].type +
              ' rounded" role="alert">' +
              response.messages[i].message +
              "</div>";
          }

          alertsContainer.html(alertsMarkup);

          if (response.status) {
            form.find(".form-field").addClass("d-none");

            setTimeout(function () {
              window.location.reload();
            }, 4000);
          }
        },
      });
    });
  }

  function carouselAccessibility() {
    const carouselDot = $(".owl-dot");
    const carouselPrev = $(".owl-prev");
    const carouselNext = $(".owl-next");
    carouselDot.attr(
      "aria-label",
      "Carousel button for navigating the carousel"
    );
    carouselPrev.attr(
      "aria-label",
      "Carousel button for navigating the carousel"
    );
    carouselNext.attr(
      "aria-label",
      "Carousel button for navigating the carousel"
    );
  }

  $.fn.isInViewport = function () {
    let elementTop = $(this).offset().top;
    let elementBottom = elementTop + $(this).outerHeight();

    let viewportTop = $(window).scrollTop();
    let viewportBottom = viewportTop + window.innerHeight;

    return elementBottom > viewportTop && elementTop < viewportBottom;
  };

  $(document).ready(function () {
    mobileMenu();
    donation();
    bannerCarousel();
    aimsCarousel();
    articlesCarousel();
    headerScroll();
    scrollButtonHide();
    form();
    carouselAccessibility();
    let counter = true;
    $(window).scroll(function () {
      if ($(".milestones").isInViewport() && counter) {
        counter = false;
        milestoneCounter();
      }
    });
  });
});
