<?php
echo "lol";
echo "Banter";
$fi = new FilesystemIterator("/photos/dan/1", FilesystemIterator::SKIP_DOTS);
echo "Medoicre Banter";
echo iterator_count($fi);
echo "greate banter";
?>