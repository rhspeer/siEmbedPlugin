<?php
class iframeSlotComponents extends aSlotComponents
{
  public function executeEditView()
  {
    // Must be at the start of both view components
    $this->setup();
    
    // Careful, don't clobber a form object provided to us with validation errors
    // from an earlier pass
    if (!isset($this->form))
    {
      $this->form = new iframeSlotEditForm($this->id, $this->slot->getArrayValue());
    }
  }
  public function executeNormalView()
  {
    $this->setup();
    $this->values = $values = $this->slot->getArrayValue();

      // default dimensions, also set in lib/form/embedSlotEditForm.class.php - should be DRY'ed out
      $this->width = '300';
      $this->height = '350';

      if(isset($values['width'])){
          $this->width = $values['width'];
      }
      if(isset($values['height'])){
          $this->height = $values['height'];
      }
  }
}
