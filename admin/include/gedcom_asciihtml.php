<?php
function asciihtml($text){
	//$text = str_replace('<', '&lt;', $text); //<
	//$text = str_replace('>', '&gt;', $text); //>
	//$text = str_replace(chr(159), 'f', $text); //f gulden teken
	//$text = str_replace(chr(0128), '&euro;', $text); //euro
	$text = str_replace('<<', '&lt;', $text); //<
	$text = str_replace('>>', '&gt;', $text); //>
	$text = str_replace('&&', '&amp;', $text); //&
	$text = str_replace(chr(4), '<p>', $text); //[Ctrl]-[Enter]
	$text = str_replace(chr(39),'&#039;', $text); //'
	$text = str_replace(chr(128),'&Ccedil;', $text); //�
	$text = str_replace(chr(129),'&uuml;', $text); //�
	$text = str_replace(chr(130),'&eacute;', $text); //�
	$text = str_replace(chr(131),'&acirc;', $text); //�
	$text = str_replace(chr(132),'&auml;', $text); //�
	$text = str_replace(chr(133),'&agrave;', $text); //à
	$text = str_replace(chr(134),'&aring;', $text); //�
	$text = str_replace(chr(135),'&ccedil;', $text); //�
	$text = str_replace(chr(136),'&ecirc;', $text); //�
	$text = str_replace(chr(137),'&euml;', $text); //�
	$text = str_replace(chr(138),'&egrave;', $text); //�
	$text = str_replace(chr(139),'&iuml;', $text); //�
	$text = str_replace(chr(140),'&icirc;', $text); //�
	$text = str_replace(chr(141),'&igrave;', $text); //�
	$text = str_replace(chr(142),'&Auml;', $text); //�
	$text = str_replace(chr(143),'&Aring;', $text); //�
	$text = str_replace(chr(144),'&Eacute;', $text); //�
	$text = str_replace(chr(145),'&aelig;', $text); //�
	$text = str_replace(chr(146),'&AElig;', $text); //�
	$text = str_replace(chr(147),'&ocirc;', $text); //�
	$text = str_replace(chr(148),'&ouml;', $text); //�
	$text = str_replace(chr(149),'&ograve;', $text); //�
	$text = str_replace(chr(150),'&ucirc;', $text); //�
	$text = str_replace(chr(151),'&ugrave;', $text); //�
	$text = str_replace(chr(152),'&yuml;', $text); //�
	$text = str_replace(chr(153),'&Ouml;', $text); //�
	$text = str_replace(chr(154),'&Uuml;', $text); //�
	$text = str_replace(chr(155),'&cent;', $text); //�
	$text = str_replace(chr(156),'&pound;', $text); //�
	$text = str_replace(chr(157),'&yen;', $text); //�
	$text = str_replace(chr(159),'&fnof;', $text); //�
	$text = str_replace(chr(160),'&aacute;', $text); //�
	$text = str_replace(chr(161),'&iacute;', $text); //�
	$text = str_replace(chr(162),'&oacute;', $text); //�
	$text = str_replace(chr(163),'&uacute;', $text); //�
	$text = str_replace(chr(164),'&ntilde;', $text); //�
	$text = str_replace(chr(165),'&Ntilde;', $text); //�
	$text = str_replace(chr(166),'&ordf;', $text); //�
	$text = str_replace(chr(167),'&deg;', $text); //�
	$text = str_replace(chr(168),'&iquest;', $text); //�
	$text = str_replace(chr(169),'&reg;', $text); //�
	$text = str_replace(chr(170),'&not;', $text); //�
	$text = str_replace(chr(171),'&frac12;', $text); //�
	$text = str_replace(chr(172),'&frac14;', $text); //�
	$text = str_replace(chr(173),'&iexcl;', $text); //�
	$text = str_replace(chr(174),'&laquo;', $text); //�
	$text = str_replace(chr(175),'&raquo;', $text); //�
	$text = str_replace(chr(181),'&Aacute;', $text); //�
	$text = str_replace(chr(182),'&Acirc;', $text); //�
	$text = str_replace(chr(183),'&Agrave;', $text); //�
	$text = str_replace(chr(184),'&copy;', $text); //�
	$text = str_replace(chr(189),'&cent;', $text); //�
	$text = str_replace(chr(190),'&yen;', $text); //�
	$text = str_replace(chr(196),'&mdash;', $text); //-
	$text = str_replace(chr(198),'&atilde;', $text); //�
	$text = str_replace(chr(199),'&Atilde;', $text); //�
	$text = str_replace(chr(207),'&curren;', $text); //�
	$text = str_replace(chr(208),'&eth;', $text); //�
	$text = str_replace(chr(209),'&ETH;', $text); //�
	$text = str_replace(chr(210),'&Ecirc;', $text); //�
	$text = str_replace(chr(211),'&Euml;', $text); //�
	$text = str_replace(chr(212),'&Egrave;', $text); //�
	$text = str_replace(chr(214),'&Iacute;', $text); //�
	$text = str_replace(chr(215),'&Icirc;', $text); //�
	$text = str_replace(chr(216),'&Iuml;', $text); //�
	$text = str_replace(chr(221),'&brvbar;', $text); //�
	$text = str_replace(chr(222),'&Igrave;', $text); //�
	$text = str_replace(chr(224),'&alpha;', $text); //alpha
	$text = str_replace(chr(225),'&szlig;', $text); //�
	$text = str_replace(chr(226),'&Gamma;', $text); //Gamma
	$text = str_replace(chr(227),'&pi;', $text); //pi
	$text = str_replace(chr(228),'&Sigma;', $text); //Sigma
	$text = str_replace(chr(229),'&sigma;', $text); //sigma
	$text = str_replace(chr(230),'&micro;', $text); //�
	$text = str_replace(chr(231),'&tau;', $text); //tau
	$text = str_replace(chr(232),'&Phi;', $text); //Phi
	$text = str_replace(chr(233),'&Theta;', $text); //Theta
	$text = str_replace(chr(234),'&Omega;', $text); //Omega
	$text = str_replace(chr(235),'&delta;', $text); //delta
	$text = str_replace(chr(236),'&infin;', $text); //infinity
	$text = str_replace(chr(237),'&Yacute;', $text); //�
	$text = str_replace(chr(238),'&isin;', $text); //is in
	$text = str_replace(chr(239),'&cap;', $text); //intersection
	$text = str_replace(chr(240),'&equiv;', $text); //equivalence
	$text = str_replace(chr(241),'&plusmn;', $text); //�
	$text = str_replace(chr(242),'&le;', $text); //less than or equal
	$text = str_replace(chr(243),'&ge;', $text); //greater than or equal
	$text = str_replace(chr(244),'&para;', $text); //�
	$text = str_replace(chr(245),'&sect;', $text); //�
	$text = str_replace(chr(246),'&divide;', $text); //�
	$text = str_replace(chr(247),'&asymp;', $text); //almost equal to
	$text = str_replace(chr(248),'&ordm;', $text); //ordinal
	$text = str_replace(chr(251),'&radic;', $text); //radical sign
	$text = str_replace(chr(253),'&sup2;', $text); //suberscript 2
	return $text;
}
?>