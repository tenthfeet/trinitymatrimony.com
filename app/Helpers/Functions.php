<?php

function arrayToSelectOption(array $a, string $id = "", string $class = "", string $attr = "", string $value = "", string $ph = "")
{
    $data= "<select id='$id' name='$id' class='$class' $attr>";
    if($ph!=""){
        $data.= "<option value=''>--Select $ph--</option><br>";
    }
    foreach ($a as $x => $val) {
        $v = ($x == $value) ? "selected" : "";
        $data.= "<option value='$x' $v>$val</option>";
    }
    $data.= "</select>";
    return $data;
}
