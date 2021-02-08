const { select, subscribe } = wp.data;

class PageTemplateSwitcher {

  constructor() {
    this.template = null;
  }

  init() {

    subscribe( () => {

      const newTemplate = select( 'core/editor' ).getEditedPostAttribute( 'template' );

      if ( newTemplate && newTemplate !== this.template ) {
        this.template = newTemplate;
        this.changeTemplate();
      }

    });
  }

  changeTemplate() {
    let $ = jQuery;
  
    if (typeof this.template !== 'undefined' && ('template-page-hero.php' === this.template || 'template-post-hero.php' === this.template || 'template-blank-page-hero.php' === this.template)) {
      $('#mnmlwp-hero-fieldset').show(0);
      $('#mnmlwp-hero-fieldset-message').hide(0);
    } else {
      $('#mnmlwp-hero-fieldset').hide(0);
      $('#mnmlwp-hero-fieldset-message').show(0);
    }
  }
}

new PageTemplateSwitcher().init();
