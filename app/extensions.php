<?php

/*
 * author: Tùng Chèm
 * mail: tungchem1607@gmail.com
 * 2016
 */

//Random chuỗi kiểu 1
function generateRandomString($length = 10, $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ') {
    $str = '';
    $max = mb_strlen($keyspace, '8bit') - 1;
    for ($i = 0; $i < $length; ++$i) {
        $str .= $keyspace[mt_rand(0, $max)];
    }
    return $str;
}

//Random chuỗi kiểu 2
function getrandommd5($limit = 7) {
    return substr(md5(rand()), 0, $limit);
}

//Gửi mail
function sendMail($from, $namefrom, $to, $nameto, $metacontent = null, $content, $title, $attact = null, $tkmail = null, $pwmail = null) {
    $file = 'smtpmail/PHPMailerAutoload';
    $path = DIR_APP . 'libraries/' . $file . '.php';
    if (file_exists($path)) {
        include_once $path;
        PHPMailerAutoload("class.phpmailer");
        // Khai báo tạo PHPMailer
        $mail = new PHPMailer();

//        $mail->SMTPDebug = 3;  // Enable verbose debug output
        $mail->CharSet = "UTF-8";
        $mail->isSMTP();
        // Set mailer to use SMTP
        $mail->Mailer = "smtp";
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;  // Enable SMTP authentication
        $mail->Username = $tkmail;  // SMTP username
        $mail->Password = $pwmail;   // SMTP password
        $mail->SMTPSecure = 'tls';  // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;   // TCP port to connect to

        $mail->setFrom($from, $namefrom);
        $mail->addAddress($to, $nameto);     // Add a recipient
//$mail->addAddress('ellen@example.com');   // Name is optional
        $mail->addReplyTo($from, $namefrom);
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');  // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        $mail->isHTML(true);   // Set email format to HTML

        $mail->Subject = $title;
//        $mail->MsgHTML('This is the HTML message body <b>in bold!</b>');  //Send mail ssl
        $mail->Body = $content;  //Send mail tls
        if ($metacontent != null) {
            $mail->AltBody = $metacontent; //Nội dung rút gọn hiển thị bên ngoài thư mục thư.
        }
        if ($attact != null) {
            $z = "(";
            for ($i = 0; $i < count($attact); $i++) {
                $z = $z . "'" . $attact[$i] . "'";
            }
            $z = $z . ")";
            $mail->AddAttachment($z); //Tập tin cần attach
        }
        //Tiến hành gửi email và kiểm tra lỗi
        if (!$mail->Send()) {
            return "Mailer Error!";
        } else {
            return "Message sent!";
        }
    } else {
        return "error file";
    }
}

//Trả về nội dung bức thư
function getcontentmail($url, $logo, $slogan, $link, $address) {
    $content = '<div style="width:100%!important;min-width:239px!important;color:#525252;background:#f0f0f0;font-family:\'Open Sans\',Helvetica,sans-serif;font-size:14px;line-height:140%;margin:0;padding:0"><span class="im">';
    $content .= '<table style="width:100%" align="center" border="0" cellpadding="0" cellspacing="0">';
    $content .= '<tbody><tr><td valign="top" width="100%" bgcolor="#2b4254"><table align="center" border="0" cellpadding="0" cellspacing="0">';
    $content .= '<tbody><tr><td width="600" bgcolor="#2b4254"><table style="width:560px" class="m_6895964898071847183MobileScale" align="center" border="0" cellpadding="0" cellspacing="0"><tbody>';
    $content .= '<tr><td width="100%"><table class="m_6895964898071847183HeaderModule" align="left" border="0" cellpadding="0" cellspacing="0"><tbody>';
//Logo
    $content .= '<tr><td height="120"><a href="' . $url . '" target="_blank"><img src="' . $logo . '" alt="Logo" style="display:block;border-radius:0px;vertical-align:middle" width="145" border="0"></a></td>
</tr></tbody></table>';
    $content .= '<table class="m_6895964898071847183HeaderModule" align="right" border="0" cellpadding="0" cellspacing="0">';
//Menu
    $content .= '<tbody><tr><td style="font-size:12px;color:#ffffff;font-weight:bold;text-align:left;font-family:\'Open Sans\',Helvetica,Arial,sans-serif;vertical-align:middle" class="m_6895964898071847183HeaderModule" height="120" bgcolor="#2b4254"> <a href="' . $url . '" style="text-decoration:none;color:#ffffff" target="_blank">HOME</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="' . $url . '" style="text-decoration:none;color:#ffffff" target="_blank">SERVICES</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="' . $url . '" style="text-decoration:none;color:#ffffff" target="_blank" >SUPPORT</a> </td>';
    $content .= '</tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table>';
    $content .= '<table style="font-size:0px;line-height:0;border-collapse:collapse;width:100%" align="center" border="0" cellpadding="0" cellspacing="0">';
    $content .= '<tbody><tr><td style="font-size:0;line-height:0;border-collapse:collapse" width="100%" height="15" bgcolor="#f0f0f0">&nbsp;';
    $content .= '<table style="font-size:0px;line-height:0;border-collapse:collapse;width:600px" class="m_6895964898071847183MobileScale2" align="center" border="0" cellpadding="0" cellspacing="0"><tbody><tr>';
    $content .= '<td style="font-size:0;line-height:0;border-collapse:collapse" class="m_6895964898071847183MobileScale2" width="600" height="15" bgcolor="#ffffff">&nbsp;</td>';
    $content .= '</tr></tbody></table></td></tr></tbody></table></span><table style="width:100%" align="center" border="0" cellpadding="0" cellspacing="0">';
    $content .= '<tbody><tr><td valign="top" width="100%" bgcolor="#f0f0f0"><table align="center" border="0" cellpadding="0" cellspacing="0">';
    $content .= '<tbody><tr><td width="600" bgcolor="#ffffff">';
    $content .= '<table style="width:560px" class="m_6895964898071847183MobileScale" align="center" border="0" cellpadding="0" cellspacing="0">';
    $content .= '<tbody><tr><td width="100%"><table align="center" border="0" cellpadding="0" cellspacing="0"><tbody><tr>';
    $content .= '<td style="font-size:14px;color:#525252;font-weight:normal;font-family:\'Open Sans\',Helvetica,Arial,sans-serif;line-height:22px" width="100%">Hello,</td></tr>';
    $content .= '<tr><td style="font-size:15;line-height:0;border-collapse:collapse" width="100%" height="15">&nbsp;</td></tr>';
    $content .= '<tr><td style="font-size:14px;color:#525252;font-weight:normal;font-family:\'Open Sans\',Helvetica,Arial,sans-serif;line-height:22px" width="100%">Thank you for joining ' . $slogan . ' and signing up for our newsletter to receive news and limited time discounts!&nbsp; Before we can send you anything we need you to verify your subscription by clicking this link:';
//Xac Thuc
    $content .= '<a href="' . $link . '" target="_blank">Click Here</a><br>If the link does not work please go to this URL: <a href="' . $link . '" target="_blank">Click Here</a><span class="im"><br><br>Until you click that link you will not receive any news or offers from us!<br><br>Once you do verify you can unsubscribe from the list at any time.&nbsp; Unsubscribe links are provided in every email and are honored immediately.<br><br></span></td></tr>';
    $content .= '<tr><td style="font-size:15;line-height:0;border-collapse:collapse" width="100%" height="15">&nbsp;</td></tr><tr>';
    $content .= '<td style="font-size:14px;color:#525252;font-weight:normal;font-family:\'Open Sans\',Helvetica,Arial,sans-serif;line-height:22px" width="100%"></td></tr>';
    $content .= '<tr><td style="font-size:15;line-height:0;border-collapse:collapse" width="100%" height="15"></td></tr><tr>';
    $content .= '<td style="font-size:14px;color:#525252;font-weight:normal;font-family:\'Open Sans\',Helvetica,Arial,sans-serif;line-height:22px" width="100%"></td></tr>';
    $content .= '<tr><td style="font-size:15;line-height:0;border-collapse:collapse" width="100%" height="15">&nbsp;</td></tr><tr>';
    $content .= '<td style="font-size:14px;color:#525252;font-weight:normal;font-family:\'Open Sans\',Helvetica,Arial,sans-serif;line-height:22px" width="100%">Regards,<br> ' . $slogan . '</td></tr>';
    $content .= '<tr><td style="font-size:15;line-height:0;border-collapse:collapse" width="100%" height="15">&nbsp;</td></tr><tr>';
    $content .= '<td style="font-size:15;line-height:0;border-collapse:collapse" width="100%" height="30">&nbsp;</td></tr></tbody></table></td>';
    $content .= '</tr></tbody></table></td></tr></tbody></table></td></tr></tbody>';
    $content .= '</table><div class="yj6qo ajU"><div id=":2c5" class="ajR" role="button" tabindex="0" aria-label="Ẩn nội dung được mở rộng" data-tooltip="Ẩn nội dung được mở rộng"><img class="ajT" src="//ssl.gstatic.com/ui/v1/icons/mail/images/cleardot.gif"></div></div><div class="adL"><span class="im">';
    $content .= '<table style="font-size:0px;line-height:0;border-collapse:collapse;width:100%" align="center" border="0" cellpadding="0" cellspacing="0">';
    $content .= '<tbody><tr>';
    $content .= '<td style="font-size:0;line-height:0;border-collapse:collapse" width="100%" height="27" bgcolor="#494949">&nbsp;';
    $content .= '<table style="font-size:0px;line-height:0;border-collapse:collapse;width:600px" class="m_6895964898071847183MobileScale2" align="center" border="0" cellpadding="0" cellspacing="0">';
    $content .= '<tbody><tr><td style="font-size:0;line-height:0;border-collapse:collapse" class="m_6895964898071847183MobileScale2" width="600" height="27" bgcolor="#ffffff">&nbsp;</td>';
    $content .= '</tr></tbody></table></td></tr></tbody></table><table style="width:100%" align="center" border="0" cellpadding="0" cellspacing="0">';
    $content .= '<tbody><tr><td valign="top" width="100%" bgcolor="#494949"><table align="center" border="0" cellpadding="0" cellspacing="0"><tbody>';
    $content .= '<tr><td width="600" bgcolor="#494949"><table style="width:560px" class="m_6895964898071847183MobileScale" align="center" border="0" cellpadding="0" cellspacing="0">';
    $content .= '<tbody><tr><td width="100%"><table class="m_6895964898071847183FooterModule" align="center" border="0" cellpadding="0" cellspacing="0"><tbody>';
    $content .= '<tr><td style="font-size:15;line-height:0;border-collapse:collapse" width="100%" height="30">&nbsp;</td></tr><tr><td style="font-size:12px;text-align:center;color:#ffffff;font-weight:normal;font-family:\'Open Sans\',Helvetica,Arial,sans-serif;line-height:17px" width="100%">Our address: ' . $address . ' <br> You are receiving this email due to your subscription or order through <a href="' . $url . '" target="_blank">' . $slogan . '</a></td>';
    $content .= '</tr><tr><td style="font-size:15;line-height:0;border-collapse:collapse" width="100%" height="25">&nbsp;</td></tr></tbody>';
    $content .= '</table></td></tr><tr><td width="100%"><table class="m_6895964898071847183FooterModule" align="center" border="0" cellpadding="0" cellspacing="0"><tbody>';
    $content .= '<tr><td style="font-size:15;line-height:0;border-collapse:collapse" width="100%" height="25">&nbsp;</td></tr></tbody></table>';
    $content .= '</td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table>';
    $content .= '<table style="width:100%" align="center" border="0" cellpadding="0" cellspacing="0"><tbody><tr>';
    $content .= '<td valign="top" width="100%" bgcolor="#3f3f3f"><table align="center" border="0" cellpadding="0" cellspacing="0"><tbody><tr><td width="600" bgcolor="#3f3f3f">';
    $content .= '<table style="width:560px" class="m_6895964898071847183MobileScale" align="center" border="0" cellpadding="0" cellspacing="0">';
    $content .= '<tbody><tr><td width="100%"><table align="center" border="0" cellpadding="0" cellspacing="0"></table></td></tr></tbody></table></td>';
    $content .= '</tr></tbody></table></td></tr></tbody></table></span></div></div>';
    return $content;
}

//Hiển thị Fanpage
function fanpage($url = "https://www.facebook.com/facebook") {
    $html = '<div class="fb-page" data-href="' . $url . '" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="' . $url . '" class="fb-xfbml-parse-ignore"><a href="' . $url . '">Facebook</a></blockquote></div>';
    return $html;
}

//Comment Facebook
//Color: dark hoặc light
//Order by: Thứ tự sử dụng khi hiển thị bình luận. Có thể là "social", "reverse_time" hoặc "time". 
function commentFanpage($limit = "5", $color = null, $orderby = null, $url = null) {
    if ($url == null) {
        $url = curPageURL();
    }
    $html = '<div class="fb-comments" data-href="' . $url . '" data-width="100%" data-numposts="' . $limit . '"';
    if ($color != null) {
        $html .= 'data-colorscheme="' . $color . '"';
    }
    if ($orderby != null) {
        $html .= 'data-order-by="' . $orderby . '"';
    }
    $html .= '></div>';
    return $html;
}

//Bộ đếm bình luận facebook
function countCommentFB($url = null) {

    if ($url == null) {
        $url = curPageURL();
    }
    $html = '<span class="fb-comments-count" data-href="' . $url . '"></span>';
//    dd($html);
    return $html;
}

//Comment Google+
function commentGoogle($url = null) {
    if ($url == null) {
        $url = curPageURL();
    }
//    $html = '<div id="google_comments"></div>';
    $html = '<div class="g-comments" data-view_type="FILTERED_POSTMOD" data-first_party_property="BLOGGER" data-href="' . $url . '"></div>';
    return $html;
}

//Bộ đếm bình luận Google+
function countCommentG($url = null) {
    if ($url == null) {
        $url = curPageURL();
    }
    $html = '<g:commentcount href="' . $url . '"></g:commentcount>';
    return $html;
}

//Get url
function curPageURL() {
    $pageURL = 'http';
    if ($_SERVER["HTTPS"] == "on") {
        $pageURL .= "s";
    }
    $pageURL .= "://";
    if ($_SERVER["SERVER_PORT"] != "80") {
        $pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
    } else {
        $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
    }
    return $pageURL;
}
