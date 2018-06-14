<?php
/*
* @Author: Talha Habib
* @Description: A Simple Library to handle path without using php built-in
* path handling functions
* @Dated: Jun 14 2018
*/
class Path
{
    public $currentPath;

    function __construct($path)
    {
        $this->currentPath = $path;
    }
    public function cd($newPath)
    {
        $dir  = explode("/",$this->currentPath);
        $dirC = count($dir)-1;
        // back operation
        $path = explode("/",$newPath);
        $pathC= count($path)-1;
        foreach($path as $ap){
            if($ap!=''){
                if($ap=='..'){
                    array_pop($dir);
                }
                if($ap=="."){
                    // do nothing
                }
                if($ap!=".." && $ap!="."){
                    $dir[] = $ap;
                }
            }
        }
        $this->currentPath = implode("/",$dir);
    }
}

$path = new Path('/a/b/c/d');
$path->cd('.././s');
echo $path->currentPath;
