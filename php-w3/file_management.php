<?php
class File{
    public $filename;
    public $size;
    public function get_file_extension(){
        $parts=explode('.',$this->filename);
        return end($parts);
    }
    public function display_file_info(){
        echo "Filename: $this->filename, Size: $this->size KB";
    }

}
$file = new File();
$file->filename = "document.txt";
$file->size = 1024;

echo "File Extension: " . $file->get_file_extension() . "<br>";
$file->display_file_info();


?>