<style>
	body{
  background:#EEE;
  /* font-size:0.9em !important; */
}
.invoice{
  width:970px !important;
  margin:50px auto;
  .invoice-header{
    padding:25px 25px 15px;
    h1{
      margin:0
    }
    .media{
      .media-body{
        font-size:.9em;
        margin:0;
      }
    }
  }
  .invoice-body{
    border-radius:10px;
    padding:25px;
    background:#FFF;
  }
  .invoice-footer{
    padding:15px;
    font-size:0.9em;
    text-align:center;
    color:#999;
  }
}
.logo{
  max-height:70px;
  border-radius:10px;
}
.dl-horizontal{
  margin:0;
  dt{
        float: left;
    width: 80px;
    overflow: hidden;
    clear: left;
    text-align: right;
    text-overflow: ellipsis;
    white-space: nowrap;
  }
  dd{
    margin-left:90px;
  }
}
.rowamount{
  padding-top:15px !important;
}
.rowtotal{
  font-size:1.3em;
}
.colfix{
  width:12%;
}
.mono{
  font-family:monospace;
}

</style>
<?php
/*echo "<pre>";
print_r($printing_data);
echo "</pre>";*/

foreach($printing_data as $print){
?>



<div id="print">
<div class="container invoice" >
  <div class="invoice-header">
    <div class="row">
      <div class="col-xs-8">
        <h1>Invoice <small></small></h1>
        <h4 class="text-muted">NO: <?php echo $print->invoice_code;?> | Date:  <?php echo $print->inv_date;?></h4>
      </div>
      <div class="col-xs-4">
        <div class="media">
          <div class="media-left">
            <!--<img class="media-object logo" src="https://dummyimage.com/70x70/000/fff&text=VALOGICAL" />-->
          </div>
          <ul class="media-body list-unstyled">
            <li><strong>Valogical</strong></li>
            <li>Software Development</li>
            <li>Test Address</li>
            <li>info@valogical.com</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="invoice-body">
    <div class="row">
      <div class="col-xs-5">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Company Details</h3>
          </div>
          <div class="panel-body">
            <dl class="dl-horizontal">
              <dt>Name</dt>
              <dd><strong>Valogical</strong></dd>
              <dt>Industry</dt>
              <dd>Software Development</dd>
              
          </div>
        </div>
      </div>
      <div class="col-xs-7">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Customer Details</h3>
          </div>
          <div class="panel-body">
            <dl class="dl-horizontal">
              <dt>Name</dt>
              <dd><?php echo $print->customer_name;?> </dd>
          </div>
        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Services / Products</h3>
      </div>
      <table class="table table-bordered table-condensed">
        <thead>
          <tr>
            <th>Item / Details</th>
            <th class="text-center colfix">Amount(Rs)</th>
            <th class="text-center colfix">Paid Status</th>
            <th class="text-center colfix">Pay Method</th>
            <!--<th class="text-center colfix">Sum Cost</th>
            <th class="text-center colfix">Discount</th>
            <th class="text-center colfix">Tax</th>-->
            <th class="text-center colfix">Total(Rs)</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              <?php echo $print->ser_name;?>
              <br>
              <small class="text-muted">  <?php echo $print->service_code;?></small>
            </td>
            <td class="text-right">
              <span class="mono"><?php echo $print->amount;?></span>
              <br>
              
            </td>
           <td class="text-right">
              <span class="mono"><?php if($print->status == '0'){echo "Not Paid";}else{echo "Paid";}?></span>
              <br>
              
            </td>
             <td class="text-right">
              <span class="mono"><?php if($print->payment_method == '0'){echo "Cash";}else{echo "Net Banking";}?></span>
              <br>
              
            </td>
            <td class="text-right">
              <strong class="mono"><?php echo $print->amount;?></strong>
              <br>
            </td>
          </tr>

         
        </tbody>
      </table>
    </div>
   
    <div class="row">
      <div class="col-xs-7">
        <div class="panel panel-default">
          <div class="panel-body">
            <i>Comments / Notes</i>
            <hr style="margin:3px 0 5px" /> <?php echo $print->inv_descrp;?>
          </div>
        </div>
      </div>
      <div class="col-xs-5">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Payment Method</h3>
          </div>
          <div class="panel-body">
            <p>For your convenience, you may deposite the final ammount at one of our banks</p>
            <ul class="list-unstyled">
              <li>Alpha Bank - <span class="mono">MO123456789456123</span></li>
              <li>Beta Bank - <span class="mono">MO123456789456123</span></li>
              <li>Gamma Bank - <span class="mono">MO123456789456123</span></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

  </div>
  <div class="invoice-footer">
    Thank you for choosing our services.
    <br/> We hope to see you again soon
    <br/>
    <strong>~Valogical~</strong>
  </div>
</div>
</div>


<?php } ?>
<script>



window.onload = function(e){ 
   window.print();
}
</script>