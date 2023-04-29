<?php 
    class NumericInput extends TextInput {
        public function add($newText){
            if(is_numeric($newText)){
                $this->text .= $newText;
            }
        }
    }

    $newNumericInput = new NumericInput();
    $newNumericInput->add(123);
    $newNumericInput->add('hedddj');

    echo $newNumericInput->getValue();
?>