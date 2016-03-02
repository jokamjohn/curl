<?php
/**
 * Created by PhpStorm.
 * User: jokamjohn
 * Date: 3/2/2016
 * Time: 8:50 PM
 */

// test URLs
$urls = [
    "http://www.cnn.com",
    "http://www.mozilla.com",
    "http://www.facebook.com"
];

// test browsers
$browsers = array(

    "standard" => array (
        "user_agent" => "Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.6) Gecko/20091201 Firefox/3.5.6 (.NET CLR 3.5.30729)",
        "language" => "en-us,en;q=0.5"
    ),

    "iphone" => array (
        "user_agent" => "Mozilla/5.0 (iPhone; U; CPU like Mac OS X; en) AppleWebKit/420+ (KHTML, like Gecko) Version/3.0 Mobile/1A537a Safari/419.3",
        "language" => "en"
    ),

    "french" => array (
        "user_agent" => "Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; GTB6; .NET CLR 2.0.50727)",
        "language" => "fr,fr-FR;q=0.5"
    )

);

foreach($urls as $url)
{
    echo "URl: $url\n";

    foreach ($browsers as $test_name => $browser)
    {
        $ch = curl_init();

        curl_setopt($ch,CURLOPT_URL,$url);

        //set browser headers.
        curl_setopt($ch,CURLOPT_HTTPHEADER,[
            "User-Agent: {$browser['user_agent']}",
            "Accept-Language: {$browser['language']}"
        ]);

        //no response body.
        curl_setopt($ch,CURLOPT_NOBODY,1);

        //return headers.
        curl_setopt($ch,CURLOPT_HEADER,1);

        // return the results instead of outputting it
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);

        //output
        $output = curl_exec($ch);

        //close.
        curl_close($ch);

        // was there a redirection HTTP header?
        if(preg_match("!Location: (.*)!",$output,$matches))
        {
            echo "$test_name: redirects to $matches[1]\n";
        }
        else{
            echo "$test_name: no redirection\n";
        }
    }

    echo "\n\n";
}