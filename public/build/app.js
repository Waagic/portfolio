(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["app"],{

/***/ "./assets/css/app.scss":
/*!*****************************!*\
  !*** ./assets/css/app.scss ***!
  \*****************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "./assets/js/app.js":
/*!**************************!*\
  !*** ./assets/js/app.js ***!
  \**************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* WEBPACK VAR INJECTION */(function(global) {/* harmony import */ var core_js_modules_es_array_find__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! core-js/modules/es.array.find */ "./node_modules/core-js/modules/es.array.find.js");
/* harmony import */ var core_js_modules_es_array_find__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_array_find__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var core_js_modules_es_regexp_exec__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! core-js/modules/es.regexp.exec */ "./node_modules/core-js/modules/es.regexp.exec.js");
/* harmony import */ var core_js_modules_es_regexp_exec__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_regexp_exec__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var core_js_modules_es_string_replace__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! core-js/modules/es.string.replace */ "./node_modules/core-js/modules/es.string.replace.js");
/* harmony import */ var core_js_modules_es_string_replace__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_string_replace__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _css_app_scss__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../css/app.scss */ "./assets/css/app.scss");
/* harmony import */ var _css_app_scss__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_css_app_scss__WEBPACK_IMPORTED_MODULE_3__);




/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */
// any CSS you import will output into a single css file (app.css in this case)


var $ = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js"); // this "modifies" the jquery module: adding behavior to it
// the bootstrap module doesn't export/return anything


__webpack_require__(/*! bootstrap */ "./node_modules/bootstrap/dist/js/bootstrap.js");

global.jQuery = $;
global.$ = $;

function addTagFormDeleteLink($tagFormLi) {
  var $removeFormButton = $('<div class="delete-button">\n' + '                             <a href="#" class="js-remove-methodLink">\n' + '                                <button type="button" class="btn btn-secondary btn-sm">Supprimer</button>\n' + '                          </a>\n' + '                   </div>');
  $tagFormLi.append($removeFormButton);
  $removeFormButton.on('click', function (e) {
    // remove the li for the tag form
    $tagFormLi.fadeOut().remove();
  });
}

$(document).ready(function () {
  // JS threeDots action sheet.
  $('.menu').hide();
  $('.threeDots').show().click(function () {
    $('.menu').toggle();
  }); // method forms

  var $wrapper = $('.js-methodLink-wrapper');
  $wrapper.find('.js-methodLink-item').each(function () {
    addTagFormDeleteLink($(this));
  });
  $('.js-add-methodLink').on('click', function (e) {
    e.preventDefault(); // Get the data-prototype explained earlier

    var prototype = $wrapper.data('prototype'); // get the new index

    var index = $wrapper.data('index'); // Replace '__name__' in the prototype's HTML to
    // instead be a number based on how many items we have

    var newForm = prototype.replace(/__name__/g, index); // increase the index with one for the next item

    $wrapper.data('index', index + 1);
    newForm = $(newForm);
    addTagFormDeleteLink(newForm); // Display the form in the page before the "new" link

    newForm.appendTo($wrapper);
  });
});
/*!
    * Start Bootstrap - Freelancer v6.0.0 (https://startbootstrap.com/themes/freelancer)
    * Copyright 2013-2020 Start Bootstrap
    * Licensed under MIT (https://github.com/BlackrockDigital/startbootstrap-freelancer/blob/master/LICENSE)

(function($) {
    "use strict"; // Start of use strict

    // Smooth scrolling using jQuery easing
    $('a.js-scroll-trigger[href*="#"]:not([href="#"])').click(function() {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html, body').animate({
                    scrollTop: (target.offset().top - 71)
                }, 1000, "easeInOutExpo");
                return false;
            }
        }
    });

    // Scroll to top button appear
    $(document).scroll(function() {
        var scrollDistance = $(this).scrollTop();
        if (scrollDistance > 100) {
            $('.scroll-to-top').fadeIn();
        } else {
            $('.scroll-to-top').fadeOut();
        }
    });

    // Closes responsive menu when a scroll trigger link is clicked
    $('.js-scroll-trigger').click(function() {
        $('.navbar-collapse').collapse('hide');
    });

    // Activate scrollspy to add active class to navbar items on scroll
    $('body').scrollspy({
        target: '#mainNav',
        offset: 80
    });

    // Collapse Navbar
    var navbarCollapse = function() {
        if ($("#mainNav").offset().top > 100) {
            $("#mainNav").addClass("navbar-shrink");
        } else {
            $("#mainNav").removeClass("navbar-shrink");
        }
    };
    // Collapse now if page is not at top
    navbarCollapse();
    // Collapse the navbar when page is scrolled
    $(window).scroll(navbarCollapse);

    // Floating label headings for the contact form
    $(function() {
        $("body").on("input propertychange", ".floating-label-form-group", function(e) {
            $(this).toggleClass("floating-label-form-group-with-value", !!$(e.target).val());
        }).on("focus", ".floating-label-form-group", function() {
            $(this).addClass("floating-label-form-group-with-focus");
        }).on("blur", ".floating-label-form-group", function() {
            $(this).removeClass("floating-label-form-group-with-focus");
        });
    });

})(jQuery); // End of use strict
    */
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! ./../../node_modules/webpack/buildin/global.js */ "./node_modules/webpack/buildin/global.js")))

/***/ })

},[["./assets/js/app.js","runtime","vendors~app"]]]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9hc3NldHMvY3NzL2FwcC5zY3NzIiwid2VicGFjazovLy8uL2Fzc2V0cy9qcy9hcHAuanMiXSwibmFtZXMiOlsiJCIsInJlcXVpcmUiLCJnbG9iYWwiLCJqUXVlcnkiLCJhZGRUYWdGb3JtRGVsZXRlTGluayIsIiR0YWdGb3JtTGkiLCIkcmVtb3ZlRm9ybUJ1dHRvbiIsImFwcGVuZCIsIm9uIiwiZSIsImZhZGVPdXQiLCJyZW1vdmUiLCJkb2N1bWVudCIsInJlYWR5IiwiaGlkZSIsInNob3ciLCJjbGljayIsInRvZ2dsZSIsIiR3cmFwcGVyIiwiZmluZCIsImVhY2giLCJwcmV2ZW50RGVmYXVsdCIsInByb3RvdHlwZSIsImRhdGEiLCJpbmRleCIsIm5ld0Zvcm0iLCJyZXBsYWNlIiwiYXBwZW5kVG8iXSwibWFwcGluZ3MiOiI7Ozs7Ozs7OztBQUFBLHVDOzs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7O0FDQUE7Ozs7OztBQU9BO0FBQ0E7O0FBRUEsSUFBTUEsQ0FBQyxHQUFHQyxtQkFBTyxDQUFDLG9EQUFELENBQWpCLEMsQ0FDQTtBQUNBOzs7QUFDQUEsbUJBQU8sQ0FBQyxnRUFBRCxDQUFQOztBQUVBQyxNQUFNLENBQUNDLE1BQVAsR0FBZ0JILENBQWhCO0FBQ0FFLE1BQU0sQ0FBQ0YsQ0FBUCxHQUFXQSxDQUFYOztBQUVBLFNBQVNJLG9CQUFULENBQThCQyxVQUE5QixFQUEwQztBQUN0QyxNQUFNQyxpQkFBaUIsR0FBR04sQ0FBQyxDQUFDLGtDQUN0QiwwRUFEc0IsR0FFdEIsNkdBRnNCLEdBR3RCLGtDQUhzQixHQUl0QiwyQkFKcUIsQ0FBM0I7QUFLQUssWUFBVSxDQUFDRSxNQUFYLENBQWtCRCxpQkFBbEI7QUFFQUEsbUJBQWlCLENBQUNFLEVBQWxCLENBQXFCLE9BQXJCLEVBQThCLFVBQUNDLENBQUQsRUFBTztBQUNqQztBQUNBSixjQUFVLENBQUNLLE9BQVgsR0FBcUJDLE1BQXJCO0FBQ0gsR0FIRDtBQUlIOztBQUVEWCxDQUFDLENBQUNZLFFBQUQsQ0FBRCxDQUFZQyxLQUFaLENBQWtCLFlBQU07QUFDeEI7QUFDSWIsR0FBQyxDQUFDLE9BQUQsQ0FBRCxDQUFXYyxJQUFYO0FBQ0FkLEdBQUMsQ0FBQyxZQUFELENBQUQsQ0FBZ0JlLElBQWhCLEdBQXVCQyxLQUF2QixDQUE2QixZQUFNO0FBQy9CaEIsS0FBQyxDQUFDLE9BQUQsQ0FBRCxDQUFXaUIsTUFBWDtBQUNILEdBRkQsRUFIb0IsQ0FRcEI7O0FBQ0EsTUFBTUMsUUFBUSxHQUFHbEIsQ0FBQyxDQUFDLHdCQUFELENBQWxCO0FBRUFrQixVQUFRLENBQUNDLElBQVQsQ0FBYyxxQkFBZCxFQUFxQ0MsSUFBckMsQ0FBMEMsWUFBWTtBQUNsRGhCLHdCQUFvQixDQUFDSixDQUFDLENBQUMsSUFBRCxDQUFGLENBQXBCO0FBQ0gsR0FGRDtBQUtBQSxHQUFDLENBQUMsb0JBQUQsQ0FBRCxDQUF3QlEsRUFBeEIsQ0FBMkIsT0FBM0IsRUFBb0MsVUFBQ0MsQ0FBRCxFQUFPO0FBQ3ZDQSxLQUFDLENBQUNZLGNBQUYsR0FEdUMsQ0FFdkM7O0FBQ0EsUUFBTUMsU0FBUyxHQUFHSixRQUFRLENBQUNLLElBQVQsQ0FBYyxXQUFkLENBQWxCLENBSHVDLENBS3ZDOztBQUNBLFFBQU1DLEtBQUssR0FBR04sUUFBUSxDQUFDSyxJQUFULENBQWMsT0FBZCxDQUFkLENBTnVDLENBUXZDO0FBQ0E7O0FBQ0EsUUFBSUUsT0FBTyxHQUFHSCxTQUFTLENBQUNJLE9BQVYsQ0FBa0IsV0FBbEIsRUFBK0JGLEtBQS9CLENBQWQsQ0FWdUMsQ0FZdkM7O0FBQ0FOLFlBQVEsQ0FBQ0ssSUFBVCxDQUFjLE9BQWQsRUFBdUJDLEtBQUssR0FBRyxDQUEvQjtBQUVBQyxXQUFPLEdBQUd6QixDQUFDLENBQUN5QixPQUFELENBQVg7QUFDQXJCLHdCQUFvQixDQUFDcUIsT0FBRCxDQUFwQixDQWhCdUMsQ0FpQnZDOztBQUNBQSxXQUFPLENBQUNFLFFBQVIsQ0FBaUJULFFBQWpCO0FBQ0gsR0FuQkQ7QUFvQkgsQ0FwQ0Q7QUFzQ0EiLCJmaWxlIjoiYXBwLmpzIiwic291cmNlc0NvbnRlbnQiOlsiLy8gZXh0cmFjdGVkIGJ5IG1pbmktY3NzLWV4dHJhY3QtcGx1Z2luIiwiLypcbiAqIFdlbGNvbWUgdG8geW91ciBhcHAncyBtYWluIEphdmFTY3JpcHQgZmlsZSFcbiAqXG4gKiBXZSByZWNvbW1lbmQgaW5jbHVkaW5nIHRoZSBidWlsdCB2ZXJzaW9uIG9mIHRoaXMgSmF2YVNjcmlwdCBmaWxlXG4gKiAoYW5kIGl0cyBDU1MgZmlsZSkgaW4geW91ciBiYXNlIGxheW91dCAoYmFzZS5odG1sLnR3aWcpLlxuICovXG5cbi8vIGFueSBDU1MgeW91IGltcG9ydCB3aWxsIG91dHB1dCBpbnRvIGEgc2luZ2xlIGNzcyBmaWxlIChhcHAuY3NzIGluIHRoaXMgY2FzZSlcbmltcG9ydCAnLi4vY3NzL2FwcC5zY3NzJztcblxuY29uc3QgJCA9IHJlcXVpcmUoJ2pxdWVyeScpO1xuLy8gdGhpcyBcIm1vZGlmaWVzXCIgdGhlIGpxdWVyeSBtb2R1bGU6IGFkZGluZyBiZWhhdmlvciB0byBpdFxuLy8gdGhlIGJvb3RzdHJhcCBtb2R1bGUgZG9lc24ndCBleHBvcnQvcmV0dXJuIGFueXRoaW5nXG5yZXF1aXJlKCdib290c3RyYXAnKTtcblxuZ2xvYmFsLmpRdWVyeSA9ICQ7XG5nbG9iYWwuJCA9ICQ7XG5cbmZ1bmN0aW9uIGFkZFRhZ0Zvcm1EZWxldGVMaW5rKCR0YWdGb3JtTGkpIHtcbiAgICBjb25zdCAkcmVtb3ZlRm9ybUJ1dHRvbiA9ICQoJzxkaXYgY2xhc3M9XCJkZWxldGUtYnV0dG9uXCI+XFxuJ1xuICAgICAgICArICcgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDxhIGhyZWY9XCIjXCIgY2xhc3M9XCJqcy1yZW1vdmUtbWV0aG9kTGlua1wiPlxcbidcbiAgICAgICAgKyAnICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8YnV0dG9uIHR5cGU9XCJidXR0b25cIiBjbGFzcz1cImJ0biBidG4tc2Vjb25kYXJ5IGJ0bi1zbVwiPlN1cHByaW1lcjwvYnV0dG9uPlxcbidcbiAgICAgICAgKyAnICAgICAgICAgICAgICAgICAgICAgICAgICA8L2E+XFxuJ1xuICAgICAgICArICcgICAgICAgICAgICAgICAgICAgPC9kaXY+Jyk7XG4gICAgJHRhZ0Zvcm1MaS5hcHBlbmQoJHJlbW92ZUZvcm1CdXR0b24pO1xuXG4gICAgJHJlbW92ZUZvcm1CdXR0b24ub24oJ2NsaWNrJywgKGUpID0+IHtcbiAgICAgICAgLy8gcmVtb3ZlIHRoZSBsaSBmb3IgdGhlIHRhZyBmb3JtXG4gICAgICAgICR0YWdGb3JtTGkuZmFkZU91dCgpLnJlbW92ZSgpO1xuICAgIH0pO1xufVxuXG4kKGRvY3VtZW50KS5yZWFkeSgoKSA9PiB7XG4vLyBKUyB0aHJlZURvdHMgYWN0aW9uIHNoZWV0LlxuICAgICQoJy5tZW51JykuaGlkZSgpO1xuICAgICQoJy50aHJlZURvdHMnKS5zaG93KCkuY2xpY2soKCkgPT4ge1xuICAgICAgICAkKCcubWVudScpLnRvZ2dsZSgpO1xuICAgIH0pO1xuXG5cbiAgICAvLyBtZXRob2QgZm9ybXNcbiAgICBjb25zdCAkd3JhcHBlciA9ICQoJy5qcy1tZXRob2RMaW5rLXdyYXBwZXInKTtcblxuICAgICR3cmFwcGVyLmZpbmQoJy5qcy1tZXRob2RMaW5rLWl0ZW0nKS5lYWNoKGZ1bmN0aW9uICgpIHtcbiAgICAgICAgYWRkVGFnRm9ybURlbGV0ZUxpbmsoJCh0aGlzKSk7XG4gICAgfSk7XG5cblxuICAgICQoJy5qcy1hZGQtbWV0aG9kTGluaycpLm9uKCdjbGljaycsIChlKSA9PiB7XG4gICAgICAgIGUucHJldmVudERlZmF1bHQoKTtcbiAgICAgICAgLy8gR2V0IHRoZSBkYXRhLXByb3RvdHlwZSBleHBsYWluZWQgZWFybGllclxuICAgICAgICBjb25zdCBwcm90b3R5cGUgPSAkd3JhcHBlci5kYXRhKCdwcm90b3R5cGUnKTtcblxuICAgICAgICAvLyBnZXQgdGhlIG5ldyBpbmRleFxuICAgICAgICBjb25zdCBpbmRleCA9ICR3cmFwcGVyLmRhdGEoJ2luZGV4Jyk7XG5cbiAgICAgICAgLy8gUmVwbGFjZSAnX19uYW1lX18nIGluIHRoZSBwcm90b3R5cGUncyBIVE1MIHRvXG4gICAgICAgIC8vIGluc3RlYWQgYmUgYSBudW1iZXIgYmFzZWQgb24gaG93IG1hbnkgaXRlbXMgd2UgaGF2ZVxuICAgICAgICBsZXQgbmV3Rm9ybSA9IHByb3RvdHlwZS5yZXBsYWNlKC9fX25hbWVfXy9nLCBpbmRleCk7XG5cbiAgICAgICAgLy8gaW5jcmVhc2UgdGhlIGluZGV4IHdpdGggb25lIGZvciB0aGUgbmV4dCBpdGVtXG4gICAgICAgICR3cmFwcGVyLmRhdGEoJ2luZGV4JywgaW5kZXggKyAxKTtcblxuICAgICAgICBuZXdGb3JtID0gJChuZXdGb3JtKTtcbiAgICAgICAgYWRkVGFnRm9ybURlbGV0ZUxpbmsobmV3Rm9ybSk7XG4gICAgICAgIC8vIERpc3BsYXkgdGhlIGZvcm0gaW4gdGhlIHBhZ2UgYmVmb3JlIHRoZSBcIm5ld1wiIGxpbmtcbiAgICAgICAgbmV3Rm9ybS5hcHBlbmRUbygkd3JhcHBlcik7XG4gICAgfSk7XG59KTtcblxuLyohXG4gICAgKiBTdGFydCBCb290c3RyYXAgLSBGcmVlbGFuY2VyIHY2LjAuMCAoaHR0cHM6Ly9zdGFydGJvb3RzdHJhcC5jb20vdGhlbWVzL2ZyZWVsYW5jZXIpXG4gICAgKiBDb3B5cmlnaHQgMjAxMy0yMDIwIFN0YXJ0IEJvb3RzdHJhcFxuICAgICogTGljZW5zZWQgdW5kZXIgTUlUIChodHRwczovL2dpdGh1Yi5jb20vQmxhY2tyb2NrRGlnaXRhbC9zdGFydGJvb3RzdHJhcC1mcmVlbGFuY2VyL2Jsb2IvbWFzdGVyL0xJQ0VOU0UpXG5cbihmdW5jdGlvbigkKSB7XG4gICAgXCJ1c2Ugc3RyaWN0XCI7IC8vIFN0YXJ0IG9mIHVzZSBzdHJpY3RcblxuICAgIC8vIFNtb290aCBzY3JvbGxpbmcgdXNpbmcgalF1ZXJ5IGVhc2luZ1xuICAgICQoJ2EuanMtc2Nyb2xsLXRyaWdnZXJbaHJlZio9XCIjXCJdOm5vdChbaHJlZj1cIiNcIl0pJykuY2xpY2soZnVuY3Rpb24oKSB7XG4gICAgICAgIGlmIChsb2NhdGlvbi5wYXRobmFtZS5yZXBsYWNlKC9eXFwvLywgJycpID09IHRoaXMucGF0aG5hbWUucmVwbGFjZSgvXlxcLy8sICcnKSAmJiBsb2NhdGlvbi5ob3N0bmFtZSA9PSB0aGlzLmhvc3RuYW1lKSB7XG4gICAgICAgICAgICB2YXIgdGFyZ2V0ID0gJCh0aGlzLmhhc2gpO1xuICAgICAgICAgICAgdGFyZ2V0ID0gdGFyZ2V0Lmxlbmd0aCA/IHRhcmdldCA6ICQoJ1tuYW1lPScgKyB0aGlzLmhhc2guc2xpY2UoMSkgKyAnXScpO1xuICAgICAgICAgICAgaWYgKHRhcmdldC5sZW5ndGgpIHtcbiAgICAgICAgICAgICAgICAkKCdodG1sLCBib2R5JykuYW5pbWF0ZSh7XG4gICAgICAgICAgICAgICAgICAgIHNjcm9sbFRvcDogKHRhcmdldC5vZmZzZXQoKS50b3AgLSA3MSlcbiAgICAgICAgICAgICAgICB9LCAxMDAwLCBcImVhc2VJbk91dEV4cG9cIik7XG4gICAgICAgICAgICAgICAgcmV0dXJuIGZhbHNlO1xuICAgICAgICAgICAgfVxuICAgICAgICB9XG4gICAgfSk7XG5cbiAgICAvLyBTY3JvbGwgdG8gdG9wIGJ1dHRvbiBhcHBlYXJcbiAgICAkKGRvY3VtZW50KS5zY3JvbGwoZnVuY3Rpb24oKSB7XG4gICAgICAgIHZhciBzY3JvbGxEaXN0YW5jZSA9ICQodGhpcykuc2Nyb2xsVG9wKCk7XG4gICAgICAgIGlmIChzY3JvbGxEaXN0YW5jZSA+IDEwMCkge1xuICAgICAgICAgICAgJCgnLnNjcm9sbC10by10b3AnKS5mYWRlSW4oKTtcbiAgICAgICAgfSBlbHNlIHtcbiAgICAgICAgICAgICQoJy5zY3JvbGwtdG8tdG9wJykuZmFkZU91dCgpO1xuICAgICAgICB9XG4gICAgfSk7XG5cbiAgICAvLyBDbG9zZXMgcmVzcG9uc2l2ZSBtZW51IHdoZW4gYSBzY3JvbGwgdHJpZ2dlciBsaW5rIGlzIGNsaWNrZWRcbiAgICAkKCcuanMtc2Nyb2xsLXRyaWdnZXInKS5jbGljayhmdW5jdGlvbigpIHtcbiAgICAgICAgJCgnLm5hdmJhci1jb2xsYXBzZScpLmNvbGxhcHNlKCdoaWRlJyk7XG4gICAgfSk7XG5cbiAgICAvLyBBY3RpdmF0ZSBzY3JvbGxzcHkgdG8gYWRkIGFjdGl2ZSBjbGFzcyB0byBuYXZiYXIgaXRlbXMgb24gc2Nyb2xsXG4gICAgJCgnYm9keScpLnNjcm9sbHNweSh7XG4gICAgICAgIHRhcmdldDogJyNtYWluTmF2JyxcbiAgICAgICAgb2Zmc2V0OiA4MFxuICAgIH0pO1xuXG4gICAgLy8gQ29sbGFwc2UgTmF2YmFyXG4gICAgdmFyIG5hdmJhckNvbGxhcHNlID0gZnVuY3Rpb24oKSB7XG4gICAgICAgIGlmICgkKFwiI21haW5OYXZcIikub2Zmc2V0KCkudG9wID4gMTAwKSB7XG4gICAgICAgICAgICAkKFwiI21haW5OYXZcIikuYWRkQ2xhc3MoXCJuYXZiYXItc2hyaW5rXCIpO1xuICAgICAgICB9IGVsc2Uge1xuICAgICAgICAgICAgJChcIiNtYWluTmF2XCIpLnJlbW92ZUNsYXNzKFwibmF2YmFyLXNocmlua1wiKTtcbiAgICAgICAgfVxuICAgIH07XG4gICAgLy8gQ29sbGFwc2Ugbm93IGlmIHBhZ2UgaXMgbm90IGF0IHRvcFxuICAgIG5hdmJhckNvbGxhcHNlKCk7XG4gICAgLy8gQ29sbGFwc2UgdGhlIG5hdmJhciB3aGVuIHBhZ2UgaXMgc2Nyb2xsZWRcbiAgICAkKHdpbmRvdykuc2Nyb2xsKG5hdmJhckNvbGxhcHNlKTtcblxuICAgIC8vIEZsb2F0aW5nIGxhYmVsIGhlYWRpbmdzIGZvciB0aGUgY29udGFjdCBmb3JtXG4gICAgJChmdW5jdGlvbigpIHtcbiAgICAgICAgJChcImJvZHlcIikub24oXCJpbnB1dCBwcm9wZXJ0eWNoYW5nZVwiLCBcIi5mbG9hdGluZy1sYWJlbC1mb3JtLWdyb3VwXCIsIGZ1bmN0aW9uKGUpIHtcbiAgICAgICAgICAgICQodGhpcykudG9nZ2xlQ2xhc3MoXCJmbG9hdGluZy1sYWJlbC1mb3JtLWdyb3VwLXdpdGgtdmFsdWVcIiwgISEkKGUudGFyZ2V0KS52YWwoKSk7XG4gICAgICAgIH0pLm9uKFwiZm9jdXNcIiwgXCIuZmxvYXRpbmctbGFiZWwtZm9ybS1ncm91cFwiLCBmdW5jdGlvbigpIHtcbiAgICAgICAgICAgICQodGhpcykuYWRkQ2xhc3MoXCJmbG9hdGluZy1sYWJlbC1mb3JtLWdyb3VwLXdpdGgtZm9jdXNcIik7XG4gICAgICAgIH0pLm9uKFwiYmx1clwiLCBcIi5mbG9hdGluZy1sYWJlbC1mb3JtLWdyb3VwXCIsIGZ1bmN0aW9uKCkge1xuICAgICAgICAgICAgJCh0aGlzKS5yZW1vdmVDbGFzcyhcImZsb2F0aW5nLWxhYmVsLWZvcm0tZ3JvdXAtd2l0aC1mb2N1c1wiKTtcbiAgICAgICAgfSk7XG4gICAgfSk7XG5cbn0pKGpRdWVyeSk7IC8vIEVuZCBvZiB1c2Ugc3RyaWN0XG4gICAgKi9cbiJdLCJzb3VyY2VSb290IjoiIn0=