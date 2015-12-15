<?php
$fi = new FilesystemIterator(__DIR__, FilesystemIterator::SKIP_DOTS);
printf("There were %d Files", iterator_count($fi));
?>