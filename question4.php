<?php
$file = fopen("1.txt", "r") or die("Unable to open file!");
echo fread($file, filesize("example_copy.txt"));
fclose($file);
?>
<?php
$file = fopen("1.txt", "w") or die("Unable to open file!");
fwrite($file, "Welcome in the world of machine learning.");
fclose($file);
echo "File written successfully.";
?>
<?php
$file = fopen("2.txt", "a") or die("Unable to open file!");
fwrite($file, "This is an appended message.");
fclose($file);
echo "File appended successfully.";
?>
<?php
if (copy("2.txt", "1.txt")) {
    echo "File copied successfully.";
} else {
    echo "Failed to copy file.";
}
?>
<?php
if (rename("3.txt", "renamed_sample.txt")) {
    echo "File renamed successfully.";
} else {
    echo "Failed to rename file.";
}
?>
<?php
if (unlink("4.txt")) {
    echo "File deleted successfully.";
} else {
    echo "Failed to delete file.";
}
?>

