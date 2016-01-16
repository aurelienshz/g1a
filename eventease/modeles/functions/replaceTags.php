<?php
function replaceTags($text) {
    $blockTags = ['h1','h2','h3','strong','p','ul','li'];
    $inlineTags = ['br'];

    foreach($blockTags as $tag) {
        $text = preg_replace("#\[((\/?)(".$tag."))\]#i","<$2$3>",$text);
    }
    foreach($inlineTags as $tag) {
        $text = preg_replace("#\[(".$tag.") ?\/\]#i","<$1 />",$text);
    }
    return $text;
}
?>
