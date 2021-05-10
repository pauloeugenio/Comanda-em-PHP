(function() {
  $('.menu-trigger').on('click', function(e) {
    e.preventDefault();
    return $('#circle-menu').toggleClass('open');
  });

}).call(this);
