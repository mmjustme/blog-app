<?php

namespace core;

class Validator
{
  protected $errors = [];
  protected $allowedValidationMethods = ['required', 'min', 'max', 'email', 'unique', 'ext', 'size'];
  protected $errorMessages = [
    'required' => 'The :fieldname: field is required',
    'min' => 'The :fieldname: field must be a minimun :rulevalue: characters',
    'max' => 'The :fieldname: field must be a maximum :rulevalue: characters',
    'email' => 'Not valid email',
    'unique' => 'The :fieldname: have been already taken',
    'ext' => 'Not valid extension of file. Use :rulevalue:.',
    'size' => 'Not valid size of file. Max size 1M.',
  ];

  public function validate($data = [], $rules = [])
  {
    foreach ($data as $fieldname => $value) {

      if (isset($rules[$fieldname])) {
        $this->check([
          'fieldname' => $fieldname,
          'value' => $value,
          'rules' => $rules[$fieldname],
        ]);
      }
    }
    return $this;
  }

  protected function check($field)
  {
    foreach ($field['rules'] as $rule => $rule_value) {
      if (in_array($rule, $this->allowedValidationMethods)) {

        if (!call_user_func_array([$this, $rule], [$field['value'], $rule_value])) {
          $this->addError(
            $field['fieldname'],
            str_replace([":fieldname:", ":rulevalue:"], [$field['fieldname'], $rule_value], $this->errorMessages[$rule]
            ));
        }
      }
    }
  }

  protected function addError($fieldname, $error)
  {
    $this->errors[$fieldname][] = $error;
  }

  public function getErrors()
  {
    return $this->errors;
  }

  public function hasErrors()
  {
    return !empty($this->errors);
  }

  public function listErrors($fieldname)
  {
    $output = '';
    if (isset($this->errors[$fieldname])) {
      $output .= "<div class='invalid-feedback d-block'><ul class='list-unstyled'>";
      foreach ($this->errors[$fieldname] as $error) {
        $output .= "<li>{$error}</li>";
      }
      $output .= '</ul></div>';
    }
    return $output;
  }

  protected function required($value, $rule_value)
  {
    return !empty($value);
  }

  protected function min($value, $rule_value)
  {
    return mb_strlen($value) >= $rule_value;
  }

  protected function max($value, $rule_value)
  {
    return mb_strlen($value) <= $rule_value;
  }

  protected function email($value, $rule_value)
  {
    return filter_var($value, FILTER_VALIDATE_EMAIL);
  }

  protected function unique($value, $rule_value): bool
  {
    $data = explode(':', $rule_value);
    return (!getDb()->query("SELECT $data[1] FROM $data[0] WHERE $data[1] = ?", [$value])->getColumn());
  }

  protected function ext($value, $rule_value)
  {
    $fileName = $value['name'] ?? '';
    if (empty($fileName)) return true;

    $allowedExtensions = explode('|', $rule_value);
    $fileExtension = getFileExt($fileName);

    return in_array($fileExtension, $allowedExtensions);
  }

  protected function size($value, $rule_value)
  {
    $fileSize = $value['size'] ?? '';
    if (empty($fileSize)) return true;

    return $fileSize <= $rule_value;
  }

}