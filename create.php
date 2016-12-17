<?php

// Using font-weight is not recommended. Gmail doesn't make it look properly

// Arial is the safest font you can go with
$fontFamily = 'font-family: Arial, Helvetica, sans-serif;';

$targets = array(
	0 => (object)[
		'alt' => 'logo',
		'href' => 'http://a.com?some-tracking-code=newsletter',
		'src' => 'https://placeholdit.imgix.net/~text?txtsize=33&txt=logo&w=241&h=60'
	],
	1 => (object)[
		'alt' => 'some alt text',
		'href' => 'http://a.com?some-tracking-code=newsletter',
		'src' => 'https://placeholdit.imgix.net/~text?txtsize=33&txt=1col-image&w=600&h=298'
	],
	3 => (object)[
		'alt' => 'some alt text',
		'href' => 'http://a.com?some-tracking-code=newsletter',
		'src' => 'https://placeholdit.imgix.net/~text?txtsize=60&txt=2col-image&w=600&h=494'
	],
	4 => (object)[
		'alt' => 'some alt text',
		'href' => 'http://a.com?some-tracking-code=newsletter',
		'src' => 'https://placeholdit.imgix.net/~text?txtsize=60&txt=2col-image&w=600&h=494'
	],
	5 => (object)[
		'alt' => 'some alt text',
		'href' => 'http://a.com?some-tracking-code=newsletter',
		'src' => 'https://placeholdit.imgix.net/~text?txtsize=33&txt=2col-image&w=300&h=250',
		'buttonTxt' => 'THIS BUTTON IS MADE<br>FOR CLICKING',
		'backgroundSrc' => 'https://www.w3.org/2008/site/images/page/page_bkg.jpg'
	],
);

function getPart ($fileName) {
	global $fontFamily;
	global $targets;
	return eval("return <<< EOD\n\n".file_get_contents("part/{$fileName}")."\nEOD;\n\"\";");
}

$html = '';
$html .= getPart("0-begin.html");
$html .= getPart("1-style1.html");
$html .= getPart("2-style2.html");
$html .= getPart("3-style3.html");
$html .= getPart("4-style-custom.html");
$html .= getPart("5-pre-body.html");
	$html .= getPart("body-full-background-2col.html");
	$html .= getPart("body-interruption-line.html");
	$html .= getPart("body-full-background-1col.html");
	$html .= getPart("body-1col-image.html");
	$html .= getPart("body-1col-text-background-color.html");
	$html .= getPart("body-2col-images.html");
	$html .= getPart("body-2col-mixed.html");
	$html .= getPart("body-footer.html");
$html .= getPart("6-after-body.html");

$file = fopen("template.html", "w");
fwrite($file, $html);
fclose($file);

echo "template.html generated\n";
