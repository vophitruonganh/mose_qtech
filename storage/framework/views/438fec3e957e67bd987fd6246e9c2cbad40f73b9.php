<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title>Choose a new password for <?php echo e($product_name); ?></title>
  <style type="text/css" rel="stylesheet" media="all">
    /* Base ------------------------------ */
    *:not(br):not(tr):not(html) {
      font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif;
      -webkit-box-sizing: border-box;
      box-sizing: border-box;
    }
    body {
      width: 100% !important;
      height: 100%;
      margin: 0;
      line-height: 1.4;
      background-color: #F2F4F6;
      color: #74787E;
      -webkit-text-size-adjust: none;
    }
    a {
      color: #3869D4;
    }
    /* Layout ------------------------------ */
    .email-wrapper {
      width: 100%;
      margin: 0;
      padding: 0;
      background-color: #F2F4F6;
    }
    .email-content {
      width: 100%;
      margin: 0;
      padding: 0;
    }
    /* Masthead ----------------------- */
    .email-masthead {
      padding: 25px 0;
      text-align: center;
    }
    .email-masthead_logo {
      max-width: 400px;
      border: 0;
    }
    .email-masthead_name {
      font-size: 16px;
      font-weight: bold;
      color: #bbbfc3;
      text-decoration: none;
      text-shadow: 0 1px 0 white;
    }
    /* Body ------------------------------ */
    .email-body {
      width: 100%;
      margin: 0;
      padding: 0;
      border-top: 1px solid #EDEFF2;
      border-bottom: 1px solid #EDEFF2;
      background-color: #FFF;
    }
    .email-body_inner {
      width: 570px;
      margin: 0 auto;
      padding: 0;
    }
    .email-footer {
      width: 570px;
      margin: 0 auto;
      padding: 0;
      text-align: center;
    }
    .email-footer p {
      color: #AEAEAE;
    }
    .body-action {
      width: 100%;
      margin: 30px auto;
      padding: 0;
      text-align: center;
    }
    .body-sub {
      margin-top: 25px;
      padding-top: 25px;
      border-top: 1px solid #EDEFF2;
    }
    .content-cell {
      padding: 35px;
    }
    .align-right {
      text-align: right;
    }
    /* Type ------------------------------ */
    h1 {
      margin-top: 0;
      color: #2F3133;
      font-size: 19px;
      font-weight: bold;
      text-align: left;
    }
    h2 {
      margin-top: 0;
      color: #2F3133;
      font-size: 16px;
      font-weight: bold;
      text-align: left;
    }
    h3 {
      margin-top: 0;
      color: #2F3133;
      font-size: 14px;
      font-weight: bold;
      text-align: left;
    }
    p {
      margin-top: 0;
      color: #74787E;
      font-size: 16px;
      line-height: 1.5em;
      text-align: left;
    }
    p.sub {
      font-size: 12px;
    }
    p.center {
      text-align: center;
    }
    /* Buttons ------------------------------ */
    .button {
      display: inline-block;
      width: 200px;
      background-color: #3869D4;
      border-radius: 3px;
      color: #ffffff;
      font-size: 15px;
      line-height: 45px;
      text-align: center;
      text-decoration: none;
      -webkit-text-size-adjust: none;
      mso-hide: all;
    }
    .button--green {
      background-color: #22BC66;
    }
    .button--red {
      background-color: #dc4d2f;
    }
    .button--blue {
      background-color: #3869D4;
    }
    /*Media Queries ------------------------------ */
    @media  only screen and (max-width: 600px) {
      .email-body_inner,
      .email-footer {
        width: 100% !important;
      }
    }
    @media  only screen and (max-width: 500px) {
      .button {
        width: 100% !important;
      }
    }
  </style>
</head>
<body>
  <table class="email-wrapper" width="100%" cellpadding="0" cellspacing="0">
    <tr>
      <td align="center">
        <table class="email-content" width="100%" cellpadding="0" cellspacing="0">
          <!-- Logo -->
          <tr>
            <td class="email-masthead">
              <a class="email-masthead_name"><?php echo e($product_name); ?></a>
            </td>
          </tr>
          <!-- Email Body -->
          <tr>
            <td class="email-body" width="100%">
              <table class="email-body_inner" align="center" width="570" cellpadding="0" cellspacing="0">
                <!-- Body content -->
                <tr>
                  <td class="content-cell">
                    <h1>Gửi <?php echo e($fullname); ?>,</h1>
                    <p>Bạn vừa yêu cầu thay đổi mật khẩu qua email <a href="mailto:<?php echo e($email_forgot); ?>"><?php echo e($email_forgot); ?></a>.</p>
                    <p>Chúng tôi giúp bạn thay đổi mật khẩu mới tại đây</p>
                    <!-- Action -->
                    <table class="body-action" align="center" width="100%" cellpadding="0" cellspacing="0">
                      <tr>
                        <td align="center">
                          <div>
                            <!--[if mso]><v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="<?php echo e(url('admin/resetpassword/'.$token)); ?>" style="height:45px;v-text-anchor:middle;width:200px;" arcsize="7%" stroke="f" fill="t">
                              <v:fill type="tile" color="#dc4d2f" />
                              <w:anchorlock/>
                              <center style="color:#ffffff;font-family:sans-serif;font-size:15px;">Reset your password</center>
                            </v:roundrect><![endif]-->
                            <a href="<?php echo e(url('admin/resetpassword/'.$token)); ?>" class="button button--red">Thay đổi mật khẩu</a>
                          </div>
                        </td>
                      </tr>
                    </table>
                    <p>Nếu bạn không yêu cầu thiết lập lại mật khẩu, xin vui lòng bỏ qua email này.</p>
                    <!-- Sub copy -->
                    <table class="body-sub">
                      <tr>
                        <td>
                          <p class="sub">If you’re having trouble clicking the password reset button, copy and paste the URL below into your web browser.</p>
                          <p class="sub"><a href="<?php echo e(url('admin/resetpassword/'.$token)); ?>"><?php echo e(url('admin/resetpassword/'.$token)); ?></a></p>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
          <tr>
            <td>
              <table class="email-footer" align="center" width="570" cellpadding="0" cellspacing="0">
                <tr>
                  <td class="content-cell">
                    <p class="sub center">&copy; 2016 <?php echo e($product_name); ?>. All rights reserved.</p>
                    <p class="sub center">
                      <?php echo e($product_name); ?>

                      <br><?php echo e($product_address_line1); ?>

                      <br><?php echo e($product_address_line2); ?>

                    </p>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</body>
</html>