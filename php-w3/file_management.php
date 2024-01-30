<?php
class File{
    public $file_name;
    public $size;
    public function get_file_extension(){
        $parts=explode('.',$this->file_name);
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