<?php

if ($argc < 2) {
    echo "Please provide the class name as an argument.\n";
    exit(1);
}

$className = $argv[1];
$classTemplate = "<?php\n\nnamespace App\\Models;\n\nclass $className\n{\n    // Class code goes here\n}\n";

$directory = __DIR__ . "/app/Models"; 
$filePath = $directory . "/" . $className . ".php";

if (!file_exists($directory)) {
    mkdir($directory, 0777, true);
}

file_put_contents($filePath, $classTemplate);
echo "Class $className created at $filePath\n";
