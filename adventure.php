<?php
echo "lol";
echo "Bantser";
$lel = getcwd();
$string = $lel."/photos/dan/1";
$fi = new FilesystemIterator($string, FilesystemIterator::SKIP_DOTS);
echo "Medoicre Banter";
echo iterator_count($fi);
echo "greate banter";
?>