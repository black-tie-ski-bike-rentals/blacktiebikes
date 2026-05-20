(function ($) {
  'use strict';

  $(document).on('click', '#menu-main-menu .menu-item-has-children > a', function (e) {
    var href = $(this).attr('href');
    if (!href || href === '#' || href.startsWith('#')) {
      e.preventDefault();
    }
    var $li = $(this).closest('.menu-item-has-children');
    var isOpen = $li.hasClass('is-open-child');
    $('#menu-main-menu .menu-item-has-children.is-open-child').removeClass('is-open-child');
    if (!isOpen) {
      $li.addClass('is-open-child');
    }

  });

  $(document).on('click', function (e) {
    if (!$(e.target).closest('#menu-main-menu .menu-item-has-children').length) {
      $('#menu-main-menu .menu-item-has-children.is-open-child').removeClass('is-open-child');
    }
  });

  $(document).on('keydown', function (e) {
    if (e.key === 'Escape') {
      $('#menu-main-menu .menu-item-has-children.is-open-child').removeClass('is-open-child');
    }
  });

  // Jobs popup — app.js binds .popup-is-open-v2 directly at page load, which misses
  // menu items rebuilt by WP-CLI (class lands on <li>, data-id on <a>). Replicate
  // the same open sequence here via delegation, targeting the <a> by data-id directly.
  $(document).on('click', '#menu-main-menu a[data-id]', function (e) {
    var targetId = $(this).data('id');
    if ( !targetId || !$(targetId).hasClass('popup-v2') ) return;
    e.preventDefault();
    window.location.hash = targetId;
    $('html').addClass('popup-open popup-animation');
    $(targetId).addClass('show');
    $(targetId).find('.popup-form').show();
    $(targetId).find('.career-content').show();
    $(targetId).find('.career-thank-message').hide();
  });


  // Prevent app.js from reopening the popup on refresh by clearing the hash on page load.
  if (window.location.hash === '#booknow') {
    history.replaceState(null, '', window.location.pathname + window.location.search);
  }

  // Intercept direct booking links in hero/content areas and open the popup instead.
  // Skip if the popup is already open — links inside it should open normally in a new tab.
  $(document).on('click', 'a[href*="booknow.blacktiebikes.com"], a[href*="blackdiamondbanff.com/book-now"], a[href*="checkfront.com/reserve"]', function (e) {
    if ($(this).hasClass('popup-is-open')) return;
    if ($('html').hasClass('html-popup-content')) return;
    e.preventDefault();
    $('#boonowbutton').trigger('click');
  });

  // Desktop logo: CSS transition from 160px → 100px on scroll.
  // Uses .logo-shrunk at threshold=10px so the browser has rendered the
  // 160px state before the class change triggers the transition.
  var $header = $('#header');
  var logoShrunk = $(window).scrollTop() > 10;
  if (logoShrunk) $header.addClass('logo-shrunk');

  $(window).on('scroll.logoShrink', function () {
    var shouldShrink = $(window).scrollTop() > 10;
    if (shouldShrink === logoShrunk) return;
    logoShrunk = shouldShrink;
    $header.toggleClass('logo-shrunk', shouldShrink);
  });

}(jQuery));
