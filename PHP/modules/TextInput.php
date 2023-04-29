<?php 
    class TextInput {
        public $text = '';
        public function add($newText) {
            $this->text .= $newText;
        }
        public function getValue() {
            return $this->text;
        }
    }

    $newTextInput = new TextInput();
    $newTextInput->add('hej');
    $newTextInput->add('hedddj');

    echo $newTextInput->getValue();

?>