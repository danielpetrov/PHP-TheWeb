<?php
function getValue($array, $key, $default = null) {
	return isset($array[$key]) ? $array[$key] : $default;
}

function validateRequired($value) {
	return !empty($value);
}

function validateString($value) {
	return is_string($value);
}

function validateNumber($value) {
	return is_numeric($value);
}

function validateLength($value, $min, $max = null) {
	$length = mb_strlen($value, 'UTF-8');
	if ($min && $min > $length) {
		return false;
	}
	
	if ($max && $max < $length) {
		return false;
	}
	
	return true;
}

function validateNonAlphaNumeric($value) {
	return (bool) preg_match('/[^a-z0-9а-я\s]/i', $value);
}

function getErrorClass($errors, $fieldName, $errorClass = 'error') {
	return !empty($errors[$fieldName]) ? $errorClass : '';
}

function getFieldErrors($errors, $fieldName) {
	$html = '';
	foreach (getValue($errors, $fieldName, []) as $error) {
		$html .= sprintf('<p>%s</p>', $error);
	}
	
	return $html;
}

function radiosOrCheckboxes($data, $name, $checked, $type = 'radio') {
	
	if (!is_array($checked)) {
		$checked = [$checked];
	}
	
	$html = '';
	foreach ($data as $value => $label) {
		$id = $name . '_' . $value;
		$html .= sprintf(
				'<label for="%s"><input type="%s" name="%s" id="%s" value="%s" %s>%s</label>',
				$id,
				$type,
				$name,
				$id,
				$value,
				in_array($value, $checked) ? 'checked="checked"' : '',
				$label
		);
	}

	return $html;
}

function radios($data, $name, $checked) {
	return radiosOrCheckboxes($data, $name, $checked);
}

function checkboxes($data, $name, $checked) {
	return radiosOrCheckboxes($data, $name, $checked, 'checkbox');
}

function options($data, $selected) {
	$html = '';
	foreach ($data as $value => $text) {
		$html .= sprintf('<option value="%s" %s>%s</option>', 
				$value,
				$value == $selected  ? 'selected="selected"' : '',
				$text);
	}
	
	return $html;
}