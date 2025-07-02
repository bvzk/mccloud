// Header class
import { Header } from "./header";
import { Accordion, Collapse, Dropdown } from "flowbite";


window.header = new Header();

// Set header position when wpadminbar exists
const wpadminbarInterval = setInterval(() => {
  if ($("#wpadminbar").length) {
    wpadminbarHeaderScrollPosition();
    $(window).scroll(function () {
      wpadminbarHeaderScrollPosition();
    });
    clearInterval(wpadminbarInterval);
  }
}, 300);
function wpadminbarHeaderScrollPosition() {
  const offsetTop = $("#wpadminbar").height() - $(window).scrollTop();
  $(".header").css({ top: offsetTop > 0 ? offsetTop + "px" : 0 });
}
// End set header position

// Video lazy loading
document.addEventListener("DOMContentLoaded", function () {
  var lazyVideos = [].slice.call(document.querySelectorAll("video.lazy"));

  if ("IntersectionObserver" in window) {
    var lazyVideoObserver = new IntersectionObserver(function (
      entries,
      observer
    ) {
      entries.forEach(function (video) {
        if (video.isIntersecting) {
          for (var source in video.target.children) {
            var videoSource = video.target.children[source];
            if (
              typeof videoSource.tagName === "string" &&
              videoSource.tagName === "SOURCE"
            ) {
              videoSource.src = videoSource.dataset.src;
            }
          }

          video.target.load();
          video.target.classList.remove("lazy");
          lazyVideoObserver.unobserve(video.target);
        }
      });
    });

    lazyVideos.forEach(function (lazyVideo) {
      lazyVideoObserver.observe(lazyVideo);
    });
  }
});
// End Video lazy loading

class Consult {
  open() {
    $(".consult-backdrop").removeClass("hidden");
    $(".consult-popup").removeClass("hidden");
    console.log("open");
  }
  close() {
    $(".consult-backdrop").addClass("hidden");
    $(".consult-popup").addClass("hidden");
  }
  send() {
    $(".get-consult-form").addClass("hidden");
    $(".get-consult-success").removeClass("hidden");
    $("html, body").animate(
      { scrollTop: $(".consult-form-wrapper").offset().top },
      500
    );
  }
  success() {
    $(".get-consult-form").removeClass("hidden");
    $(".get-consult-success").addClass("hidden");
    $("html, body").animate(
      { scrollTop: $(".consult-form-wrapper").offset().top },
      500
    );
  }
}

window.consult = new Consult();

jQuery(document).ready(function ($) {
  const resource = document.createElement("link");
  resource.setAttribute("rel", "stylesheet");
  resource.setAttribute(
    "href",
    "https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap"
  );
  resource.setAttribute("type", "text/css");
  const head = document.getElementsByTagName("head")[0];
  head.appendChild(resource);

  // Post text links target & rel attributes
  $(".publication a:not(.ez-toc-link)").each(function (i, el) {
    $(el).attr("target", "_blank");
    $(el).attr("rel", "noopener referrer");
  });

  $("#homeServicesSlider").slick({
    mobileFirst: true,
    arrows: false,
    variableWidth: true,
    touchThreshold: 1000,
    autoplay: true,
    autoplaySpeed: 5000,
  });

  $(".clients-slider").slick({
    mobileFirst: true,
    arrows: true,
    appendArrows: $(".clients-slider-arrows"), //$('.clients-slider-dots'),
    responsive: [
      {
        breakpoint: 1480,
        settings: {
          slidesToShow: 8,
          slidesToScroll: 8,
        },
      },
      {
        breakpoint: 1366,
        settings: {
          slidesToShow: 6,
          slidesToScroll: 6,
        },
      },
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 5,
          slidesToScroll: 5,
        },
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 4,
          slidesToScroll: 4,
        },
      },
      {
        breakpoint: 0,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
        },
      },
    ],
  });
  $(".clients-slider").slick("setPosition");
	console.log('clients-slider count:', $('.clients-slider').length);
	console.log('clients-slider offset:');

  $(".google-tab-slider").slick({
    mobileFirst: true,
    variableWidth: true,
    arrows: false,
    responsive: [
      {
        breakpoint: 991,
        settings: "unslick",
      },
      {
        breakpoint: 0,
      },
    ],
  });

  $(".cases-slider").slick({
    mobileFirst: true,
    variableWidth: true,
    arrows: false,
    responsive: [
      {
        breakpoint: 991,
        settings: "unslick",
      },
      {
        breakpoint: 0,
      },
    ],
  });

  $(".posts-slider").slick({
    mobileFirst: true,
    variableWidth: true,
    arrows: false,
    responsive: [
      {
        breakpoint: 991,
        settings: "unslick",
      },
      {
        breakpoint: 0,
      },
    ],
  });

  $(".similar-posts-slider").slick({
    mobileFirst: true,
    arrows: true,
    appendArrows: $(".similar-posts-slider-arrows"), //$('.clients-slider-dots'),
    responsive: [
      {
        breakpoint: 1366,
        settings: {
          variableWidth: false,
          slidesToShow: 3,
          slidesToScroll: 3,
        },
      },
      {
        breakpoint: 0,
        settings: {
          variableWidth: true,
        },
      },
    ],
  });

  $(".advantages-slider").slick({
    mobileFirst: true,
    dots: true,
    arrows: true,
    prevArrow: $('.adv-arrow-prev'),
    nextArrow: $('.adv-arrow-next'),
    adaptiveHeight: true,
    responsive: [
      {
        breakpoint: 991,
        settings: "unslick",
      },
      {
        breakpoint: 0,
      },
    ],
  });

  $(".plans-slider").slick({
    mobileFirst: true,
    dots: true,
    arrows: true,
    prevArrow: $('.pricing-arrow-prev'),
    nextArrow: $('.pricing-arrow-next'),
    adaptiveHeight: true,
    responsive: [
      {
        breakpoint: 991,
        settings: "unslick",
      },
      {
        breakpoint: 0,
      },
    ],
  });

  $(".plan-features-slider").slick({
    mobileFirst: true,
    dots: true,
    arrows: true,
    prevArrow: $('.plan-features-arrow-prev'),
    nextArrow: $('.plan-features-arrow-next'),
    adaptiveHeight: true,
    responsive: [
      {
        breakpoint: 991,
        settings: "unslick",
      },
      {
        breakpoint: 0,
      },
    ],
  });

  $(".default-slider").slick({
    mobileFirst: true,
    dots: true,
    arrows: true,
    prevArrow: $('.default-arrow-prev'),
    nextArrow: $('.default-arrow-next'),
    adaptiveHeight: true,
    responsive: [
      {
        breakpoint: 991,
        settings: "unslick",
      },
      {
        breakpoint: 0,
      },
    ],
  });

  $(".default-second-slider").slick({
    mobileFirst: true,
    dots: true,
    arrows: true,
    prevArrow: $('.default-second-arrow-prev'),
    nextArrow: $('.default-second-arrow-next'),
    adaptiveHeight: true,
    responsive: [
      {
        breakpoint: 991,
        settings: "unslick",
      },
      {
        breakpoint: 0,
      },
    ],
  });

  function initSlickSlider(el) {
    $(el).slick("unslick");
    $(el).slick({
      mobileFirst: true,
      dots: true,
      arrows: false,
      adaptiveHeight: true,
      responsive: [
        {
          breakpoint: 991,
          settings: "unslick",
        },
        {
          breakpoint: 0,
        },
      ],
    });
  }

  function initSlickSliderVariableWith(el) {
    $(el).slick("unslick");
    $(el).slick({
      mobileFirst: true,
      variableWidth: true,
      arrows: false,
      responsive: [
        {
          breakpoint: 991,
          settings: "unslick",
        },
        {
          breakpoint: 0,
        },
      ],
    });
  }

  $(window).on("resize orientationchange", function () {
    $(".google-tab-slider").slick("resize");
    $(".cases-slider").slick("resize");
    $(".advantages-slider").slick("resize");
    $(".plans-slider").slick("resize");
    $(".plan-features-slider").slick("resize");

    initSlickSlider($(".default-slider"));
  });

  $("[data-tabs-target]").click(function () {
    setTimeout(() => {
      initSlickSliderVariableWith($(".google-tab-slider"));
      initSlickSlider($(".plans-slider"));
    }, 30);
  });

  $(".footer__collapse .footer__collapse-toggle").click(function (e) {
    $(this)
      .parent()
      .find(".footer__collapsed")
      .toggleClass("footer__collapsed_open");
  });

  $("[data-spinback-usage-image]").click(function () {
    $("[data-spinback-usage-image]")
      .removeClass("border-customlightGray")
      .addClass("border-[#F2F2F7]");
    $(this).removeClass("border-[#F2F2F7]").addClass("border-customlightGray");
    $("[data-spinback-usage-image-preview]").css(
      "background-image",
      "url(" + $(this).data("spinback-usage-image") + ")"
    );
  });
});

var captchaLoaded = false;
$(document).ready(function () {
  //Load reCAPTCHA script when CF7 form field is focused
  $(".wpcf7-form input").on("focus", function () {
    // If we have loaded script once already, exit.
    if (captchaLoaded) {
      return;
    }

    // Variable Intialization
    var head = document.getElementsByTagName("head")[0];
    var recaptchaScript = document.createElement("script");
    var cf7script = document.createElement("script");

    // Add the recaptcha site key here.
    var recaptchaKey = "6LerUTEaAAAAAOZ8Ym-ilxGuRPjMQLDc5QP7kqLK";

    // Dynamically add Recaptcha Script
    recaptchaScript.type = "text/javascript";
    recaptchaScript.src = "https://www.google.com/recaptcha/api.js"; //?render=' + recaptchaKey + '&ver=3.0';

    // Add Recaptcha Script
    head.appendChild(recaptchaScript);

    // Dynamically add CF7 script
    cf7script.type = "text/javascript";
    //cf7script.text = "!function(t,e){var n={execute:function(e){t.execute(\"" + recaptchaKey +"\",{action:e}).then(function(e){for(var t=document.getElementsByTagName(\"form\"),n=0;n<t.length;n++)for(var c=t[n].getElementsByTagName(\"input\"),a=0;a<c.length;a++){var o=c[a];if(\"g-recaptcha-response\"===o.getAttribute(\"name\")){o.setAttribute(\"value\",e);break}}})},executeOnHomepage:function(){n.execute(e.homepage)},executeOnContactform:function(){n.execute(e.contactform)}};t.ready(n.executeOnHomepage),document.addEventListener(\"change\",n.executeOnContactform,!1),document.addEventListener(\"wpcf7submit\",n.executeOnHomepage,!1)}(grecaptcha,{homepage:\"homepage\",contactform:\"contactform\"});";
    cf7script.text =
      '!function(t,e){var n={execute:function(e){t.execute("' +
      recaptchaKey +
      '",{action:e}).then(function(e){for(var t=document.getElementsByTagName("form"),n=0;n<t.length;n++)for(var c=t[n].getElementsByTagName("input"),a=0;a<c.length;a++){var o=c[a];if("_wpcf7_recaptcha_response"===o.getAttribute("name")){o.setAttribute("value",e);break}}})},executeOnHomepage:function(){n.execute(e.homepage)},executeOnContactform:function(){n.execute(e.contactform)}};t.ready(n.executeOnHomepage),document.addEventListener("change",n.executeOnContactform,!1),document.addEventListener("wpcf7submit",n.executeOnHomepage,!1)}(grecaptcha,{homepage:"homepage",contactform:"contactform"});';

    // Add CF7 Script AFTER Recaptcha. Timeout ensures the loading sequence.
    setTimeout(function () {
      head.appendChild(cf7script);
    }, 200);

    //Set flag to only load once
    captchaLoaded = true;
  });
});

document.addEventListener('DOMContentLoaded', function() {
  if(document.querySelectorAll('.plans-container.active').length == 2) {
    setTimeout(function() {document.querySelectorAll('.plans-container.active')[1].classList.remove('active');}, 200);
  }

  const togglerItems = document.querySelectorAll('.toggler-item');
const plansContainers = document.querySelectorAll('.plans-container');

// Add event listener to each toggler item
togglerItems.forEach(item => {
    item.addEventListener('click', () => {
        // Remove 'button-active' from all toggler items
        togglerItems.forEach(el => el.classList.remove('button-active'));
        
        // Add 'button-active' to the clicked item
        item.classList.add('button-active');

        // Get the target from the clicked toggler item
        const target = item.getAttribute('data-target');
        
        // Remove 'active' from all plan containers
        plansContainers.forEach(container => container.classList.remove('active'));

        // Find the corresponding plan container and add the 'active' class
        const targetContainer = document.querySelector(`.plans-container[data-item="${target}"]`);
        if (targetContainer) {
            targetContainer.classList.add('active');
        }
    });
});

})