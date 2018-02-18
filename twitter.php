<?php
     
    session_start();
     
    require "twitteroauth/autoload.php";

    use Abraham\TwitterOAuth\TwitterOAuth;

?>





<html>
<head>

    <title>Twitter API</title>
    
    <style> 
    
        h1 {
            
            text-align: center;
            padding: 1.5em;
            
        }
        
.centerDiv {
     margin: 0 auto;
     width: 600px; 
}
    
    </style>


</head>

	<body>
        
        <h1>Testing Twitter API</h1>
        
<div class="centerDiv">     

<?php
     
   
  
    $apikey="gh52gp8IZQcp9CRjZYIm45KUx";
    $apisecret="td4e1npvJUwgwzVgjzJRWadGOYVF2KK4CrNDQ3I2xlQ4Wd5c76";
    $accesstoken="948627543707586561-Mf1gcWWNoh8TEKAY891bF5sLr2qtOAK";
    $accessssecret="VNh1v9MqD0fQVaAkg3VQG3Xg8u83RpPJGR6uETidaz4cW";

    // connection  variabile // creating an object 
    $connection = new TwitterOAuth($apikey, $apisecret, $accesstoken, $accessssecret);

   /* $content = $connection->get('statuses/user_timeline',
    ["screen_name" => "polska", "include_rts" => "true", "count" => 5]
    );*/
    //print_r($content);



     /* foreach($content as $tweet) {
        
        echo $tweet->text;
        
         echo $tweet->favorite_count;
        
        echo "<br />";
        
        
    }*/


   /* $response = $connection->post('statuses/update',
    ["status" => "Test 88"]);

                             
    print_r($response);*/

   
    

   $response = $connection->get('statuses/home_timeline',
    ["name" => "ChrisTestTwitt", "count" => "25"]);
                                 
   //print_r($response);


   foreach ($response as $tweet) {
        
       $fav = $tweet->favorite_count;
       
       if ($fav>=0) {
    
           $embed = $connection->get('statuses/oembed', ["url" => "https://twitter.com/ChrisTestTwitt/status/$tweet->id"]);
           
           //print_r($embed);
       
            echo $embed->html;
           
       }
    
  }

?>
    </div>   
        
    </body>
</html>
