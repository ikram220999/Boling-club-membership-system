<?php
$text = " How can I cook rice in a clean round pot? ";
echo strlen ($text). "<br>";
$text = trim ($text);
echo $text ."<br>";
echo strtoupper ($text). "<br>";
echo strtolower ($text) . "<br>";
$text = str_replace ("can", "round", $text);
echo $text . "<br>";
echo substr ($text, 2, 6). "<br>";
var_dump (strpos ($text, "can"));
echo "<br>" ;
var_dump (strpos ($text, "could"));
?>