<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=320, initial-scale=1" />
  <title><?= SITENAME; ?></title>
  <style type="text/css">

    /* ----- Client Fixes ----- */

 
    /* Force Outlook to provide a "view in browser" message */
    #outlook a {
      padding: 0;
    }

    /* Force Hotmail to display emails at full width */
    .ReadMsgBody {
      width: 100%;
    }

    .ExternalClass {
      width: 100%;
    }

    /* Force Hotmail to display normal line spacing */
    .ExternalClass,
    .ExternalClass p,
    .ExternalClass span,
    .ExternalClass font,
    .ExternalClass td,
    .ExternalClass div {
      line-height: 100%;
    }


     /* Prevent WebKit and Windows mobile changing default text sizes */
    body, table, td, p, a, li, blockquote {
      -webkit-text-size-adjust: 100%;
      -ms-text-size-adjust: 100%;
    }

    /* Remove spacing between tables in Outlook 2007 and up */
    table, td {
      mso-table-lspace: 0pt;
      mso-table-rspace: 0pt;
    }

    /* Allow smoother rendering of resized image in Internet Explorer */
    img {
      -ms-interpolation-mode: bicubic;
    }

     /* ----- Reset ----- */

    html,
    body,
    .body-wrap,
    .body-wrap-cell {
      margin: 0;
      padding: 0;
      background: #ffffff;
      font-family: Arial, Helvetica, sans-serif;
      font-size: 14px;
      color: #000;
       font-weight: 500;
      font: bold;
      text-align: left;
    }

    img {
      border: 0;
      line-height: 100%;
      outline: none;
      text-decoration: none;
    }

    table {
      border-collapse: collapse !important;
    }

    td, th {
      text-align: left;
      font-family: Arial, Helvetica, sans-serif;
      font-size: 14px;
      color: #464646;
      line-height:1.5em;
    }

    b a,
    .footer a {
      text-decoration: none;
      color: #464646;
    }

    a.blue-link {
      color: blue;
      text-decoration: underline;
    }

    /* ----- General ----- */

    td.center {
      text-align: center;
    }

    .left {
      text-align: left;
    }

    .body-padding {
      padding: 24px 40px 40px;
    }

    .border-bottom {
      border-bottom: 1px solid #D8D8D8;
    }

    table.full-width-gmail-android {
      width: 100% !important;
    }


    /* ----- Header ----- */
    .header {
      font-weight: bold;
      font-size: 16px;
      line-height: 16px;
      height: 16px;
      padding-top: 19px;
      padding-bottom: 7px;
    }

    .header a {
      color: #464646;
      text-decoration: none;
    }

    /* ----- Footer ----- */

    .footer a {
      font-size: 12px;
    }
  </style>

  <style type="text/css" media="only screen and (max-width: 650px)">
    @media only screen and (max-width: 650px) {
      * {
        font-size: 16px !important;
      }

      table[class*="w320"] {
        width: 320px !important;
      }

      td[class="mobile-center"],
      div[class="mobile-center"] {
        text-align: center !important;
      }

      td[class*="body-padding"] {
        padding: 20px !important;
      }

      td[class="mobile"] {
        text-align: right;
        vertical-align: top;
      }
    }
  </style>

</head>
<body style="padding:0; margin:0; display:block; background:#ffffff; -webkit-text-size-adjust:none">
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
 <td valign="top" align="left" width="100%" style="background:repeat-x url(https://www.filepicker.io/api/file/al80sTOMSEi5bKdmCgp2) #f9f8f8;">
 <center>



    <table cellspacing="0" cellpadding="0" width="100%" bgcolor="#ffffff">
      <tr>
        <td align="center">
          <center>
            <table class="w320" cellspacing="0" cellpadding="0" width="500">
              <tr>
                <td class="body-padding mobile-padding">

                <table cellpadding="0" cellspacing="0" width="100%">
                 
                  <tr>
                    <td style="padding-bottom:20px;">
                        Dear <b> <?= $fname; ?>, </b><br>
                      <br>
                           This email is to notify you about the new account we just created for you on <?=SITENAME;?>. 
                        Here is your membership information for your reference.<br>
                      <br>
                      <b><a class="blue-link" href="#">Membership login Information:</a></b>
                    </td>
                  </tr>
                </table>

                <table cellspacing="0" cellpadding="0" width="100%">
                  <tr>
                    <td class="left" style="padding-bottom:20px; text-align:left;">
                     <b>Name:</b> <?= $name; ?><br>
                      <b>Login Email:</b> <?= $email; ?><br>
                      <b>Your Password:</b> <?= $password; ?>
                      
                    </td>
                  </tr>
                  
                 
                </table>
                    
                    <br>
                  <table cellspacing="0" cellpadding="0" width="100%">
                 
                  <tr>
                      <td><b>Login Page: <a href="<?=SITENAME;?>"><?=SITE_URL;?></a> </b></td>
                  </tr>
                  
                </table>
                    <br>
                 <table cellspacing="0" cellpadding="0" width="100%">
                  <tr>
                      <td>We advise you change your password in your account settings after you log in.</td>
                  </tr>
                </table>

          

                        <br>
                <table cellspacing="0" cellpadding="0" width="100%">
                  <tr>
                    <td class="left" style="text-align:left;">
                        
                             Have a question?<br>
                      Our customer support team will be happy to help. Click here to get in touch: <b><?=SUPPORT_URL;?></b>
                        
                    </td>
                  </tr>
                  <tr>
                    <td class="left"  style="padding-top:10px; text-align:left;">
                        <b style="text-transform: capitalize">
                             Regards,<br>
                       <?=SITENAME;?> Team
                        </b>
                    </td>
                  </tr>
                </table>

                </td>
              </tr>
            </table>
          </center>
        </td>
      </tr>
    </table>


     
     

  </center>
  </td>
</tr>
</table>
</body>
</html>