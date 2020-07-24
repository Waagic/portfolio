/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import '../css/app.scss';

const $ = require('jquery');
// this "modifies" the jquery module: adding behavior to it
// the bootstrap module doesn't export/return anything
require('bootstrap');

global.jQuery = $;
global.$ = $;

function addTagFormDeleteLink($tagFormLi) {
    const $removeFormButton = $('<div class="delete-button">\n'
        + '                             <a href="#" class="js-remove-methodLink">\n'
        + '                                <button type="button" class="btn btn-secondary btn-sm">Supprimer</button>\n'
        + '                          </a>\n'
        + '                   </div>');
    $tagFormLi.append($removeFormButton);

    $removeFormButton.on('click', (e) => {
        // remove the li for the tag form
        $tagFormLi.fadeOut().remove();
    });
}

$(document).ready(() => {
// JS threeDots action sheet.
    $('.menu').hide();
    $('.threeDots').show().click(() => {
        $('.menu').toggle();
    });


    // method forms
    const $wrapper = $('.js-methodLink-wrapper');

    $wrapper.find('.js-methodLink-item').each(function () {
        addTagFormDeleteLink($(this));
    });


    $('.js-add-methodLink').on('click', (e) => {
        e.preventDefault();
        // Get the data-prototype explained earlier
        const prototype = $wrapper.data('prototype');

        // get the new index
        const index = $wrapper.data('index');

        // Replace '__name__' in the prototype's HTML to
        // instead be a number based on how many items we have
        let newForm = prototype.replace(/__name__/g, index);

        // increase the index with one for the next item
        $wrapper.data('index', index + 1);

        newForm = $(newForm);
        addTagFormDeleteLink(newForm);
        // Display the form in the page before the "new" link
        newForm.appendTo($wrapper);
    });
});

require("jquery-ui/ui/effects/effect-slide");

/*!
    * Start Bootstrap - Freelancer v6.0.0 (https://startbootstrap.com/themes/freelancer)
    * Copyright 2013-2020 Start Bootstrap
    * Licensed under MIT (https://github.com/BlackrockDigital/startbootstrap-freelancer/blob/master/LICENSE)
    */
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

