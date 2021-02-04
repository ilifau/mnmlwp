// mnmlWP admin scripts
(function($){

  $(window).load(function() {

    // Toggle hero section input
    function toggleHeroSection(template) {
      if (typeof template !== 'undefined' && ('template-page-hero.php' == template || 'template-post-hero.php' == template || 'template-blank-page-hero.php' == template)) {
        $('#mnmlwp-hero-fieldset').show(0);
        $('#mnmlwp-hero-fieldset-message').hide(0);
      } else {
        $('#mnmlwp-hero-fieldset').hide(0);
        $('#mnmlwp-hero-fieldset-message').show(0);
      }
    }

    $('.editor-page-attributes__template select').on('change', function() {
      let template = $(this).val();
      toggleHeroSection(template);
    })

  });

})(jQuery);
