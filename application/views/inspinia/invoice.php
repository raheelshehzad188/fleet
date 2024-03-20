
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
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <style type="text/css">
.inv_container {
    width: 800px;
    margin: 0 auto;
    padding: 38px 0;
}
.inv_bdr {
    border: 1px solid #000;
    padding: 12px 16px 6px 8px;
    border-radius: 7px;
    text-align: right;
}
.label_input {
    display: inline-block;
    padding-bottom: 10px;
    padding: 0 0 6px 5px;
}
.label_input label {
    margin: 0 4px 0 0;
    line-height: 1;
    text-align: right;
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
    width: 70px;
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

<div class="inv_container">
  <div class="inv_bdr">
    <div class="clearfix">
    <div class="label_input">
      <span>7 Days</span>
      <label>Period</label>
    </div>
    <div class="label_input">
      <span>15-3-2024</span>
      <label>Date To</label>
    </div>
    <div class="label_input">
      <span>14-2-2024</span>
      <label>Date From</label>
    </div>
    <div class="label_input">
      <span>12</span>
      <label>Seriol No.</label>
    </div>
    </div>
    <div class="clearfix">
      
    <div class="label_input">
      <span>Aliyan</span>
      <label>Helper</label>
    </div>
    <div class="label_input">
      <span>Ali</span>
      <label>2nd Driver</label>
    </div>
    <div class="label_input">
      <span>Hassan</span>
      <label>1st Driver</label>
    </div>
    <div class="label_input">
      <span>TLP-20234</span>
      <label>Vehicle No.</label>
    </div>
    </div>
  </div>


  <div class="expense_box">
    <div class="clearfix">
        <div class="expense_box_input">
          <span>Qamarmishani</span>
          <label>From</label>
        </div>
        <div class="expense_box_input">
          <span>Khushab</span>
          <label>To</label>
        </div>
        <div class="expense_box_input">
          <span>100ton</span>
          <label>Weight</label>
        </div>
        <div class="expense_box_input">
          <span>23454</span>
          <label>Rate</label>
        </div>
        <div class="expense_box_input">
          <span>54578575</span>
          <label>Rent</label>
        </div>
    </div>
    <div class="clearfix">
        <div class="expense_box_input">
          <span>Qamarmishani</span>
          <label>From</label>
        </div>
        <div class="expense_box_input">
          <span>Khushab</span>
          <label>To</label>
        </div>
        <div class="expense_box_input">
          <span>100ton</span>
          <label>Weight</label>
        </div>
        <div class="expense_box_input">
          <span>23454</span>
          <label>Rate</label>
        </div>
        <div class="expense_box_input">
          <span>54578575</span>
          <label>Rent</label>
        </div>
    </div>

    <div class="clearfix">
        <div class="expense_box_input">
          <span>Qamarmishani</span>
          <label>From</label>
        </div>
        <div class="expense_box_input">
          <span>Khushab</span>
          <label>To</label>
        </div>
        <div class="expense_box_input">
          <span>100ton</span>
          <label>Weight</label>
        </div>
        <div class="expense_box_input">
          <span>23454</span>
          <label>Rate</label>
        </div>
        <div class="expense_box_input">
          <span>54578575</span>
          <label>Rent</label>
        </div>
    </div>

    <div class="clearfix">
      <div class="desial_report">
        <div class="top_head">
          <h4>Diesel Report</h4>
        </div>
        <div class="inline_formbox">
          <span>12345</span>
          <label>Deisel</label>
        </div>
        <div class="inline_formbox">
          <span>250</span>
          <label>Deisel Quantity</label>
        </div>
        <div class="inline_formbox">
          <span>Sangha</span>
          <label>Pump</label>
        </div>
        <div class="inline_formbox">
          <span>12345</span>
          <label>Deisel</label>
        </div>
        <div class="inline_formbox">
          <span>250</span>
          <label>Deisel Quantity</label>
        </div>
        <div class="inline_formbox">
          <span>Sangha</span>
          <label>Pump</label>
        </div>
        <div class="inline_formbox">
          <span>12345</span>
          <label>Deisel</label>
        </div>
        <div class="inline_formbox">
          <span>250</span>
          <label>Deisel Quantity</label>
        </div>
        <div class="inline_formbox">
          <span>Sangha</span>
          <label>Pump</label>
        </div>


        <div class="list__items">
          <label>92793</label>
          <button type="button">Total Income</button>
        </div>
        <div class="list__items">
          <label>92793</label>
          <button type="button">Total expenses</button>
        </div>
        <div class="list__items">
          <label>92793</label>
          <button type="button">Net savings</button>
        </div>
        <div class="list__items">
          <label>92793</label>
          <button type="button">Previous savings</button>
        </div>
        <div class="list__items">
          <label>92793</label>
          <button type="button">Current savings</button>
        </div>
        <div class="list__items">
          <label>92793</label>
          <button type="button">balance</button>
        </div>
      </div>


      <div class="expences_box">
        <div class="top_head">
          <h4>Expences</h4>
        </div>
        <div class="expences__list">
          <span>3000/Rs</span>
          <b>Diesel</b>
        </div>
        <div class="expences__list">
          <span>40/Rs</span>
          <b>Tool Tax</b>
        </div>
        <div class="expences__list">
          <span>400/Rs</span>
          <b>Food Expence</b>
        </div>
        <div class="expences__list">
          <span>400/Rs</span>
          <b>Award</b>
        </div>
        <div class="expences__list">
          <span>  40/Rs</span>
          <b>Air</b>
        </div>
        <div class="expences__list">
          <span>3000/Rs</span>
          <b>Loading</b>
        </div>
        <div class="expences__list">
          <span>3000/Rs</span>
          <b>Un-loading</b>
        </div>
        <div class="expences__list">
          <span>20/Rs</span>
          <b>Tax</b>
        </div>
        <div class="expences__list">
          <span>400/Rs</span>
          <b>Challan</b>
        </div>
        <div class="expences__list">
          <span>1200/Rs</span>
          <b>Moble Oil</b>
        </div>
        <div class="expences__list">
          <span>400/Rs</span>
          <b>Grease</b>
        </div>
        <div class="expences__list">
          <span>  100/Rs</span>
          <b>Kairat</b>
        </div>
        <div class="expences__list">
          <span>10000/Rs</span>
          <b>Total</b>
        </div>
      </div>
    </div>
  </div>

</div>


<!-- <script type="text/javascript"> 
  window.addEventListener("load", window.print());
</script> -->
</body>
</html>
