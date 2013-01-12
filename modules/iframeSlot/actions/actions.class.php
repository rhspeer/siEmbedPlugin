<?php
class iframeSlotActions extends aSlotActions
{
  public function executeEdit(sfRequest $request)
  {
    $this->editSetup();

    // Hyphen between slot and form to please our CSS
    $value = $this->getRequestParameter('slot-form-' . $this->id);
    $this->form = new iframeSlotEditForm($this->id, array());
    $this->form->bind($value);
    if ($this->form->isValid())
    {

        // if URL is from a google map add &output=embed if missing so it'll work in a iFrame
        $parseURL = parse_url($url = $this->form->getValue('URL'));
        if($parseURL['host'] == 'maps.google.com'){
            if(strpos($url, 'output=embed') === FALSE){
                $url .= '&output=embed';
            }
        }

        $values = $this->form->getValues();
        $values['URL'] = $url;

      // Serializes all of the values returned by the form into the 'value' column of the slot.
      // This is only one of many ways to save data in a slot. You can use custom columns,
      // including foreign key relationships (see schema.yml), or save a single text value 
      // directly in 'value'. serialize() and unserialize() are very useful here and much
      // faster than extra columns
      
      $this->slot->setArrayValue($values);
      return $this->editSave();
    }
    else
    {
      // Makes $this->form available to the next iteration of the
      // edit view so that validation errors can be seen, if any
      return $this->editRetry();
    }
  }
}
  