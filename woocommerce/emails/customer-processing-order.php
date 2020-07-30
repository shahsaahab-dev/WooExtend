<body style="tab-interval: 0.5in;" vlink="purple" link="blue" lang="EN-US" bgcolor="#D8D8D8">
<div class="WordSection1">
<table class="MsoNormalTable" border="0" cellspacing="0" cellpadding="0" width="100%" style="width: 100%; border-collapse: collapse; mso-yfti-tbllook: 1184; mso-padding-alt: 0in 0in 0in 0in;">
<tbody>
<tr style="mso-yfti-irow: 0; mso-yfti-firstrow: yes; mso-yfti-lastrow: yes;">
<td width="25%" valign="top" style="width: 25%; padding: 0in 0in 0in 0in;"></td>
<td width="50%" valign="top" style="width: 50%; background: white; mso-background-themecolor: background1; padding: 0in 0in 0in 0in;">
<br />
<br />
<br />
<br />
<br />
<table class="MsoNormalTable" border="0" cellspacing="0" cellpadding="0" width="100%" style="width: 100%; border-collapse: collapse; mso-yfti-tbllook: 1184; mso-padding-alt: 0in 0in 0in 0in;">
<tbody>
<tr style="mso-yfti-irow: 0; mso-yfti-firstrow: yes;">
<td width="680" valign="top" style="width: 510pt; background: black; mso-background-themecolor: text1; padding: 0in 0in 0in 0in;">
<p class="MsoNormal" align="center" style="text-align: center;">
<span style="color: white; mso-color-alt: windowtext; mso-no-proof: yes;"><img width="341" height="219" id="Imagen_x0020_7" src="https://pisphaff.sirv.com/img1.png" descripciÃ³n="" generada="" /></span>
</p>
</td>
</tr>
<tr style="mso-yfti-irow: 1;">
<td width="680" valign="top" style="width: 510pt; background: black; mso-background-themecolor: text1; padding: 0in 0in 0in 0in;">
<p class="MsoNormal" align="center" style="text-align: center;">
<span style="font-size: 18pt; font-family: 'Adobe Caslon Pro Bold', serif; mso-bidi-font-family: 'Adobe Arabic'; color: white; mso-color-alt: windowtext;">THANKS FOR YOUR PURCHASE</span>
<span style="font-size: 18pt; font-family: 'Adobe Caslon Pro Bold', serif; mso-bidi-font-family: 'Adobe Arabic';"></span>
</p>
</td>
</tr>
<tr style="mso-yfti-irow: 2;">
<td width="680" valign="top" style="width: 510pt; padding: 0in 0in 0in 0in;">
<p class="MsoNormal" align="center" style="text-align: center;">
<span style="mso-bidi-font-family: Calibri; mso-no-proof: yes;"><img width="689" height="33" id="Picture_x0020_3" src="https://pisphaff.sirv.com/img8.jpeg" alt="line.jpg" /></span>
</p>
</td>
</tr>
<tr style="mso-yfti-irow: 3;">
<td width="680" valign="top" style="width: 510pt; padding: 0in 0in 0in 0in;">
<table class="MsoNormalTable" border="0" cellspacing="0" cellpadding="0" width="100%" style="width: 100%; border-collapse: collapse; mso-yfti-tbllook: 1184; mso-padding-alt: 0in 0.4in 0in 0.4in;">
<tbody>
<tr style="mso-yfti-irow: 0; mso-yfti-firstrow: yes; mso-yfti-lastrow: yes;">
<td width="622" valign="top" style="width: 466.7pt; padding: 0in 0.4in 0in 0.4in;">
<p class="MsoNormal">
<i style="mso-bidi-font-style: normal;">
<span style="font-size: 18pt; font-family: 'Adobe Kaiti Std R', serif; mso-bidi-font-family: 'Adobe Hebrew';">Hello dear <?php echo $order->get_billing_first_name(); ?>,</span>
</i>
</p>
<br />
<p class="MsoNormal">
<i style="mso-bidi-font-style: normal;">
<span style="font-size: 18pt; font-family: 'Adobe Kaiti Std R', serif; mso-bidi-font-family: 'Adobe Hebrew';">Thank You for the Purchase of 
 <b>_ </b></span>
</i>
<b style="mso-bidi-font-weight: normal;">
<i style="mso-bidi-font-style: normal;"><span style="font-size: 19pt; font-family: 'Adobe Kaiti Std R', serif; mso-bidi-font-family: 'Adobe Hebrew';">Virtual Ticket</span></i>
</b>
<i style="mso-bidi-font-style: normal;"><span style="font-size: 19pt; font-family: 'Adobe Kaiti Std R', serif; mso-bidi-font-family: 'Adobe Hebrew';"> </span></i>
<i style="mso-bidi-font-style: normal;">
<span style="font-size: 18pt; font-family: 'Adobe Kaiti Std R', serif; mso-bidi-font-family: 'Adobe Hebrew';">
To Enjoy The Live Streaming of <?php 

foreach ( $order->get_items() as $item_id => $item ) {
$product_id = $item->get_product_id();
$product = wc_get_product($product_id);
echo $product->get_title();
    
}

?><o:p></o:p>
</span>
</i>
</p>
<br />
<p class="MsoNormal">
<b style="mso-bidi-font-weight: normal;">
<span style="font-size: 18pt; mso-bidi-font-size: 20pt; font-family: 'Adobe Kaiti Std R', serif;">The Code of your Virtual Ticket is </span>
</b>
<b style="mso-bidi-font-weight: normal;">
<span style="font-size: 16pt; font-family: 'Adobe Kaiti Std R', serif; background: yellow; mso-highlight: yellow;">
<?php
global $wpdb;
foreach ( $order->get_items() as $item_id => $item ) {
    $product_id = $item->get_product_id();
    $quantity   = $item->get_quantity();
    $results    = $wpdb->get_results(
        $wpdb->prepare( 'SELECT * from woo_extend_codes WHERE product_id=%d AND product_result=%d ORDER BY id DESC LIMIT %d', array( $product_id, 'used', $quantity ) )
    );
    foreach ( $results as $result ) {
        echo 'Ticket Code: <strong>' . $result->product_code . '</strong><br>';
    }
}
?>



</span>
</b>
<b style="mso-bidi-font-weight: normal;">
<span style="font-size: 16pt; font-family: 'Adobe Kaiti Std R', serif;"><o:p></o:p></span>
</b>
</p>
<p class="MsoNormal"><o:p>&nbsp;</o:p></p>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr style="mso-yfti-irow: 4;">
<td width="680" valign="top" style="width: 510pt; padding: 0in 0in 0in 0in;">
<p class="MsoNormal"><o:p>&nbsp;</o:p></p>
</td>
</tr>
<tr style="mso-yfti-irow: 5;">
<td width="680" valign="top" style="width: 510pt; padding: 0in 0in 0in 0in;">
<p class="MsoNormal">
<span style="mso-bidi-font-family: Calibri; mso-no-proof: yes;"><img width="949" height="32" id="Picture_x0020_11" src="https://pisphaff.sirv.com/img7.jpeg" alt="line1.jpg" /></span><o:p></o:p>
</p>
</td>
</tr>
<tr style="mso-yfti-irow: 6;">
<td width="680" valign="top" style="width: 510pt; padding: 0in 0in 0in 0in;">
<br />
<table class="MsoNormalTable" border="0" cellspacing="0" cellpadding="0" width="100%" style="width: 100%; border-collapse: collapse; mso-yfti-tbllook: 1184; mso-padding-alt: 0in 0.4in 0in 0.4in;">
<tbody>
<tr style="mso-yfti-irow: 0; mso-yfti-firstrow: yes; mso-yfti-lastrow: yes;">
<td width="1015" valign="top" style="width: 761.1pt; padding: 0in 0.4in 0in 0.4in;">
<p class="MsoNormal" align="center" style="text-align: center;">
<b>
<i style="mso-bidi-font-style: normal;">
<span style="font-size: 20pt; mso-bidi-font-size: 24pt; font-family: 'Adobe Heiti Std R', sans-serif;">
Please 30 minutes before the Live Event starts, go to:<o:p></o:p>
</span>
</i>
</b>
</p>
<br />
<br />

<p class="MsoNormal" align="center" style="text-align: center;">
<span style="font-size: 27pt; mso-bidi-font-size: 72pt; font-family: 'Adobe Heiti Std R', sans-serif; color: #e36c0a; mso-themecolor: accent6; mso-themeshade: 191;">
<a href="http://www.caroentertainment.com/liveshows">
<span style="color: #e36c0a; mso-themecolor: accent6; mso-themeshade: 191;">http://www.caroentertainment.com/liveshows</span>
</a>
<o:p></o:p>
</span>
</p>
<br />
<br />
<p class="MsoNormal" align="center" style="text-align: center;">
<i style="mso-bidi-font-style: normal;">
<span style="font-size: 18pt; mso-bidi-font-size: 20pt; font-family: 'Adobe Heiti Std R', sans-serif;">
Insert the provided <b style="mso-bidi-font-weight: normal;">Virtual Ticket Code</b> in the part where it says:<o:p></o:p>
</span>
</i>
</p>
<br />
<br />
<p class="MsoNormal" align="center" style="text-align: center;">
<b><span style="font-size: 16pt; font-family: 'Adobe Heiti Std R', sans-serif;">Already Have A Ticket?</span><o:p></o:p></b>
</p>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr style="mso-yfti-irow: 8;">
<td width="680" valign="top" style="width: 510pt; padding: 0in 0in 0in 0in;">
<p class="MsoNormal" align="center" style="text-align: center;">
<span style="mso-no-proof: yes;"><img border="0" width="624" height="55" id="Imagen_x0020_8" src="https://pisphaff.sirv.com/img2.png" /></span><o:p></o:p>
</p>
</td>
</tr>
<tr style="mso-yfti-irow: 10;">
<td width="680" valign="top" style="width: 510pt; padding: 0in 0in 0in 0in;">
<p class="MsoNormal"><o:p>&nbsp;</o:p></p>
<table class="MsoNormalTable" border="0" cellspacing="0" cellpadding="0" width="100%" style="width: 100%; border-collapse: collapse; mso-yfti-tbllook: 1184; mso-padding-alt: 0in 0.4in 0in 0.4in;">
<tbody>
<tr style="mso-yfti-irow: 0; mso-yfti-firstrow: yes; mso-yfti-lastrow: yes;">
<td width="949" valign="top" style="width: 711.75pt; padding: 0in 0.4in 0in 0.4in;">
<p class="MsoNormal" align="center" style="text-align: center;">
<span style="font-size: 20pt; font-family: 'Adobe Garamond Pro', serif; mso-fareast-font-family: 'Adobe Fan Heiti Std B';">
Press <b style="mso-bidi-font-weight: normal;">ENTER</b> and enjoy the streaming at the expected time!<o:p></o:p>
</span>
</p>
<p class="MsoNormal" align="center" style="text-align: center;">
<span style="font-size: 20pt; font-family: 'Adobe Garamond Pro', serif; mso-fareast-font-family: 'Adobe Fan Heiti Std B';"><o:p>&nbsp;</o:p></span>
</p>
<p class="MsoNormal" align="center" style="text-align: center;">
<span style="mso-bidi-font-family: Calibri; mso-no-proof: yes;"><img alt="line2.jpg" src="https://pisphaff.sirv.com/img3.jpeg" id="_x0000_i1028" height="48" width="938" border="0" /></span>
<span style="font-size: 20pt; font-family: 'Adobe Garamond Pro', serif; mso-fareast-font-family: 'Adobe Fan Heiti Std B';"><o:p></o:p></span>
</p>
<p class="MsoNormal" align="center" style="text-align: center;">
<span style="mso-ignore: vglayout; position: relative; z-index: 251659264;">
<span style="left: 0px; left: 117px; top: -7px; width: 723px; height: 106px;">
<img
width="723"
height="106"
src="https://pisphaff.sirv.com/img4.png"
alt="Cuadro de texto: You will also have the option to participate in a
INTERACTIVE CHAT to make comments and requests to the artist together with the other participants of the event.
"
v:shapes="Cuadro_x0020_de_x0020_texto_x0020_12"
/>
</span>
</span>
<br style="mso-special-character: line-break;" />
<!--[if !supportLineBreakNewLine]-->
<br style="mso-special-character: line-break;" />
<!--[endif]-->
<span style="font-size: 19pt; mso-bidi-font-size: 18pt; font-family: 'Adobe Garamond Pro', serif; mso-fareast-font-family: 'Adobe Fan Heiti Std B';"><o:p></o:p></span>
</p>
<p class="MsoNormal" align="center" style="text-align: center;">
<span style="font-size: 20pt; font-family: 'Adobe Garamond Pro', serif; mso-fareast-font-family: 'Adobe Fan Heiti Std B';"><o:p>&nbsp;</o:p></span>
</p>
<p class="MsoNormal" align="center" style="text-align: center;">
<span style="font-size: 20pt; font-family: 'Adobe Garamond Pro', serif; mso-fareast-font-family: 'Adobe Fan Heiti Std B';"><o:p>&nbsp;</o:p></span>
</p>
<p class="MsoNormal" align="center" style="text-align: center;">
<span style="font-size: 20pt; font-family: 'Adobe Garamond Pro', serif; mso-fareast-font-family: 'Adobe Fan Heiti Std B'; mso-no-proof: yes;">
<img
border="0"
width="694"
height="512"
id="Imagen_x0020_10"
src="https://pisphaff.sirv.com/img5.jpeg"
alt="Captura de pantalla de un celular

DescripciÃ³n generada automÃ¡ticamente"
/>
</span>

<span style="font-size: 20pt; font-family: 'Adobe Garamond Pro', serif; mso-fareast-font-family: 'Adobe Fan Heiti Std B';"><o:p></o:p></span>
</p>
<p class="MsoNormal" align="center" style="text-align: center;">
<span style="font-size: 20pt; font-family: 'Adobe Garamond Pro', serif; mso-fareast-font-family: 'Adobe Fan Heiti Std B';"><o:p>&nbsp;</o:p></span>
</p>
<p class="MsoNormal" align="center" style="text-align: center;">
<span style="font-size: 20pt; font-family: 'Adobe Garamond Pro', serif; mso-fareast-font-family: 'Adobe Fan Heiti Std B';"><o:p>&nbsp;</o:p></span>
</p>
<p class="MsoNormal" align="center" style="text-align: center;">
<span style="font-size: 20pt; font-family: 'Adobe Garamond Pro', serif; mso-fareast-font-family: 'Adobe Fan Heiti Std B'; background: yellow; mso-highlight: yellow;">
Please confirm you received this email.
</span>
<o:p></o:p>
</p>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr style="mso-yfti-irow: 12;">
<td width="680" valign="top" style="width: 510pt; padding: 0in 0in 0in 0in;">
<p class="MsoNormal">
<span style="mso-spacerun: yes;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>
<span style="mso-bidi-font-family: Calibri; mso-no-proof: yes;"><img border="0" width="938" height="48" id="Picture_x0020_13" src="https://pisphaff.sirv.com/img3.jpeg" alt="line2.jpg" /></span><o:p></o:p>
</p>
</td>
</tr>
<tr style="mso-yfti-irow: 14;">
<td width="680" valign="top" style="width: 510pt; padding: 0in 0in 0in 0in;">
<table class="MsoNormalTable" border="0" cellspacing="0" cellpadding="0" width="100%" style="width: 100%; border-collapse: collapse; mso-yfti-tbllook: 1184; mso-padding-alt: 0in 5.4pt 0in 5.4pt;">
<tbody>
<tr style="mso-yfti-irow: 0; mso-yfti-firstrow: yes; mso-yfti-lastrow: yes;">
<td width="311" valign="top" style="width: 233.35pt; padding: 0in 5.4pt 0in 5.4pt;">
<p class="MsoNormal" align="center" style="text-align: center;">
<b><span style="font-size: 15pt; mso-bidi-font-size: 18pt; font-family: 'Adobe Gothic Std B', sans-serif;">Thank You</span></b>
<span style="font-size: 15pt; mso-bidi-font-size: 18pt; font-family: 'Adobe Gothic Std B', sans-serif;">,<o:p></o:p></span>
</p>
<p class="MsoNormal" align="center" style="text-align: center;">
<b>
<span style="font-size: 16pt; mso-bidi-font-size: 20pt; font-family: 'Adobe Gothic Std B', sans-serif;">Caro Entertainment<o:p></o:p></span>
</b>
</p>
<p class="MsoNormal" align="center" style="text-align: center;">
<b><span style="font-size: 16pt; mso-bidi-font-size: 20pt; font-family: 'Adobe Gothic Std B', sans-serif;">Live Shows</span></b>
<span style="font-size: 15pt; mso-bidi-font-size: 18pt; font-family: 'Adobe Gothic Std B', sans-serif;"><o:p></o:p></span>
</p>
<p class="MsoNormal" align="center" style="text-align: center;">
<span class="SpellE"><span style="font-size: 15pt; mso-bidi-font-size: 18pt; font-family: 'Adobe Gothic Std B', sans-serif;">Telf</span></span>
<span style="font-size: 15pt; mso-bidi-font-size: 18pt; font-family: 'Adobe Gothic Std B', sans-serif;">: 305.967.9191<o:p></o:p></span>
</p>
<p class="MsoNormal" align="center" style="text-align: center;">
<span style="font-size: 15pt; mso-bidi-font-size: 18pt; font-family: 'Adobe Gothic Std B', sans-serif;">All Rights reserved.</span><o:p></o:p>
</p>
</td>
<td width="311" valign="top" style="width: 233.35pt; padding: 0in 5.4pt 0in 5.4pt;">
<p class="MsoNormal">
<span style="mso-no-proof: yes;">
<img
alt="Imagen que contiene alimentos

DescripciÃ³n generada automÃ¡ticamente"
src="https://pisphaff.sirv.com/img6.png"
id="Imagen_x0020_11"
height="168"
width="334"
border="0"
/>
</span>

<o:p></o:p>
</p>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr style="mso-yfti-irow: 16; height: 0.1in;">
<td width="680" valign="top" style="width: 510pt; background: #a0845f; padding: 0in 0in 0in 0in; height: 0.1in;">
<p class="MsoNormal"><o:p>&nbsp;</o:p></p>
</td>
</tr>
<tr style="mso-yfti-irow: 17; mso-yfti-lastrow: yes; height: 0.5in;">
<td width="680" valign="top" style="width: 510pt; background: #111521; padding: 0in 0in 0in 0in; height: 0.5in;">
<p class="MsoNormal"><o:p>&nbsp;</o:p></p>
</td>
</tr>
</tbody>
</table>
</td>
<td width="25%" valign="top" style="width: 25%; padding: 0in 0in 0in 0in;">
<p class="MsoNormal"><o:p>&nbsp;</o:p></p>
</td>
</tr>
</tbody>
</table>
<br />
</div>
</body>
