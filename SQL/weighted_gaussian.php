<?php
function generateGaussianRandom($mean, $min, $max, $inputValue) {
    $sigma = 30 - (2023 - $inputValue) * 0.5; 
    
    $x = 0;
    $y = 0;
    $w = 0;
    
    do {
        $x = 2.0 * mt_rand() / mt_getrandmax() - 1;
        $y = 2.0 * mt_rand() / mt_getrandmax() - 1;
        $w = $x * $x + $y * $y;
    } while ($w >= 1 || $w == 0);
    
    $w = sqrt((-2.0 * log($w)) / $w);
    $gaussianRandom = $mean + $sigma * $x * $w;
    
    // Ensure the generated number is within the specified range
    $gaussianRandom = round(min(max($gaussianRandom, $min), $max));
    
    return $gaussianRandom;
}
?>