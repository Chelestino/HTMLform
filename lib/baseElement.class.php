<?php

/**
 * Description of baseElement
 *
 * @author User
 */
class baseFormElement {

    protected $attributes;

    function __construct() {
        $this->attributes = $attributes = array();
    }

    /**
     * добавляет один атрибут
     * @param type $attribute
     * @param type $value
     */
    function addAttribute($attribute, $value) {
        $this->attributes[$attribute] = $value;
    }

    /**
     * назначает атрибуты
     * @param type $allAttrYouNeed
     */
    function setAttributes($allAttrYouNeed = array()) {
        foreach ($allAttrYouNeed as $key => $value) {
            $this->attributes[$key] = $value;
        }
    }

    /**
     * удаляет атрибут
     * @param type $attribute
     */
    function removeAttribute($attribute) {
        foreach ($this->attributes as $key => $val) {
            if ($key === $attribute) {
                unset($this->attributes[$key]);
            }
        }
    }

    /**
     * выводит атрибуты
     */
    function getAttributes() {
        foreach ($this->attributes as $key => $val) {
            @$attr_str .= $key . '=' . "'$val'";
        }
        return @$attr_str;
    }

    /**
     * меняет значение атрибута
     * $attr атрибут
     * $value новое значение
     */
    function remapAttributeValue($attr, $newValue) {
        foreach ($this->attributes as $key => $val) {
            if ($key === $attr) {
                $this->attributes[$key] = $newValue;
            }
        }
    }

}

class formInput extends baseFormElement {

    protected $type;

    function __construct($type) {
        parent::__construct();
        $this->attributes['type'] = $type;
    }

    function render() {
        echo '<input ' . baseFormElement::getAttributes() . '>';
    }

    function renderChoise() {
        echo '<input ' . baseFormElement::getAttributes() . '>' . $this->attributes['value'];
    }

}

class formSelect extends baseFormElement {

    protected $options = array();

    function __construct($options) {
        parent::__construct();
        $this->options = $options;
    }

    function addOption($option, $label) {
        $this->options[$option] = $label;
    }

    function removeOption($option) {
        foreach ($this->options as $key => $val) {
            if ($key === $option) {
                unset($this->options[$key]);
            }
        }
    }

    /**
     * меняет значение опции
     * @param type $option
     * @param type $newValue
     */
    function remapOptionValue($option, $newValue) {
        foreach ($this->options as $key => $val) {
            if ($key === $option) {
                $this->options[$key] = $newValue;
            }
        }
    }

    function render() {
        echo '<select ' . baseFormElement::getAttributes() . '>';
        foreach ($this->options as $key => $val) {
            echo '<option value="' . $key . '">' . $val . '</option>';
        }
        echo '</select>';
    }

}

class formTextarea extends baseFormElement {

    function __construct($param) {
        parent::__construct();
        foreach ($param as $key => $value) {
            $this->attributes[$key] = $value;
        }
    }

    function render() {
        echo '<textarea ' . baseFormElement::getAttributes() . '></textarea>';
    }

}
