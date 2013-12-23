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

if ($zip->open($filename, ZIPARCHIVE::CREATE)!==TRUE) {
    exit("cannot open <$filename>\n");
}



// // grab all the on the page
$xpath = new DOMXPath($dom);
$hrefs = $xpath->evaluate("/html/body//a");
// array to save links
$linksArray=array();

for ($i = 0; $i < $hrefs->length; $i++) {

//   // display the table of links

       $href = $hrefs->item($i);
       $url = $href->getAttribute('href');
       if (in_array($url, $linksArray)=== false)
       $linksArray[]=$url;

     }


// if the site is patent 
if (strpos($_GET['search_site'] , 'patft.uspto.gov') !== FALSE) {
       
        // get how many numbers of pages 
        $start=strpos(file_get_contents($_GET['search_site']),'out of');

        $LENGTH=10;

         
        $numberOfResult=substr(file_get_contents($_GET['search_site']), $start+15, $LENGTH);  


       
        // page number 
        $p=1;

        // the range of values
        $range=0;

        // get last URL

        $params=$linksArray[count($linksArray)-2];

                // loop through pages
        for ( $x = 51; $x <= $numberOfResult ; $x++ ) {

          $prevX=$x-1;

          $params=str_replace("&r=".$prevX, "&r=".$x, $params);

          if ($x == ((int)$range+51)) {

            $nextP=$p+1;

            $p=$nextP-1;

            
            $params=str_replace("&p=".$p, "&p=".$nextP, $params);

            $p=$nextP;

            $range+=50;
    
          }

          $linksArray[]=$params;

        }
        
        
       
    }

      // a reference to file number
        $y=1;
  //   // loop the links 

    foreach ( $linksArray as $link) {

      //        // get the content of the file 

       if (strpos($link , 'http://') !== FALSE OR strpos($link , 'https://') !== FALSE) {

                  $fileContent=@file_get_contents($link);
                  // echo "n false".$url;

       } else {

                $fileContent=@file_get_contents($_GET['search_site'].$link);
                  // echo "n true".$_GET['search_site'].$url;

      }

    

       // look for any of the words we are searching for
 
       foreach ($searchWords as $searchWord) {


           $regex = '/'.trim($searchWord).'/'; 

           if (preg_match($regex, $fileContent)) {
          
            

             // The ”source” HTML you want to convert.
             $html = $fileContent;

             // Instantiate a new instance of the class. Passing the string
             // variable automatically loads the HTML for you.
             $h2t = new html2text($html);

             // Simply call the get_text() method for the class to convert
             // the HTML to the plain text. Store it into the variable.
             $text = $h2t->get_text();

             //$h2t->print_text();
             // Or, alternatively, you can print it out directly:

             file_put_contents("test".$y.".txt", $text );

             $zip->addFile("test".$y.".txt", "test".$y.".txt");

             echo "<tr class=d0><td>".$y."</td><td><a href=test".$y.".txt>link to file".$y."</a></td>";

             $y=$y+1;

             break;
            
        } 

       }          
     
  }




  // // this to collect other links from the page in patent

    

      $zip->close();

      echo "<br/><a href=".$filename.">".$filename."</a><br/>";


?>