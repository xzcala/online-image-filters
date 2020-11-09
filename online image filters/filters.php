<?php
// Array with filters
$filter[] = "Zeppeli"; //yellow
$filter[] = "Scarlet"; //red
$filter[] = "Forest"; //green
$filter[] = "Parakeet"; //blue
$filter[] = "Brick"; //dark red
$filter[] = "Ultimecia"; //brown
$filter[] = "Cerulean"; //light blue
$filter[] = "Gold Experience"; //gold
$filter[] = "Iron"; // light metallic
$filter[] = "Majestic"; //purple
$filter[] = "Naga"; //pink
$filter[] = "Landorus"; //orange
$filter[] = "Abyss"; //black
$filter[] = "Quartz"; //light pink
$filter[] = "World"; //sky blue
$filter[] = "Electric"; //neon yellow
$filter[] = "Yvie"; //dark green
$filter[] = "Democracy"; //??
$filter[] = "Reinhardt"; //silver
$filter[] = "Thorn"; //greenish yellow
$filter[] = "Joestar"; //light purple
$filter[] = "Hermit"; //dark purple
$filter[] = "Valentina"; //tan
$filter[] = "XIV"; //white
$filter[] = "King"; //Crimson
$filter[] = "Otter"; //gray

$request = $_REQUEST["q"];

$hint = "";

if ($request !== "") {
    $request = strtolower($request);
    $len=strlen($request);
    foreach($filter as $filters) {
        if (stristr($request, substr($filters, 0, $len))) {
            if ($hint === "") {
                $hint = $filters;
            } else {
                $hint .= ", $filters";
            }
        }
    }
}

echo $hint === "" ? "No suggestions available. Try again and type the whole name." : $hint;
?>