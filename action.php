<?php


// Include the class definition file.
require_once("class.html2text.inc");

// Original PHP code by Chirp Internet: www.chirp.com.au
  // Please acknowledge use of this code by including this header.

  $url = $_GET['search_site'];

  $searchWords= explode(",", $_GET['search_word']);



  $html = file_get_contents($url);
  $dom = new DOMDocument;

//Parse the HTML. The @ is used to suppress any parsing errors
//that will be thrown if the $html string isn't valid XHTML.
@$dom->loadHTML( $html);
//create the zip file
$zip = new ZipArchive();
$filename = "TEST.zip";

// if ($zip->open($filename, ZIPARCHIVE::CREATE)!==TRUE) {
//     exit("cannot open <$filename>\n");
// }

// // grab all the on the page
// $xpath = new DOMXPath($dom);
// $hrefs = $xpath->evaluate("/html/body//a");


// for ($i = 0; $i < $hrefs->length; $i++) {

//   // display the table of links

//        $href = $hrefs->item($i);
//        $url = $href->getAttribute('href');
//        // get the content of the file 

//        if (strpos($url , 'http://') !== FALSE OR strpos($url , 'https://') !== FALSE) {

//                   $fileContent=@file_get_contents($url);
//                   // echo "n false".$url;

//        } else {

//                 $fileContent=@file_get_contents($_GET['search_site'].$url);
//                   // echo "n true".$_GET['search_site'].$url;

//       }

    

//        // look for any of the words we are searching for

//        foreach ($searchWords as $searchWord) {


//        		$regex = '/'.trim($searchWord).'/'; 

//        		if (preg_match($regex, $fileContent)) {
//   				  // echo "found";
  				  

//     				// The ”source” HTML you want to convert.
//     				$html = $fileContent;

//     				// Instantiate a new instance of the class. Passing the string
//     				// variable automatically loads the HTML for you.
//     				$h2t = new html2text($html);

//     				// Simply call the get_text() method for the class to convert
//     				// the HTML to the plain text. Store it into the variable.
//     				$text = $h2t->get_text();

//     				//$h2t->print_text();
//     				// Or, alternatively, you can print it out directly:

//     				file_put_contents("test".$i.".txt", $text );

//            $zip->addFile("test".$i.".txt", "test".$i.".txt");

//     				echo "<tr class=d0><td>".$i."</td><td><a href=test".$i.".txt>link to file".$i."</a></td>";


  				  
// 			   } 

//        }          
     
// }
  // this to collect other links from the page in patent
$i=1;
    if (strpos($_GET['search_site'] , 'patft.uspto.gov') !== FALSE) {
        //$params = $_GET['search_site'];

        $params=str_replace("&r=".$i, "&r=51", $_GET['search_site']);
        $params=str_replace("&p=".$i, "&p=2", $params);
        
        echo $params;
    }

      $zip->close();

            echo "<br/><a href=".$filename.">".$filename."</a><br/>";


?>