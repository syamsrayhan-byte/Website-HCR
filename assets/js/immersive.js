/**
 * Immersive Layer
 * Scroll progress, glass navbar, scroll reveal, dan parallax ringan.
 * Vanilla JS, tanpa dependensi.
 */
(function () {
  'use strict';

  var root = document.documentElement;
  var body = document.body;
  var reduceMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  root.classList.add('ei-js');

  // Scroll progress bar
  var progress = document.createElement('div');
  progress.className = 'ei-progress';
  progress.setAttribute('aria-hidden', 'true');
  body.appendChild(progress);

  // Glass navbar + sembunyi saat scroll ke bawah
  var nav = document.querySelector('.main-navigation');
  var lastY = window.pageYOffset;
  var HIDE_AFTER = 240;
  var DELTA = 6;

  function navBusy() {
    return body.classList.contains('search-active') ||
      (nav && nav.querySelector('ul.active, li:hover > ul'));
  }

  // Parallax
  var parallaxItems = [];

  function collectParallax() {
    if (reduceMotion) return;
    var targets = document.querySelectorAll(
      '[data-ei-parallax],' +
      '.elementor-section:first-of-type .elementor-widget-image img,' +
      '.e-con:first-of-type .elementor-widget-image img,' +
      'body.single .content-single figure.post-image img'
    );
    parallaxItems = [];
    for (var i = 0; i < targets.length; i++) {
      var el = targets[i];
      if (!el.hasAttribute('data-ei-parallax')) el.setAttribute('data-ei-parallax', '0.12');
      // Gambar di dalam wadah overflow:hidden diperbesar sedikit supaya tepinya tidak kosong saat bergeser
      var clipped = el.parentElement && getComputedStyle(el.parentElement).overflow === 'hidden';
      if (clipped) el.style.setProperty('--ei-parallax-scale', '1.14');
      parallaxItems.push({
        el: el,
        speed: parseFloat(el.getAttribute('data-ei-parallax')) || 0.12,
        clipped: clipped
      });
    }
  }

  function updateParallax() {
    var vh = window.innerHeight;
    for (var i = 0; i < parallaxItems.length; i++) {
      var item = parallaxItems[i];
      var rect = item.el.getBoundingClientRect();
      if (rect.bottom < 0 || rect.top > vh) continue;
      var offset = (rect.top + rect.height / 2 - vh / 2) * -item.speed;
      var limit = item.clipped ? rect.height * 0.06 : 40;
      offset = Math.max(-limit, Math.min(limit, offset));
      item.el.style.setProperty('--ei-parallax', offset.toFixed(1) + 'px');
    }
  }

  var ticking = false;
  function onScroll() {
    if (ticking) return;
    ticking = true;
    window.requestAnimationFrame(function () {
      var y = window.pageYOffset;
      var max = root.scrollHeight - window.innerHeight;
      progress.style.setProperty('--ei-progress', max > 0 ? Math.min(1, y / max) : 0);

      body.classList.toggle('ei-scrolled', y > 10);

      if (nav && !reduceMotion && Math.abs(y - lastY) > DELTA) {
        var hide = y > lastY && y > HIDE_AFTER && !navBusy();
        body.classList.toggle('ei-nav-hidden', hide);
        lastY = y;
      }

      if (parallaxItems.length) updateParallax();
      ticking = false;
    });
  }

  // Scroll reveal
  var REVEAL_SELECTOR = [
    'article',
    '.c-post-left > section',
    '.right-sidebar .widget',
    '.widget-area section.widget',
    '.content-single .desc > *:not(script):not(style)',
    '.elementor-section .elementor-widget',
    '.e-con .elementor-widget',
    'footer .container > *',
    '.c-prefooter .container > *'
  ].join(',');

  // Area yang punya animasi/geser sendiri: jangan diganggu
  var SKIP_SELECTOR = '.main-navigation, .sidebar, .c-modal, .search-form, .slick-slider, .swiper, .elementor-invisible, .animated';

  var observer = null;
  if (!reduceMotion && 'IntersectionObserver' in window) {
    observer = new IntersectionObserver(function (entries) {
      for (var i = 0; i < entries.length; i++) {
        if (entries[i].isIntersecting) {
          entries[i].target.classList.add('ei-visible');
          observer.unobserve(entries[i].target);
        }
      }
    }, { rootMargin: '0px 0px -8% 0px', threshold: 0.08 });
  }

  function prepareReveal(scope) {
    if (!observer) return;
    var els = scope.querySelectorAll(REVEAL_SELECTOR);
    var vh = window.innerHeight;
    var stagger = 0;
    for (var i = 0; i < els.length; i++) {
      var el = els[i];
      if (el.classList.contains('ei-reveal')) continue;
      // Jangan animasikan elemen di dalam elemen lain yang sudah dianimasikan
      if (el.parentElement && el.parentElement.closest('.ei-reveal')) continue;
      if (el.closest(SKIP_SELECTOR)) continue;
      if (el.matches('[data-settings*="_animation"]')) continue;

      // Elemen yang sudah terlihat saat halaman dibuka: muncul berurutan
      if (el.getBoundingClientRect().top < vh) {
        el.style.setProperty('--ei-delay', Math.min(stagger, 6) * 0.08 + 's');
        stagger++;
      }
      el.classList.add('ei-reveal');
      observer.observe(el);
    }
  }

  // Post yang dimuat lewat "load more" / infinite scroll juga dianimasikan
  if (observer && 'MutationObserver' in window) {
    var pending = [];
    var scheduled = false;
    new MutationObserver(function (mutations) {
      for (var i = 0; i < mutations.length; i++) {
        var added = mutations[i].addedNodes;
        for (var j = 0; j < added.length; j++) {
          if (added[j].nodeType === 1 && added[j].parentElement) pending.push(added[j].parentElement);
        }
      }
      if (!pending.length || scheduled) return;
      scheduled = true;
      window.requestAnimationFrame(function () {
        var scopes = pending;
        pending = [];
        scheduled = false;
        for (var k = 0; k < scopes.length; k++) {
          if (scopes[k].isConnected) prepareReveal(scopes[k]);
        }
      });
    }).observe(body, { childList: true, subtree: true });
  }

  function init() {
    prepareReveal(document);
    collectParallax();
    onScroll();
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }
  window.addEventListener('scroll', onScroll, { passive: true });
  window.addEventListener('resize', onScroll, { passive: true });
  window.addEventListener('load', function () { collectParallax(); onScroll(); });
})();
