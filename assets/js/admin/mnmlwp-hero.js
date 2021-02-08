const { select, subscribe } = wp.data;

class PageTemplateSwitcher {

  constructor() {
    this.template = null;
  }

  init() {

    subscribe( () => {
      const newTemplate = select( 'core/editor' ).getEditedPostAttribute( 'template' );

      if ('template-page-hero.php' === newTemplate || 'template-post-hero.php' === newTemplate || 'template-blank-page-hero.php' === newTemplate) {
        this.showHeroSection();
      } else {
        this.hideHeroSection();
      }
    });
  }

  showHeroSection() {
    let $ = jQuery;

    $('#mnmlwp-hero-fieldset').show(0);
    $('#mnmlwp-hero-fieldset-message').hide(0);
  }

  hideHeroSection() {
    let $ = jQuery;

    $('#mnmlwp-hero-fieldset').hide(0);
    $('#mnmlwp-hero-fieldset-message').show(0);
  }
}

new PageTemplateSwitcher().init();
