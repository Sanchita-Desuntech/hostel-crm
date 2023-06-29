<table cellpadding="0" cellspacing="0" width="100%" style="width:100%; margin:0 auto;" align="center">
  <tr>
    <td style="padding-top:0; padding-bottom:0; background:#f3f3f3;"><table width="600" align="center" bgcolor="#f3f3f3" border="0" cellpadding="0" cellspacing="0" style="text-align:center;vertical-align:central;margin:0 auto;">
        <tr>
          <td style="padding-top:10px;"><table class="content" align="center" cellpadding="0" cellspacing="0" border="0">
              <tr>
                <td style="background:#fff;"><table>
                    <tr>
                      <td bgcolor="#fff" style="padding:23px 0 15px 0;text-align:center;"><img src="{base_url}assets/emailer/logo.png" alt="Bookallads" /></td>
                    </tr>
                    <tr>
                      <td><table width="100%">
                          <tr>
                            <td bgcolor="#f7f7f7" style="border:1px solid #ddd;"><table width="100%">
                                <tr>
                                  <td><table width="100%">
                                      <tr>
                                        <td style="text-align:left;"><img src="{base_url}/themes/front/images/shopping-cart.png" /></td>
                                        <td style="font:bold 11px Arial, Helvetica, sans-serif;padding:5px 0;color:#464646;text-align:left;">ORDER ID</td>
                                        <td style="font:normal 11px Arial, Helvetica, sans-serif;padding:5px 0;color:#9e9e9e;text-align:left;">{final_order_id}</td>
                                      </tr>
                                      <tr>
                                        <td style="text-align:left;"><img src="{base_url}/themes/front/images/clock.png" /></td>
                                        <td style="font:bold 11px Arial, Helvetica, sans-serif;padding:5px 0;color:#464646;text-align:left;"> PLACED ON</td>
                                        <td style="font:normal 11px Arial, Helvetica, sans-serif;padding:5px 0;color:#9e9e9e;text-align:left;">{date_created}</td>
                                      </tr>
                                      <tr>
                                        <td style="text-align:left;"><img src="{base_url}/themes/front/images/copy.png" /></td>
                                        <td style="font:bold 11px Arial, Helvetica, sans-serif;padding:5px 0;color:#464646;text-align:left;"> AD TYPE</td>
                                        <td style="font:normal 11px Arial, Helvetica, sans-serif;padding:5px 0;color:#9e9e9e;text-align:left;text-transform:uppercase;">{media_name} {advert_name}</td>
                                      </tr>
                                    </table></td>
                                  <td style="text-align:right;" align="right"></td>
                                </tr>
                              </table></td>
                          </tr>
                          <tr>
                            <td width="100%"> {order_detail_html} </td>
                          </tr>
                        </table></td>
                    </tr>
                    <tr>
                      <td bgcolor="#fff" style="padding:10px 0 5px 0;text-align:center;">&nbsp;</td>
                    </tr>
                    <tr>
                      <td bgcolor="#fff" style="padding:10px 0 5px 0;text-align:center; font:bold 12px Arial, Helvetica, sans-serif;padding:5px 0;color:#464646;"> Please make payment of Rs.{ammount_due} via NEFT within 24 hours on the following bank details and send us an email confirmation with the payment reference number / UTR number on contact@bookallads.com. Thereafter, your order shall be processed.                        </td>
                    </tr>
                    <tr>
                      <td bgcolor="#fff" style="padding:10px 0 5px 0;text-align:center;">&nbsp;</td>
                    </tr>
                    <tr>
                      <td bgcolor="#fff" style="padding:10px 0 5px 0;text-align:center;"><table width="100%">
                          <tr>
                            <td bgcolor="#f7f7f7" style="border:1px solid #ddd;"><table width="100%">
                                <tr>
                                  <td colspan="3" style="font:bold 12px Arial, Helvetica, sans-serif;padding:5px 0;color:#464646;text-align:left;">Bank details</td>
                                </tr>
                                <tr>
                                  <td width="7%" style="text-align:left;"><img src="{base_url}/themes/front/images/accountnameicon.png" /></td>
                                  <td width="23%" style="font:bold 11px Arial, Helvetica, sans-serif;padding:5px 0;color:#464646;text-align:left;">Account name</td>
                                  <td width="70%" style="font:normal 11px Arial, Helvetica, sans-serif;padding:5px 0;color:#9e9e9e;text-align:left;">KPS BOOKALLADS PVT LTD</td>
                                </tr>
                                <tr>
                                  <td width="7%" style="text-align:left;"><img src="{base_url}/themes/front/images/bankname.png" /></td>
                                  <td width="23%" style="font:bold 11px Arial, Helvetica, sans-serif;padding:5px 0;color:#464646;text-align:left;">Bank name</td>
                                  <td width="70%" style="font:normal 11px Arial, Helvetica, sans-serif;padding:5px 0;color:#9e9e9e;text-align:left;">UCO Bank</td>
                                </tr>
                                <tr>
                                  <td style="text-align:left;"><img src="{base_url}/themes/front/images/accounno.png" /></td>
                                  <td style="font:bold 11px Arial, Helvetica, sans-serif;padding:5px 0;color:#464646;text-align:left;">A/C No</td>
                                  <td style="font:normal 11px Arial, Helvetica, sans-serif;padding:5px 0;color:#9e9e9e;text-align:left;"> 05830210001028</td>
                                </tr>
                                <tr>
                                  <td style="text-align:left;"><img src="{base_url}/themes/front/images/branchname.png" /></td>
                                  <td style="font:bold 11px Arial, Helvetica, sans-serif;padding:5px 0;color:#464646;text-align:left;">Branch name</td>
                                  <td style="font:normal 11px Arial, Helvetica, sans-serif;padding:5px 0;color:#9e9e9e;text-align:left;"> Beckbagan</td>
                                </tr>
                                <tr>
                                  <td style="text-align:left;"><img src="{base_url}/themes/front/images/ifsccode.png" /></td>
                                  <td style="font:bold 11px Arial, Helvetica, sans-serif;padding:5px 0;color:#464646;text-align:left;">IFSC code</td>
                                  <td style="font:normal 11px Arial, Helvetica, sans-serif;padding:5px 0;color:#9e9e9e;text-align:left;text-transform:uppercase;">UCBA0000583</td>
                                </tr>
                              </table></td>
                          </tr>
                        </table></td>
                    </tr>
                    <tr>
                      <td bgcolor="#fff" style="padding:12px 0 15px 0;text-align:center;"><a style="background:#b51e23;text-align:center;padding:10px 20px 10px 20px;border-bottom:5px solid #a9191e; font:bold 14px Arial, Helvetica, sans-serif;color:#fff;text-transform:uppercase;text-decoration:none;" href="{base_url}/account/orders">View Orders</a></td>
                    </tr>
                    <tr>
                      <td bgcolor="#fff" style="padding:10px 0 26px 0;text-align:center;font:normal 12px Arial, Helvetica, sans-serif;color:#605f5f;line-height:18px;">BookAllAds is India's quickest and safest online Ad Portal and gives you access to unlimited advertising options and the best prices, deals, discounts and offers available all across India</td>
                    </tr>
                  </table>
                  <table style="background:#f3f3f3;">
                    <tr>
                      <td style="font:normal 10px Arial, Helvetica, sans-serif;padding:25px 0 15px;color:#9e9e9e;">For Support request, Please contact us by going to our official website Bookallads.com
                        
                        This Email has been sent to you by Bookallads team </td>
                    </tr>
                  </table></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
</table>
