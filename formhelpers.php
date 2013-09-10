<?php

function input_text($element_name, $values) {
	if (!isset($values[$element_name])) {
		$values[$element_name] = null;
	}
	print '<input type="text" name=' 
			.$element_name . ' value="' 
			. htmlentities($values[$element_name]) . '"/>';
}

function input_submit($element_name, $label) {
	print '<input type="submit" name=' .$element_name . ' value="' . htmlentities($label) . '"/>';
}

function input_textarea($element_name, $values) {
	print '<input type="textarea" name=' .$element_name . ' value="' . htmlentities($values[$element_name]) . '"/>';
}

function input_radiocheck($type, $element_name, $values, $element_value) {
	print '<input type="' . $type . '" name="' . $element_name . '" value="' . $element_value . '" ';
	if (array_key_exists($element_name, $values) && ($element_value == $values[$element_name])) {
		print ' checked="checked';
	}
	print '>';
}

function input_select ($element_name, $selected, $options, $multiple = false) {
	print '<select name="' . $element_name;
	if($multiple) {
		print '[]" multiple="multiple';
	}
	print '">';
	$selectedOptions = array();
	
	if(!empty($selected[$element_name])) {
		$selected[$element_name] = '';
	}
	
	if($multiple) {
		foreach ($selected[$element_name] as $val) {
			$selectedOptions[$val] = true;
		}
	} else {
		//$selectedOptions[$selected[$element_name]] = true;
	}
	
	foreach ($options as $option => $label) {
		print '<option value="' . htmlentities($option) . '"';
		if(array_key_exists($option, $selectedOptions) && $selectedOptions[$option]) {
			print ' selected="selected"';
		}
		print '>' . htmlentities($label) . '</option>';
	}
	print '</select>';
}


