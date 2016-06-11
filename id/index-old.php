<?php
header("Content-type:application/ld+json");

// It will be called downloaded.pdf
header("Content-Disposition:attachment;filename='id.jsonld'");

// The PDF source is in original.pdf
readfile("id.jsonld");
?>