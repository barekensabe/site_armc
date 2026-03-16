<?php
 

 /**
  * 
  */
 class Mapapi extends CI_Controller
 {
 	
 	function __construct()
 	{
 		# code...
 		parent::__construct();
 	}

 	function test() {

		// create & initialize a curl session  || catering.restaurant,catering.cafe 	
		
		$url_base = 'https://api.geoapify.com/v2/places?';
		$categories = 'accommodation';
		$token = '7d3dbd32e0f54a018d0d3a05db741a68';
		$critere = 'bias=proximity';
		$point = '29.3875304,-3.390436';
		$limit = 20;

		$curl = curl_init();

		// set our url with curl_setopt()
		curl_setopt($curl, CURLOPT_URL, "".$url_base."categories=".$categories."&".$critere.":".$point."&limit=".$limit."&apiKey=".$token."");

		// return the transfer as a string, also with setopt()
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		// curl_exec() executes the started curl session
		// $output contains the output string
		$output = curl_exec($curl);

		// close curl resource to free up system resources
		// (deletes the variable made by curl_init)
		curl_close($curl);
		$response =  json_decode($output);
		$features = $response->features;
		$nbdata = count($features);

		for ($i=0; $i < $nbdata; $i++) { 
			# code...

		$traitement = $features[$i];
		$properties = $traitement->properties;
		echo '<br>'.$name = $properties->name;
		echo '<br>'.$street = $properties->street;
		echo '<br>'.$suburb = $properties->suburb;
		echo '<br>'.$city = $properties->city;
		echo '<br>'.$state = $properties->state;
		echo '<br>'.$postcode = $properties->postcode;
		echo '<br>'.$country = $properties->country;
		echo '<br>'.$country_code = $properties->country_code;
		echo '<br>'.$lon = $properties->lon;
		echo '<br>'.$lat = $properties->lat;
		echo '<br>'.$formatted = $properties->formatted;
		echo '<br>'.$address_line1 = $properties->address_line1;
		echo '<br>'.$address_line2 = $properties->address_line2;
		echo '<br>'.$distance = $properties->distance;

		$datasource = $properties->datasource;
		$raw = $datasource->raw;

		if (array_key_exists("phone",$raw))
		echo '<br>'.$phone = $raw->phone;

		if (array_key_exists("website",$raw))
		echo '<br>'.$website = $raw->website;

		if (array_key_exists("email",$raw))
		echo '<br>'.$email = $raw->email;

		echo "<br><hr>";
	 



		}

		 
		 // echo $nbdata."<pre>";
		 // print_r($features);
		 // echo "<pre>";
		 

 		}


 		}
 
?>