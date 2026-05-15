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

}(jQuery));
