<?php

include('vendor/erusev/parsedown/Parsedown.php');

class Extension extends Parsedown
{
    public $array_line = array();

    // Override
    protected function blockHeader($Line)
    {
        // Parse $Line to parent class
        $Block = Parsedown::blockHeader($Line);

        // Set headings
        if(isset($Block['element']['name'])){
            $Level = (integer) trim($Block['element']['name'],'h');
            $this->array_line[] = [
                'text' => $Block['element']['text'],
                'level' => $Level,
            ];
        }

        return $Block;
    }
}

$text = file_get_contents('accesspermissions.md');

$Parsedown   = new Extension();
$string_body = $Parsedown->text($text);
$array_ToC   = $Parsedown->array_line;

# Print headings
foreach ($array_ToC as $heading) {
    if ($heading['level'] == 1) {
        print_r ($heading['text'] . "\n");
    }
    else {
        print_r (" " . $heading['text']. "\n");
    }

}

// all markdown files
$files = array();

$dir = new DirectoryIterator(dirname('.'));
foreach ($dir as $fileinfo) {

    // check if the filename ends with .md - why is there no endsWith in PHP?
    if (substr( $fileinfo->getFilename(), strlen( $fileinfo->getFilename() ) - strlen( '.md' ) ) == '.md' ) {
        $files[] = $fileinfo->getFilename();
    }
}

//sort
natsort($files);

print_r($files);
//echo $string_body;