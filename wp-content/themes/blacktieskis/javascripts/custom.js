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

// WW-7: Explore section slider
// custom.js loads async in the footer — DOM is already ready, no DOMContentLoaded needed
(function () {
  document.querySelectorAll('.explore-slider-wrap').forEach(function (wrap) {
    var trackId = wrap.dataset.trackId;
    var total   = parseInt(wrap.dataset.total, 10);
    var visible = 3;
    var index   = 0;
    var track   = document.getElementById(trackId + '-track');
    var prev    = document.getElementById(trackId + '-prev');
    var next    = document.getElementById(trackId + '-next');

    function update() {
      var cardW = track.children[0].offsetWidth + 12;
      track.style.transform = 'translateX(-' + (index * cardW) + 'px)';
      prev.classList.toggle('explore-arrow--hidden', index === 0);
      next.classList.toggle('explore-arrow--hidden', index >= total - visible);
    }

    prev.addEventListener('click', function () {
      index = Math.max(0, index - 1);
      update();
    });

    next.addEventListener('click', function () {
      index = Math.min(total - visible, index + 1);
      update();
    });

    update();
  });
}());
