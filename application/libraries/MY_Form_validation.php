<?php
class MY_Form_validation extends CI_Form_validation
{
  function __construct($config = array())
  {
    parent::__construct($config);
  }

  function error_array()
  {
    if (count($this->_error_array) === 0)
      return FALSE;
    else
      return $this->_error_array;
  }
  function decrypt_validate($id)
  {
	$id=encryptor('decrypt',$id);
	if(!empty($id) && is_numeric($id) )
    {
    	return TRUE;
    		
	}
	else
	{
		$this->set_message('decrypt_validate', 'Passing Value not correct');
		return FALSE;
		
	}
  }
}