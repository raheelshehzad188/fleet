<?php
if(true){
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php
                if(!isset($this->session->userdata['session_data'])) {
                $url=base_url();
                header("location: $url");
              }  
                $data = sitedata();
                $total_segments = $this->uri->total_segments(); 
                echo ucwords(str_replace('_', ' ', $this->uri->segment(1))).' | '.output($data['s_companyname'])  ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap 4 -->

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/adminlte.css">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css2?family=Noto+Nastaliq+Urdu&display=swap" rel="stylesheet">
  <style type="text/css">
.inv_container {
    width: 800px;
    margin: 0 auto;
    padding: 38px 0;
}
.inv_bdr {
    border: 1px solid #000;
    padding: 12px 16px 6px 8px;
    width: 800px;
    border-radius: 7px;
}
.label_input {
    display: inline-block;
    padding-bottom: 10px;
    padding: 0 0 6px 5px;
    font-family: 'Noto Nastaliq Urdu', sans-serif;
    direction: ltr;
}
.label_input label {
    margin: 0 4px 0 0;
    line-height: 1;
}
.label_input span {
    border-bottom: 1px dotted #000;
    display: inline-block;
    line-height: 1;
    font-size: 15px;
    margin: 0;
    text-align: center;
    width: 110px;
}
.expense_box_input {
    display: inline-block;
    padding: 0 7px 0 0;
    font-family: 'Noto Nastaliq Urdu', sans-serif;
   direction: ltr;
}
.expense_box {
    padding: 15px 0 0;
}
.expense_box_input span {
    border-bottom: 1px dotted #000;
    display: inline-block;
    line-height: 1;
    font-size: 15px;
    margin: 0;
    text-align: center;
    width: 100px;
}
.desial_report {
    display: inline-block;
    width: 53%;
    margin: 0 14px 0 0;
    text-align: center;
}
.top_head {
    text-align: center;
    clear: both;
    padding: 34px 0 27px 0;
}
.top_head h4 {
    background: #007137;
    color: #fff;
    font-size: 18px;
    border-radius: 35px;
    padding: 9px 36px;
    margin: 32px 0 17px 0;
    display: inline;
}
.inline_formbox {
    display: inline-block;
    padding: 0 0 12px 5px;
}
.list__items{margin-bottom: 10px;}
.inline_formbox span {
    border-bottom: 1px dotted #000;
    display: inline-block;
    line-height: 1;
    font-size: 15px;
    margin: 0;
    text-align: center;
    width: 60px;
}
.list__items label {
    width: 64%;
    text-align: left;
    border: 1px solid #ccc;
    border-radius: 35px 0 0 35px;
    padding: 8px 19px;
}
.list__items button {
    background: #007137;
    color: #fff;
    width: 32%;
    border: 1px solid #007137;
    text-transform: capitalize;
    text-align: center;
    padding: 8px 0;
    border-radius: 0 35px 35px 0;
    margin: 0 0 0 7px;
}

.expences__list {
    margin: 0 0 8px;
}
.expences__list span {
    text-align: center;
    border: 1px solid #ccc;
    border-radius: 35px;
    padding: 2px 19px;
    display: inline-block;
    width: 120px;
    margin: 0 6px 0 0;
}
.expences__list b {
    display: inline-block;
    width: 155px;
    /*text-align: right;*/
    border: 1px solid #ccc;
    border-radius: 35px;
    padding: 2px 19px;
}
.desial_report ,.expences_box{
    vertical-align: top;
}
.expences_box{
  width: 44%;
    display: inline-block;
    padding: 0 0 0 26px;
}


  </style>
</head>
<body>
<?php
  // var_dump($detail['expense']);
?>
<div class="inv_container">
  <div class="inv_bdr text-center">
    <div class="clearfix">
    <div class="label_input">

      <label>Period</label>
      <span><?php
        $dateFrom = new DateTime(date("Y-m-d", strtotime($tripdetails['t_end_date'])));
        $dateTo = new DateTime(date("Y-m-d", strtotime($tripdetails['t_start_date'])));

        echo $dateFrom->diff($dateTo)->days;
    ?> Days</span>
    </div>
    <div class="label_input">
      <label>Date To</label>
      <span><?= date("Y-m-d", strtotime($tripdetails['t_end_date'])); ?></span>
    </div>
    <div class="label_input">
      <label>Date From</label>
      <span><?= date("Y-m-d", strtotime($tripdetails['t_start_date'])); ?></span>
    </div>
    <div class="label_input">
      <label>Seriol No.</label>
      <span><?= $tripdetails['t_trackingcode']?></span>
    </div>
    </div>
    <div class="clearfix">
      
    <div class="label_input">
      <label>1st Driver</label>
      <span><?= $driverdetails->d_name ?></span>
    </div>
    <div class="label_input">
      <label>2nd Driver</label>
      <span><?= $driverdetails2->d_name ?></span>
    </div>
    
    <div class="label_input">
      <label>Helper</label>
      <span><?= $helper->d_name ?></span>
    </div>
    <div class="label_input">
      <label>Vehicle No.</label>
      <span><?= $vehicle->v_registration_no ?></span>
    </div>
    </div>
  </div>


  <div class="expense_box text-center">
      <?php
      $tot_rev = 0;
      foreach($detail['route'] as $k=> $v)
      {
          $srev = $v['unit_price'] * $v['weight'];
          $tot_rev = $tot_rev + $srev;

          ?>
    <div class="clearfix">
        <div class="expense_box_input">
          <label>From</label>
          <span><?= $v['route_from']; ?></span>
        </div>
        <div class="expense_box_input">
          <label>To</label>
          <span><?= $v['route_to'] ?></span>
        </div>
        <div class="expense_box_input">
          <label>Weight</label>
          <span><?= $v['weight'] ?></span>
        </div>
        <div class="expense_box_input">
          <label>Rate</label>
          <span><?= $v['unit_price'] ?></span>
        </div>
        <div class="expense_box_input">
          <label>Rent</label>
          <span><?= $srev ?></span>
        </div>
    </div>
          <?php
      }
      ?>

    <div class="clearfix">
      <div class="desial_report">
        <div class="top_head">
          <h4>Diesel Report</h4>
        </div>
        <?php
      foreach($detail['fuel'] as $k=> $v)
      {
          ?>
        <div class="inline_formbox">
          <label>Deisel</label>
          <span><?= $v['amount']?></span>
        </div>
        <div class="inline_formbox">
          <label>Deisel Quantity</label>
          <span><?= $v['fuel_quantity']?></span>
        </div>
        <div class="inline_formbox">
          <label>Pump</label>
          <span><?= $v['name']?></span>
        </div>
        <?php
          }
        ?>
        

        <div class="list__items">
          <label><?= $tot_rev ?></label>
          <button type="button">Total Income</button>
        </div>
         <?php
         $exp = 0;
          foreach($detail['expense'] as $k=> $v)
          {
            $exp += $v['amount'];
          }
          $prev_sav = 100;
          $net_sav = $tot_rev-$exp;
          $blnc = $net_sav+$prev_sav;
          ?>
        <div class="list__items">
          <label><?= $exp;?></label>
          <button type="button">Total expenses</button>
        </div>
        <div class="list__items">
          <label><?= $net_sav; ?></label>
          <button type="button">Net savings</button>
        </div>

        <div class="list__items">
          <label><?= $prev_sav ;?></label>
          <button type="button">Previous savings</button>
        </div>
        <div class="list__items">
          <label><?= $net_sav; ?></label>
          <button type="button">Current savings</button>
        </div>
        <div class="list__items">
          <label><?= $blnc; ?></label>
          <button type="button">balance</button>
        </div>
      </div>


      <div class="expences_box">
        <div class="top_head">
          <h4>Expences</h4>
        </div>
         <?php
          foreach($detail['expense'] as $k=> $v)
          {
          ?>
        <div class="expences__list">
          <span><?= $v['amount']?>/Rs</span>
          <b><?= $v['exp_name']?></b>
        </div>
        <?php
          }
        ?>
       
      </div>
    </div>
  </div>

</div>


<!-- <script type="text/javascript"> 
  window.addEventListener("load", window.print());
</script> -->
</body>
</html>
<?php
}else{
	?>
<!DOCTYPE html>
<html dir="rtl" lang="ur">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>سفر | VMS</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap 4 -->

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://fleet.quickon.pk/assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <!-- Theme style -->
  <link rel="stylesheet" href="https://fleet.quickon.pk/assets/dist/css/adminlte.css">

  <!-- Google Font: Source Sans Pro -->
<link href="https://fonts.googleapis.com/css2?family=Noto+Nastaliq+Urdu&display=swap" rel="stylesheet">  <style type="text/css">
    /* RTL adjustments */
body {
  font-family: 'Source Sans Pro', sans-serif;
  direction: rtl;
}

.inv_container {
  width: 800px;
  margin: 0 auto;
  padding: 38px 0;
}

.inv_bdr {
  border: 1px solid #000;
  padding: 12px 16px 6px 8px;
  border-radius: 7px;
}

.inv_bdr {
  border: 1px solid #000;
  padding: 12px 16px 6px 8px;
  border-radius: 7px;

}
.inv_bdrd {
  border: 1px solid #000;
  padding: 12px 16px 6px 8px;
  border-radius: 7px;
  display:flex;
  flex-direction: column;
  float: left;
  width:23%;
  padding:20px 10px;
}
.inv_bdrd .label_input{

  padding:10px 0px;
}
.label_input {
  display: inline-block;
  padding-bottom: 10px;
  padding: 0 0 6px 5px;
  font-family: 'Noto Nastaliq Urdu', sans-serif;
  direction: rtl;
}


.label_input label {
  margin: 0 4px 0 0;
  line-height: 1;
}

.label_input span {
  border-bottom: 1px dotted #000;
  display: inline-block;
  line-height: 1;
  font-size: 15px;
  margin: 0;
  text-align: center;
  width: 116px;
}

.expense_box_input {
  display: inline-block;
  padding: 0 7px 0 0;
  font-family: 'Noto Nastaliq Urdu', sans-serif;
  direction: rtl;
}

.expense_box {
  padding: 15px 0 0;
}

.expense_box_input span {
  border-bottom: 1px dotted #000;
  display: inline-block;
  line-height: 1;
  font-size: 15px;
  margin: 0;
  text-align: center;
  width: 116px;
}

.desial_report {
  display: inline-block;
  width: 53%;
  margin: 0 14px 0 0;
  text-align: center;
}
.desial_reportt {
  display: inline-block;
  width: 53%;
  margin: 0 14px 0 0;
  text-align: center;
  font-family: 'Noto Nastaliq Urdu', sans-serif;
      direction: rtl;
      width:55%;
}
.desial_reportt,.inline_formbox{
  margin-left: 30px;
}
.top_head {
  text-align: center;
  clear: both;
  padding: 34px 0 27px 0;
}

.top_head h4 {
  background: #007137;
  color: #fff;
  font-size: 18px;
  border-radius: 35px;
  padding: 9px 36px;
  margin: 32px 0 17px 0;
  display: inline;
}

.inline_formbox {
  display: inline-block;
  padding: 0 0 12px 5px;
}

.list__items {
  margin-bottom: 10px;
  direction: ltr;
}

.inline_formbox span {
  border-bottom: 1px dotted #000;
  display: inline-block;
  line-height: 1;
  font-size: 15px;
  margin: 0;
  text-align: center;
  width: 70px;
}

.list__items label {
  width: 64%;
  text-align: left;
  border: 1px solid #ccc;
  border-radius: 35px 0px 0px 35px	;
  padding: 8px 19px;
}

.list__items button {
  background: #007137;
  color: #fff;
  width: 32%;
  border: 1px solid #007137;
  text-transform: capitalize;
  text-align: center;
  padding: 8px 0;
  border-radius: 0px 35px 35px 0px;
  margin: 0 0 0 7px;
}

.expences__list {
  margin: 0 0 8px;
  direction: ltr;
}

.expences__list span {
  text-align: center;
  border: 1px solid #ccc;
  border-radius: 35px;
  padding: 2px 19px;
  display: inline-block;
  width: 33%;
  margin: 0 6px 0 0;
}

.expences__list b {
  display: inline-block;
  width: 64%;
  text-align: right;
  border: 1px solid #ccc;
  border-radius: 35px;
  padding: 2px 19px;
}

.desial_report,
.expences_box {
  vertical-align: top;
       font-family: 'Noto Nastaliq Urdu', sans-serif;
      direction: rtl;
}

.expences_box {
  width: 44%;
  display: inline-block;
  padding: 0 0 0 26px;
}


  </style>
</head>
<body>
<div class="inv_container">
  <div class="inv_bdr">
    <div class="clearfix">
     <div class="label_input">
        <label>سیریل نمبر</label>
        <span><?= $tripdetails['t_trackingcode']?></span>
      </div>
      
      <div class="label_input">
        <label>تاریخ سے</label>
        <span><?= date("Y-m-d", strtotime($tripdetails['t_start_date'])); ?></span>
      </div>
      <div class="label_input">
        <label>تاریخ تک</label>
        <span><?= date("Y-m-d", strtotime($tripdetails['t_end_date'])); ?></span>
      </div>
       <div class="label_input">

        <label>دورانیہ</label>
        <span><?php
        $dateFrom = new DateTime(date("Y-m-d", strtotime($tripdetails['t_end_date'])));
        $dateTo = new DateTime(date("Y-m-d", strtotime($tripdetails['t_start_date'])));

        echo $dateFrom->diff($dateTo)->days;?></span>
      </div>
    </div>
    <div class="clearfix">

     <div class="label_input">
        <label>گاڑی نمبر</label>
        <span>ہ<?= $vehicle->v_registration_no ?></span>
      </div>
     
      <div class="label_input">
        <label>پہلا ڈرائیور</label>
        <span><?= $driverdetails->d_name ?></span>
        
      </div>
       <div class="label_input">
        <label>دوسرا ڈرائیور</label>
        <span><?= $driverdetails2->d_name ?></span>
      </div>
      
       <div class="label_input">
        <label>ہیلپر</label>
        <span><?= $helper->d_name ?></span>
      </div>
    </div>
  </div>


  <div class="expense_box">
  	<?php
      $tot_rev = 0;
      foreach($detail['route'] as $k=> $v)
      {
          $srev = $v['unit_price'] * $v['weight'];
          $tot_rev = $tot_rev + $srev;

          ?>
    <div class="clearfix">
      <div class="expense_box_input">
        <label>از</label>
        <span><?= $routes[$v['route_from']]; ?></span>
      </div>
      <div class="expense_box_input">
        <label>تا </label>
        <span><?= $routes[$v['route_to']]; ?></span>
      </div>
      <div class="expense_box_input">
        <label>وزن</label>
        <span><?= $v['weight'] ?></span>
      </div>
      <div class="expense_box_input">
        <label>ریٹ</label>
        <span><?= $v['unit_price'] ?></span>
      </div>
      <div class="expense_box_input">
        <label>کرایہ</label>
        <span><?= $srev ?></span>
      </div>
    </div>
     <?php
      }
      ?>
    <div class="clearfix">
      


      <div class="expences_box">
        <div class="top_head">
          <h4>اخراجات</h4>
        </div>
        <?php
          foreach($detail['expense'] as $k=> $v)
          {
          ?>
        <div class="expences__list">
          <span><?= $v['amount']?>/رپیہ</span>
          <b><?= $v['exp_name']?></b>
        </div>
        <?php
        	}
        ?>
      </div>
      <div class="desial_report">
        <div class="top_head">
          <h4>ڈیزل رپورٹ</h4>
        </div>
        <?php
      foreach($detail['fuel'] as $k=> $v)
      {
          ?>
        <div class="inline_formbox">
          <label>پمپ</label>
          <span><?= $v['name']?></span>
        </div>

        <div class="inline_formbox">
          <label>مقدار</label>
          <span><?= $v['fuel_quantity']?></span>
        </div>
        
        <div class="inline_formbox">
          <label>ڈیزل</label>
          <span><?= $v['amount']?></span>
        </div>
        <?php
        	}
        ?>
        <div class="list__items">
          <label><?= $tot_rev ?></label>
          <button type="button">کل آمدن</button>
        </div>
        <?php
         $exp = 0;
          foreach($detail['expense'] as $k=> $v)
          {
            $exp += $v['amount'];
          }
          $prev_sav = 100;
          $net_sav = $tot_rev-$exp;
          $blnc = $net_sav+$prev_sav;
          ?>
        <div class="list__items">
          <label><?= $exp;?></label>
          <button type="button">کل اخراجات</button>
        </div>
        <div class="list__items">
          <label><?= $net_sav; ?></label>
          <button type="button">صاف بچت</button>
        </div>

        <div class="list__items">
          <label><?= $prev_sav ;?></label>
          <button type="button">پچھلا بچت</button>
        </div>
        <div class="list__items">
          <label><?= $net_sav; ?></label>
          <button type="button">موجودہ بچت</button>
        </div>
        <div class="list__items">
          <label><?= $blnc; ?></label>
          <button type="button">بقیہ</button>
        </div>
      </div>
      

   
  </div>
  <div class="desial_reportt float-right">
          <div class="inline_formbox">
          <label>پمپ</label>
          <span>سنگھا پمپ</span>
        </div>
        
        <div class="inline_formbox">
          <label>ڈیزل مقدار</label>
          <span>500</span>
        </div>
        <div class="inline_formbox">
          <label>ڈیزل</label>
          <span></span>
        </div> <div class="inline_formbox">
          <label>پمپ</label>
          <span>سنگھا پمپ</span>
        </div>
        
        <div class="inline_formbox">
          <label>ڈیزل مقدار</label>
          <span>500</span>
        </div>
        <div class="inline_formbox">
          <label>ڈیزل</label>
          <span></span>
        </div> <div class="inline_formbox">
          <label>پمپ</label>
          <span>سنگھا پمپ</span>
        </div>
        
        <div class="inline_formbox">
          <label>ڈیزل مقدار</label>
          <span>500</span>
        </div>
        <div class="inline_formbox">
          <label>ڈیزل</label>
          <span></span>
        </div>
      

    </div>
  </div>

</div>
    </div>
  </div>

</div>
</div>

</body>
</html>

<?php
}
?>
<script type="text/javascript"> 
  window.addEventListener("load", window.print());
</script>