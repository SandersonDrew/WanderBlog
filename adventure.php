<?php
echo "lol";
$fi = new FilesystemIterator("/photos/dan/1", FilesystemIterator::SKIP_DOTS);
echo iterator_count($fi);
?>