<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
<meta charset="utf-8"<meta name="viewport" content="width=device-width">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="x-apple-disable-message-reformatting">
<title></title>
<link href="https://fonts.googleapis.com/css2?family=Inter:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
<style>
body,html,table{margin:0 auto!important}.a6S,img.g-img+div{display:none!important}body,html{padding:0!important;height:100%!important;width:100%!important;background:#f1f1f1}*{-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%}div[style*="margin: 16px 0"]{margin:0!important}table,td{mso-table-lspace:0pt!important;mso-table-rspace:0pt!important}table{border-spacing:0!important;border-collapse:collapse!important;table-layout:fixed!important}img{-ms-interpolation-mode:bicubic}a{text-decoration:none}.aBn,.unstyle-auto-detected-links *,[x-apple-data-detectors]{border-bottom:0!important;cursor:default!important;color:inherit!important;text-decoration:none!important;font-size:inherit!important;font-family:inherit!important;font-weight:inherit!important;line-height:inherit!important}.a6S{opacity:.01!important}.im{color:inherit!important}@media only screen and (min-device-width:320px) and (max-device-width:374px){u~div .email-container{min-width:320px!important}}@media only screen and (min-device-width:375px) and (max-device-width:413px){u~div .email-container{min-width:375px!important}}@media only screen and (min-device-width:414px){u~div .email-container{min-width:414px!important}}
</style>
<style>
body,h1,h2,h3,h4,h5,h6{font-family:Inter,sans-serif}.primary{background:#f3a333}.bg_zoot{background:#044040}.bg_white{background:#fff}.bg_light{background:#fafafa}.bg_black{background:#000}.bg_dark{background:rgba(0,0,0,.8)}.txt_white{color:#fff !important}.email-section{padding:2.5em}.ext-fnt{padding:0 2.5em 1rem}.ext-fnt h2{color:#044041;font-size:46px;line-height:53px}.social{list-style:none;padding:0}.social li{display:inline-block;padding:0 8px}h1,h2,h3,h4,h5,h6{font-weight:300;margin-top:0}body{font-weight:400;font-size:15px;line-height:1.8;color:#000}.global-strip{background:#044041;height:30px}.logo h1{margin:0}.prd-img_size{width:30%}.prd-img_size img{width:150px}.mark_price{text-decoration:line-through;color:#f45116}@media screen and (max-width:500px){.ext-fnt{padding:0 2.5em 1rem}.ext-fnt h2{font-size:32px;line-height:45px}.prd-img_size img{width:100px}}
</style>
</head>

<body width="100%" style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly; background-color: #222222;">
<center style="width: 100%; background-color: #f1f1f1;">
  <div style="display: none; font-size: 1px;max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: Inter;"> &zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp; </div>
  <div style="max-width: 600px; margin: 0 auto;" class="email-container"> 
    <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;" class="bg_white">
      <tr>
        <td>
          <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
            <tr>
              <td> @include('email._partial/header') </td>
            </tr>
            <tr>
              <td> @yield('content') </td>
            </tr>
            <tr>
              <td style="padding-top:10px;"> @include('email._partial/footer') </td>
            </tr>
          </table></td>
      </tr>
    </table>
  </div>
</center>
</body>
</html>
