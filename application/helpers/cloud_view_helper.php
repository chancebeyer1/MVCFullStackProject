<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

function buildCloudBuyOptionsNOJS($options){
    $optionString = '<select name="cloud" style="padding:5px; border-radius:5px;">';
    foreach ($options as $amount => $price) {
        $optionString .= '<option value="'.$amount.'">'.$amount.' GB    '.printCloudPrice($price, $amount).'</option>';
    }
    $optionString .= '</select>';
    return $optionString;
}
function buildCloudBuyOptions($displayOptions, $priceOptions = null){
    if(!$priceOptions) $priceOptions = $displayOptions;
    $firstAmount = array_keys($displayOptions)[0];
    $firstPrice = array_keys($priceOptions)[0];
    $firstDisplayPrice = $displayOptions[$firstAmount];
    $optionString = '<div class="select" style="display:none;">'
            . '<input class="selectVal" type="hidden" name="cloud" value="'.$firstAmount.'">'
            . '<div class="styledSelect">'.$firstAmount.' GB <span style="float:right;">'.printCloudPrice($firstDisplayPrice, $firstAmount).'</span>'.'</div>'
            . '<ul class="options" style="display: none; max-height: 200px; overflow: auto;">';
    foreach ($displayOptions as $amount => $displayPrice) {
        $optionString .= '<li rel="'.$amount.'" data-price="'.$priceOptions[$amount].'">'.$amount.' GB <span style="float:right;">'.printCloudPrice($displayPrice, $amount).'</span></li>';
    }
    $optionString .= '</ul></div>';
//    var_dump($optionString);
    return $optionString;
}
function printCloudPrice($displayPrice, $amount){
    if($displayPrice == 0 && $amount > 0) return "Included";
    elseif($displayPrice == 0 && $amount == 0) return "$0/year";
    else return "+$".$displayPrice."/year";
}