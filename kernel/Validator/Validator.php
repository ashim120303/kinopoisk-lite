<?php

namespace App\Kernel\Validator;

class Validator implements ValidatorInterface{
    private array $errors = [];
    private array $data;

    public function validate(array $data, array $rules):bool{
        $this->errors = [];
        $this->data = $data;
        foreach($rules as $key => $rule){
            $rules = $rule;

            foreach($rules as $rule){
                $rule = explode(':', $rule);
                $ruleName = $rule[0];
                $ruleValue = $rule[1] ?? null;

                $error = $this->validateRule($key, $ruleName, $ruleValue);
                if($error){
                    $this->errors[$key][] = $error;
                }
            }
        }
        return empty($this->errors);
    }

    public function errors():array{
        return $this->errors;
    }

    private function validateRule(string $key, string $ruleName, string $ruleValue = null):string | false{
        $value = $this->data[$key];
        switch($ruleName){
            case 'required':
                if(empty($value)){
                    return "field $key is required";
                }
                break;
            case 'min':
                if(strlen($value) < $ruleValue){
                    return "Field $key must be at least {$ruleValue} characters";
                }
                break;
            case 'max':
                if(strlen($value) > $ruleValue){
                    return "Field $key must be less than {$ruleValue} characters";
                }
                break;
            case 'email':
                if(!filter_var($value, FILTER_VALIDATE_EMAIL)){
                    return "Field $key must be a valid email address";
                }
                break;
        }
        return false;
    }
}