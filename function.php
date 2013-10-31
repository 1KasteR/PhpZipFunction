<?php
function ZipDir($dir, $filename)
{
// increase script timeout value
ini_set("max_execution_time", 300);
// create object
$zip = new ZipArchive();
// open archive
if ($zip->open($filename, ZIPARCHIVE::CREATE) !== TRUE) {
die ("Could not open archive");
}
// initialize an iterator
// pass it the directory to be processed
$iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir));
// iterate over the directory
// add each file found to the archive
foreach ($iterator as $key=>$value) {
$zip->addFile(realpath($key), $key) or die ("ERROR: Could not add file: $key");
}
// close and save archive
$zip->close();
echo "Archive created successfully.";
}
?>
