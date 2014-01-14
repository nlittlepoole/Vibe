<?php 
require_once( CLASS_PATH . "/Web/User.php");
require_once( CLASS_PATH . "/Web/Achievements.php");
require_once( CLASS_PATH . "/Web/String.php");
function dashboard($facebook,$uid,$token,$force){
if(refresh($uid) ||$force){
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD ); //database connection is established uisng credentials in config.php
    $sql = "SELECT * FROM user WHERE UID=$uid"; //sql query that returns the string of the question in the table
    $st = $conn->prepare( $sql );// prevents user browser from seeing queries. Useful for security
    $st->execute();//executes query above
    $data=$st->fetch(); //$question source is set to result of query
    $new_communities='<li>
              <a href="/website/search.php"><u>
              Search for Communities</u></a>
            </li>';
    $user_profile = $facebook->api('/me','GET');
    $data['Name']=$user_profile['name'];
    $communities=split('&&',$data['Communities']);
    foreach($communities as $community){
         $temp=stristr($community, "|", true);
         $temp2=substr(stristr($community, "||"),2);
        $new_communities=$new_communities.
                    '<li>
              <a href="/index.php?action=location&location='.$temp2.'">
              '.$temp.'</a>
            </li>';
    }
    $data['Communities']=$new_communities;
    
    //Pulling out achievements and storing them in SESSION
    $_SESSION['achievementsProgress'] = array($data['Helping Hand_progress'], $data['Pal_progress'], 
    $data['Advocate_progress'], $data['Comrade_progress'], $data['Mother Teresa_progress'], 
    $data['Diva_progress'], $data['King of the Hill_progress'], $data['Ideator_progress'], 
	$data['Visionairy_progress'], $data['Blogger_progress'], $data['Commander of Words_progress'], 
	$data['Viber_progress']);
	
	//Also set up the achievements too
	$_SESSION['achievementsInfo'] = achievements();
	colorWithVibe();
	
	//Set up a modified achievements array to display in the nav bar
	$achievementsNavBar = array();
	$currSize = 0;
	for($i = 0; $i < count($_SESSION['achievementsProgress']); $i++) {
		if($_SESSION['achievementsProgress'][$i] < 10) {	
			$achievementsNavBar[$currSize] = array($i + 1, $_SESSION['achievementsProgress'][$i]);	
			$currSize++;
		}
	}

	//organize achievementsNavBar from largest score to smallest
	for($i = 0; $i < count($achievementsNavBar); $i++) {
		$localMax = $achievementsNavBar[$i][1]; 
		$localPos = $i;
		for($j = $i; $j < count($achievementsNavBar); $j++) {
			if($achievementsNavBar[$j][1] > $localMax) {
				$localMax = $achievementsNavBar[$j][1];
				$localPos = $j;
			}
		}
		//swap the largest element with the element at i
		$temp = $achievementsNavBar[$i];
		$achievementsNavBar[$i] = $achievementsNavBar[$localPos];
		$achievementsNavBar[$localPos] = $temp;
	}
	
	achievementsNotificationCreator($achievementsNavBar); 
    
    $data['Comments_Size']=$data['Comments']!=''?sizeof(split('&&',$data['Comments'])):0;
    $data['Comments']=dashboardComments($data['Comments']);
    //print_r($data['Comments']);
    $scores=Array(
      "Affability"=>$data['Affability'],
      "Ambition"=>$data['Ambition'],
      "Attractiveness"=>$data['Attractiveness'],
      "Confidence"=>$data['Confidence'],
      "Fun"=>$data['Fun'],
      "Happiness"=>$data['Happiness'],
      "Honesty"=>$data['Attractiveness'],
      "Humility"=>$data['Humility'],
      "Humor"=>$data['Humor'],
      "Intelligence"=>$data['Intelligence'],
      "Kindness"=>$data['Kindness'],
      "Promiscuity"=>$data['Promiscuity'],
      "Reliability"=>$data['Reliability'],
      "Style"=>$data['Style'],
      );
    $data['Percentiles']=getPercentiles("global",$scores);
    $data['Attractiveness_Keywords']=isset($data['Attractiveness_Keywords'])? keywords($data['Attractiveness_Keywords'],$data['Attractiveness_Total'],4) : "N/A";
    $data['Affability_Keywords']=isset($data['Affability_Keywords'])? keywords($data['Affability_Keywords'],$data['Affability_Total'],3) : "N/A";
    $data['Intelligence_Keywords']=isset($data['Intelligence_Keywords'])? keywords($data['Intelligence_Keywords'],$data['Intelligence_Total'],4) : "N/A";
    $data['Style_Keywords']=isset($data['Style_Keywords'])? keywords($data['Style_Keywords'],$data['Style_Total'],2) : "N/A";
    $data['Promiscuity_Keywords']=isset($data['Promiscuity_Keywords'])? keywords($data['Promiscuity_Keywords'],$data['Promiscuity_Total'],2) : "N/A";
    $data['Humor_Keywords']=isset($data['Humor_Keywords'])? keywords($data['Humor_Keywords'],$data['Humor_Total'],2) : "N/A";
    $data['Confidence_Keywords']=isset($data['Confidence_Keywords'])? keywords($data['Confidence_Keywords'],$data['Confidence_Total'],1) : "N/A";
    $data['Fun_Keywords']=isset($data['Fun_Keywords'])? keywords($data['Fun_Keywords'],$data['Fun_Total'],2) : "N/A";
    $data['Kindness_Keywords']=isset($data['Kindness_Keywords'])? keywords($data['Kindness_Keywords'],$data['Kindness_Total'],2) : "N/A";
    $data['Honesty_Keywords']=isset($data['Honesty_Keywords'])? keywords($data['Honesty_Keywords'],$data['Honesty_Total'],2) : "N/A";
    $data['Reliability_Keywords']=isset($data['Reliability_Keywords'])? keywords($data['Reliability_Keywords'],$data['Reliability_Total'],1) : "N/A";
    $data['Happiness_Keywords']=isset($data['Happiness_Keywords'])? keywords($data['Happiness_Keywords'],$data['Happiness_Total'],2) : "N/A";
    $data['Ambition_Keywords']=isset($data['Ambition_Keywords'])? keywords($data['Ambition_Keywords'],$data['Ambition_Total'],2) : "N/A";
    $data['Humility_Keywords']=isset($data['Humility_Keywords'])? keywords($data['Humility_Keywords'],$data['Humility_Total'],2) : "N/A";
    $data["pic"]="http://graph.facebook.com/" . $uid . "/picture?width=300&height=300";
    $_SESSION['refresh']=DateTime(date("Y-m-d H:i:s", time()));
    $_SESSION['dashboard']=$data;
    $conn=null;
  }
  else{
    return $_SESSION['dashboard'];
  }
 }
  function profile($facebook,$uid,$token ){
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD ); //database connection is established uisng credentials in config.php
    $sql = "SELECT * FROM user WHERE UID=$uid"; //sql query that returns the string of the question in the table
    $st = $conn->prepare( $sql );// prevents user browser from seeing queries. Useful for security
    $st->execute();//executes query above
    $data=$st->fetch(); //$question source is set to result of query
    $data['Comments_Size']=$data['Comments']!=''?sizeof(split('&&',$data['Comments'])):0;
    $data['Comments']=comments($data['Comments']);
    //print_r($data['Comments']);
    $scores=Array(
      "Affability"=>$data['Affability'],
      "Ambition"=>$data['Ambition'],
      "Attractiveness"=>$data['Attractiveness'],
      "Confidence"=>$data['Confidence'],
      "Fun"=>$data['Fun'],
      "Happiness"=>$data['Happiness'],
      "Honesty"=>$data['Attractiveness'],
      "Humility"=>$data['Humility'],
      "Humor"=>$data['Humor'],
      "Intelligence"=>$data['Intelligence'],
      "Kindness"=>$data['Kindness'],
      "Promiscuity"=>$data['Promiscuity'],
      "Reliability"=>$data['Reliability'],
      "Style"=>$data['Style'],
      );
    $data['Percentiles']=getPercentiles("global",$scores);
    $data['Attractiveness_Keywords']=isset($data['Attractiveness_Keywords'])? keywords($data['Attractiveness_Keywords'],$data['Attractiveness_Total'],4) : "N/A";
    $data['Affability_Keywords']=isset($data['Affability_Keywords'])? keywords($data['Affability_Keywords'],$data['Affability_Total'],3) : "N/A";
    $data['Intelligence_Keywords']=isset($data['Intelligence_Keywords'])? keywords($data['Intelligence_Keywords'],$data['Intelligence_Total'],4) : "N/A";
    $data['Style_Keywords']=isset($data['Style_Keywords'])? keywords($data['Style_Keywords'],$data['Style_Total'],2) : "N/A";
    $data['Promiscuity_Keywords']=isset($data['Promiscuity_Keywords'])? keywords($data['Promiscuity_Keywords'],$data['Promiscuity_Total'],2) : "N/A";
    $data['Humor_Keywords']=isset($data['Humor_Keywords'])? keywords($data['Humor_Keywords'],$data['Humor_Total'],2) : "N/A";
    $data['Confidence_Keywords']=isset($data['Confidence_Keywords'])? keywords($data['Confidence_Keywords'],$data['Confidence_Total'],1) : "N/A";
    $data['Fun_Keywords']=isset($data['Fun_Keywords'])? keywords($data['Fun_Keywords'],$data['Fun_Total'],2) : "N/A";
    $data['Kindness_Keywords']=isset($data['Kindness_Keywords'])? keywords($data['Kindness_Keywords'],$data['Kindness_Total'],2) : "N/A";
    $data['Honesty_Keywords']=isset($data['Honesty_Keywords'])? keywords($data['Honesty_Keywords'],$data['Honesty_Total'],2) : "N/A";
    $data['Reliability_Keywords']=isset($data['Reliability_Keywords'])? keywords($data['Reliability_Keywords'],$data['Reliability_Total'],1) : "N/A";
    $data['Happiness_Keywords']=isset($data['Happiness_Keywords'])? keywords($data['Happiness_Keywords'],$data['Happiness_Total'],2) : "N/A";
    $data['Ambition_Keywords']=isset($data['Ambition_Keywords'])? keywords($data['Ambition_Keywords'],$data['Ambition_Total'],2) : "N/A";
    $data['Humility_Keywords']=isset($data['Humility_Keywords'])? keywords($data['Humility_Keywords'],$data['Humility_Total'],2) : "N/A";
    $data["pic"]="http://graph.facebook.com/" . $uid . "/picture?width=300&height=300";
    $conn=null;
    return $data;

 }
    ?> 
