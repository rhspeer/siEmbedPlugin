<?php    
class iframeSlotEditForm extends BaseForm
{
  // Ensures unique IDs throughout the page
  protected $id;
  public function __construct($id, $defaults = array(), $options = array(), $CSRFSecret = null)
  {
    $this->id = $id;
    parent::__construct($defaults, $options, $CSRFSecret);
  }
  public function configure()
  {
      $this->setWidgets(array(
          'URL' => new sfWidgetFormInputText(),
          'width' => new sfWidgetFormInputText(),
          'height' => new sfWidgetFormInputText(),

      ));
      $dimensionOptions = array('required' => false, 'min'=>10, 'max'=>2000);
      $this->setValidators(array(
          'URL' => new notCurrentURL(array('required' => true, 'max_length' => 255)),
          'width' => new sfValidatorInteger($dimensionOptions, array('min' => 'Width must be at least 10', 'max' => 'Width must be less than 2000')),
          'height' => new sfValidatorInteger($dimensionOptions, array('min' => 'Height must be at least 10', 'max' => 'Height must be less than 2000')),

      ));

      $ws = $this->getWidgetSchema();
      $ws->setHelps(array(
          'URL' => 'URL like http://www.example.com',
          'width' => 'Integer for the embeded iFrame\'s width in pixels',
          'height' => 'Integer for the embeded iFrame\'s height in pixels',
      ));
      $ws->setDefaults(array(  // defaults enforced in components.class.php - should be DRY'ed out
          'width' => 300,
          'height' => 350
      ));


      // Ensures unique IDs throughout the page. Hyphen between slot and form to please our CSS
      $this->widgetSchema->setNameFormat('slot-form-' . $this->id . '[%s]');

      // You don't have to use our form formatter, but it makes things nice
      $this->widgetSchema->setFormFormatterName('aAdmin');
  }
}
