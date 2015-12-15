<?php
$fi = new FilesystemIterator("/photos/dan/1", FilesystemIterator::SKIP_DOTS);
printf("There were %d Files", iterator_count($fi));
?>