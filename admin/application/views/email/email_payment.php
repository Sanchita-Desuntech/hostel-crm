<table width="600" border="0" cellpadding="2" cellspacing="2" style="font: 12px Arial, Helvetica, sans-serif; color:#666;">
  <tr>
    <td align="left"><img src="{base_url}assets/emailer/logo.png" alt="Bookallads" /></td>
  </tr>
  <tr>
    <td><b>New payment</b></td>
  </tr>
  <tr>
    <td>Hello {SITE_TITLE},</td>
  </tr>
  <tr>
    <td>You have a new payment</td>
  </tr>
  <tr>
    <td><table width="500" border="0" cellpadding="2" cellspacing="2" style="font: 12px Arial, Helvetica, sans-serif; color:#666;">
        <tr>
          <td width="112">Txn id:</td>
          <td width="374">{txnid}</td>
        </tr>
        <tr>
          <td>Email:</td>
          <td>{email}</td>
        </tr>
        <tr>
          <td>Amount:</td>
          <td>{amount}</td>
        </tr>
        <tr>
          <td>Payment_id: </td>
          <td>{payment_id}</td>
        </tr>
        
      </table></td>
  </tr>
</table>
