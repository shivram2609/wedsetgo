<?php

return [

"authconfig" => [

"base_url" => "http://localhost:8000/vendor/hybridauth/",

"providers" => [

"Twitter" => [

"enabled" => true,

"keys" => array ( "key" => "", "secret" => "" )

],

"Google" => [

"enabled" => true,

"keys" => array ( "id" => "PUT_YOURS_HERE", "secret" => "PUT_YOURS_HERE" ),

"scope" => "https://www.googleapis.com/auth/userinfo.profile ". // optional

"https://www.googleapis.com/auth/userinfo.email" , // optional

"access_type" => "offline", // optional

"approval_prompt" => "force", // optional

"hd" => "domain.com" // optional

]
]
]];
?>
