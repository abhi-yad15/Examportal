<?php
//extract data from the post
//set POST variables
$url = 'http://piecolor.com/?picture=example/';
$fields = array(
	//'username' => urlencode("admin"),
    //'password' => urlencode("air1234"),
    //'name'=>urlencode("Abhishek Yadav"),
    //'identifier'=>urlencode("abhishek.dakshana15@gmail.com"),
    //'password'=>urlencode("991953272600"),
    //'to'=>urlencode("abhishek.dakshana15@gmail.com"),
    //'subjectbox'=>urlencode("abhishek"),
    //'region'=>urlencode("Uttar Pradesh"),
    //'subtype'=>urlencode("test"),
    
	//'ColumnHeading1' => urlencode("skill1"),
    //'BarAmounts1'=> urlencode("10"),
	//'ColumnHeading2' => urlencode("skill2"),
    //'BarAmounts2'=> urlencode("10"),
	//'ColumnHeading3' => urlencode("skill3"),
    //'BarAmounts3'=> urlencode("10"),
    'n'=>urlencode("3"),
    'p0'=>urlencode("30"),
    'p1'=>urlencode("30"),
    'p2'=>urlencode("40"),
);

//url-ify the data for the POST
$fields_string="";
foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
rtrim($fields_string, '&');
$count1=strlen($fields_string);
$count1--;
//$fields_string =$fields_string."c=on"; //substr($fields_string, 0,$count1);
//open connection
$fields_string =substr($fields_string, 0,$count1);
$ch = curl_init();
echo $fields_string;
echo "<br>";
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
//set the url, number of POST vars, POST data
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_POST, count($fields));
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

//execute post
$html = curl_exec($ch);// = curl_exec($ch);
//if(curl_exec($ch) === false)
//{
  //  echo 'Curl error: ' . curl_error($ch);
//}
//else
//{
  //  echo 'Operation completed without any errors';
//}
$dom = new DOMDocument();
@$dom->loadHTML($html);


// get your element, you can do this numerous ways like getting by tag, id or using a DOMXPath object
// This example gets elements with id forward-link which might be a div or ul or li, etc
// It then gets all the a tags (links) within all those divs, uls, etc
// Then it takes the first link in the array of links and then grabs the href from the link
$search = $dom->getElementById('dl_pie_chart');
echo $search;
 //echo "eqjflhewl";
$forwardlink = $search->getElementsByTagName('a');
$forwardlink = $forwardlink->item(0);
$forwardlink = $getNamedItem('src');
$href = $forwardlink->textContent;


// Now that you have the link you want to follow/click to
// Set the target_url for the cUrl to the new url
curl_setopt($ch, CURLOPT_URL, $target_url);

$html = curl_exec($ch);

//$input = 'https://nces.ed.gov/tempfiles/nceskids/graphing/pie_87179D0.png';
//$output = 'me1.com.jpg';
//file_put_contents($output, file_get_contents($input));
//close connection
curl_close($ch);
?>