"use strict";

(function () {
  /**
   * initializeBlock
   *
   * Adds custom JavaScript to the block HTML.
   *
   * @param   object $block The block jQuery element.
   * @param   object attributes The block attributes (only available when editing).
   * @return  void
   */
  var initializeBlock = function initializeBlock() {
    var players = Array.from(document.querySelectorAll('.js-player')).map(function (p) {
      return new Plyr(p);
    });
  }; // Initialize each block on page load (front end).


  var allPoints = document.querySelectorAll('.m03');
  Array.prototype.slice.call(allPoints).forEach(function (element) {
    initializeBlock(element);
  });
  var videos = document.querySelectorAll('.m07');
  Array.prototype.slice.call(videos).forEach(function (e) {
    initializeBlock(e);
  }); // Initialize dynamic block preview (editor).

  if (window.acf) {
    window.acf.addAction('render_block_preview/type=about-me', initializeBlock);
    window.acf.addAction('render_block_preview/type=video', initializeBlock);
  }
})();