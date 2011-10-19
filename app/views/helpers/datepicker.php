<?php 

class DatepickerHelper extends FormHelper { 

    var $format = '%Y-%m-%d'; 
    
    /** 
     *Setup the format if exist in Configure class 
     */ 
    function _setup(){ 
        $format = Configure::read('DatePicker.format'); 
        if($format != null){ 
            $this->format = $format; 
        } 
    } 
    
    /** 
    * The Main Function - picker 
    * 
    * @param string $field Name of the database field. Possible usage with Model. 
    * @param array $options Optional Array. Options are the same as in the usual text input field. 
    */     
    function picker($fieldName, $options = array()) { 
        $this->_setup(); 
        $this->setEntity($fieldName); 
        $htmlAttributes = $this->domId($options);         
       $options['class'] = 'hasDatepicker'; 
        $options['id'] = 'datepicker';
		$options['type'] = 'text'; 
        $options['maxlength'] = '20'; 
        $options['div']['class'] = 'formfield'; 
        return $this->input($fieldName, $options); 
    } 
     
} 
?> 