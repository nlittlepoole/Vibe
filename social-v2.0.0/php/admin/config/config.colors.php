<?php
$skins = array(
	"style-default" => "#25ad9f",
	"green-army" =>	array(
		"primaryColor" => "#9FB478",
		"linkColor" => "#9c62ab",
		"secondaryColor" => "#64b1a0",
	),
	"alizarin-crimson" => "#F06F6F",
	"blue-gray" => array(
		"primaryColor" => "#5577b4",
		"linkColor" => "#cd7373",
		"secondaryColor" => "#cd7373"
	),
	"brown" => array(
		"primaryColor" => "#d39174",
		"linkColor" => "#a43434",
		"secondaryColor" => "#ba5353"
	),
	"purple-gray" => array(
		"primaryColor" => "#AF86B9",
		"linkColor" => "#69aee0",
		"secondaryColor" => "#5490bb"
	),
	"purple-wine" => "#CC6788",
	
	"black-and-white" => "#979797",
	"amazon" => array(
		"primaryColor" => "#8BC4B9",
		"linkColor" => "#3889a3",
		"secondaryColor" => "#8BC4B9",
	),
	"amber" => array(
		"primaryColor" => "#b0b069",
		"linkColor" => "#be7b7b",
		"secondaryColor" => "#be7b7b",
	),
	"android-green" => array(
		"primaryColor" => "#A9C784",
		"linkColor" => "#6792d3",
		"secondaryColor" => "#6792d3",
	),
	"antique-brass" =>  array(
		"primaryColor" => "#B3998A",
		"linkColor" => "#6fbbb6",
		"secondaryColor" => "#6fbbb6",
	),
	"antique-bronze" => array(
		"primaryColor" => "#8D8D6E",
		"linkColor" => "#6997a2",
		"secondaryColor" => "#6997a2",
	),
	"artichoke" => array(
		"primaryColor" => "#B0B69D",
		"linkColor" => "#b88383",
		"secondaryColor" => "#b88383",
	),
	"atomic-tangerine" => array(
		"primaryColor" => "#F19B69",
		"linkColor" => "#aa2828",
		"secondaryColor" => "#F19B69",
	),
	"bazaar" => array(
		"primaryColor" => "#98777B",
		"linkColor" => "#a09141",
		"secondaryColor" => "#98777B",
	),
	"bistre-brown" => array(
		"primaryColor" => "#C3A961",
		"linkColor" => "#6691c2",
		"secondaryColor" => "#a2a2a2",
	),

	"green" => "#77ac40",
	"bittersweet" => "#d6725e",
	"blueberry" => array(
		"primaryColor" => "#7789D1",
		"linkColor" => "#67b5a4",
		"secondaryColor" => "#47517a",
	),
	"bud-green" => array(
		"primaryColor" => "#6fa362",
		"linkColor" => "#a37762",
		"secondaryColor" => "#a37762",
	),
	"coral" => "#7eccc2",
	"burnt-sienna" => "#E4968A"

);

$primaryColor = isset($_GET['skin']) ? (is_array($skins[$_GET['skin']]) ? $skins[$_GET['skin']]['primaryColor'] : $skins[$_GET['skin']]) : $skins["style-default"];
$dangerColor = "#b55151";
$successColor = "#609450";
$warningColor = "#ab7a4b";
$inverseColor = "#45484d";
$infoColor = '#4a8bc2';