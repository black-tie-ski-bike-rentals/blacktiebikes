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


  // Logo shrink on desktop. scrollT:0 means app.js adds pin-header in the same
  // scroll tick, so by the time rAF fires the CSS pin-header rule has already
  // jumped width to 100px — jQuery animates 100→100 and nothing moves.
  // Fix: set the FROM value as an inline style in the same tick (inline beats CSS),
  // then rAF into the animation so the browser has a clean frame.
  if (window.matchMedia('(min-width: 992px)').matches) {
    var $logo = $('#header-logo');
    var logoPinned = $(window).scrollTop() > 0;

    if (logoPinned) $logo[0].style.width = '100px';

    $(window).on('scroll.logoShrink', function () {
      var pinned = $(window).scrollTop() > 0;
      if (pinned === logoPinned) return;
      logoPinned = pinned;
      $logo.stop(true);
      $logo[0].style.width = pinned ? '160px' : '100px';
      requestAnimationFrame(function () {
        $logo.animate({ width: pinned ? 100 : 160 }, 300);
      });
    });
  }

}(jQuery));
