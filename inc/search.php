<?php
$file_name=array();
$search_string="";
$search_string=$_GET["QUERY"];

	echo $search_string;

	$search_result="";
$files="";
$phpfilename="";
$i=0;   
if (!$search_string){
    echo "Please Enter a Query"
}else{
	echo "trying to opened and closed dir";
    if ($handle = opendir('public_html/')) { 
        while (false !== ($file = readdir($handle))){
            if(strrchr($file, '.') === ".txt"){
                $filename[]= $file;
            }
        } 
        closedir($handle); 
		echo "opened and closed dir";
    }
    foreach($filename as $value){
		echo "printing filenames";
        $files="content/$value";
        $fp = strip_tags(file_get_contents($files));
        if(stripos($fp, $search_string)) {
            $search_result.=preg_replace('/<[^>]*>[^<]*<[^>]*>/', '', substr($fp,0,255)); // append a preview to search results
        }
        if($search_result!=""){
            echo $search_result;
        }else{
            echo "No Results<br />";
        }
    }
}?>