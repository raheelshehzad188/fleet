<style type="text/css">
    table {
    display: flex;
    flex-flow: column;
    width: 100%;
}

thead {
    flex: 0 0 auto;
}

tbody {
    flex: 1 1 auto;
    display: block;
    overflow-y: auto;
    overflow-x: hidden; 
}

tr {
    width: 100%;
    display: table;
    table-layout: fixed;
}
th {
    white-space: nowrap;
}
</style>
<div class="row" >
     <div class="ibox-title container" style="width: 100%; margin-left: 16px;">
                        <h5>Salaries</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link1" style="padding-right: 10px;" onclick="refresh()">
                                <i class="fa fa-repeat"></i>
                            </a>
                        </div>
                    </div>
<div class="col-lg-12" style="overflow: scroll;">
    <?php
    $m = date('m');//yhn foildate month
    $y = date('Y');///yhn filter year
    $datestring = $y.'-'.$m.'-1'; 
  
// Converting string to date 
$date = strtotime($datestring); 
   
// Last date of current month. 
$lastdate = strtotime(date("Y-m-t", $date )); 
  
  
// Day of the last date  
$last_date  = date("d", $lastdate); 
$last_d = $last_date;
    ?>

                <div class="ibox float-e-margins">
                   
                    <div>

                        <table class="table table-bordered">
                            <thead>
                            <tr >
                                <th>Name</th>
                                <th>Assigned Salary</th>
                                <th>Per day salary</th>
                                <th>Abcentees</th>
                                <th>Bonus</th>
                                <th>Loan</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            
                                <?php
                                if(isset($driverslist) && $driverslist)
                                {
                                    foreach ($driverslist as $key => $v) {
                                        // code...
                                    
                                    ?>
                                    <tr id="row_<?= $v['d_id'] ?>">
                                <td><?= $v['d_name'] ?></td>
                                <td class="salary"><?= $v['d_salary'] ?></td>
                                <td class="dsalary"><?= $v['d_salary']/$last_d ?></td>
                                <td class="abs" date="<?= $m.'-'.$y ?>" vid="<?= $v['d_id'] ?>">Loading</td>
                                <td class="bonus" date="<?= $m.'-'.$y ?>" vid="<?= $v['d_id'] ?>">Loading</td>
                                <td class="loan" date="<?= $m.'-'.$y ?>" vid="<?= $v['d_id'] ?>">Loading</td>
                                <td class="total" date="<?= $m.'-'.$y ?>" vid="<?= $v['d_id'] ?>">Loading</td>
                            </tr>
                                <?php
                                }
                            }

                                ?>
                            </tbody>
                            <tfoot>
                            <tr >
                                <th colspan="6" style="text-align: center;"">Grand total</th>
                                <th id="gtot">Total</th>
                            </tr>
                            </tfoot>
                        </table>

                    </div>
                </div>
            </div>    

</div>
<script type="text/javascript">
    function cal_row(sid ,test=0)
    {
        var mid = "#row_"+sid;
        var dsalary = parseFloat($(mid+' > .dsalary').text());
        var loan = parseFloat($(mid+' > .loan').text());
        console.log(loan);
        if(!loan)
        {
            loan = 0;
        }
        var abs = parseInt($(mid+' > .abs').text());

        var tot_d = '<?= $last_d ?>';
        var present =  tot_d - abs
        var tsal = parseFloat(((dsalary * present)-loan).toFixed());
        console.log(tsal);
        if(tsal > 0)
        {
            $(mid+' > .total').attr('type','plus'); 
        }
        else
        {
            $(mid+' > .total').attr('type','minus');
        }
        $(mid+' > .total').text(tsal);
        var tot = 0;
        $('.total').each(function(i, obj) {
            if($(this).attr('type') == 'plus')
            {
            var am = parseFloat($(this).text()).toFixed(2);
            tot = parseFloat(tot + am);
            }
            else
            {
                var am = parseFloat(Math.abs($(this).text())).toFixed(2);
                    tot = parseFloat(tot - am);
            }

        });
        $('#gtot').text(tot);

    }
    function refresh(){
        $('.abs').each(function(i, obj) {
    var vid = $(this).attr('vid');
    var old = $(this);
    old.html('Loading');
    var date = $(this).attr('date');
    console.log(vid+' '+date);
    $.ajax({
        url: BASE_URL+'drivers/abs?date='+date+'&vid='+vid,
        type: "Post",
        async: true,
        data: { },
        success: function (data) {
             old.html(data);
             cal_row(vid );
            
           
        },
        error: function (xhr, exception) {
            var msg = "";
            if (xhr.status === 0) {
                msg = "Not connect.\n Verify Network." + xhr.responseText;
            } else if (xhr.status == 404) {
                msg = "Requested page not found. [404]" + xhr.responseText;
            } else if (xhr.status == 500) {
                msg = "Internal Server Error [500]." +  xhr.responseText;
            } else if (exception === "parsererror") {
                msg = "Requested JSON parse failed.";
            } else if (exception === "timeout") {
                msg = "Time out error." + xhr.responseText;
            } else if (exception === "abort") {
                msg = "Ajax request aborted.";
            } else {
                msg = "Error:" + xhr.status + " " + xhr.responseText;
            }
           
        }
    }); 
    });
        $('.bonus').each(function(i, obj) {
    var vid = $(this).attr('vid');
    var old = $(this);
    old.html('Loading');
    var date = $(this).attr('date');
    console.log(vid+' '+date);
    $.ajax({
        url: BASE_URL+'drivers/bonus?date='+date+'&vid='+vid,
        type: "Post",
        async: true,
        data: { },
        success: function (data) {
             old.html(data);
             cal_row(vid );
            
           
        },
        error: function (xhr, exception) {
            var msg = "";
            if (xhr.status === 0) {
                msg = "Not connect.\n Verify Network." + xhr.responseText;
            } else if (xhr.status == 404) {
                msg = "Requested page not found. [404]" + xhr.responseText;
            } else if (xhr.status == 500) {
                msg = "Internal Server Error [500]." +  xhr.responseText;
            } else if (exception === "parsererror") {
                msg = "Requested JSON parse failed.";
            } else if (exception === "timeout") {
                msg = "Time out error." + xhr.responseText;
            } else if (exception === "abort") {
                msg = "Ajax request aborted.";
            } else {
                msg = "Error:" + xhr.status + " " + xhr.responseText;
            }
           
        }
    }); 
    });
        $('.loan').each(function(i, obj) {
    var vid = $(this).attr('vid');
    var old = $(this);
    old.html('Loading');
    var date = $(this).attr('date');
    console.log(vid+' '+date);
    $.ajax({
        url: BASE_URL+'drivers/loan?date='+date+'&vid='+vid,
        type: "Post",
        async: true,
        data: { },
        success: function (data) {
             old.html(data);
             cal_row(vid );
            
           
        },
        error: function (xhr, exception) {
            var msg = "";
            if (xhr.status === 0) {
                msg = "Not connect.\n Verify Network." + xhr.responseText;
            } else if (xhr.status == 404) {
                msg = "Requested page not found. [404]" + xhr.responseText;
            } else if (xhr.status == 500) {
                msg = "Internal Server Error [500]." +  xhr.responseText;
            } else if (exception === "parsererror") {
                msg = "Requested JSON parse failed.";
            } else if (exception === "timeout") {
                msg = "Time out error." + xhr.responseText;
            } else if (exception === "abort") {
                msg = "Ajax request aborted.";
            } else {
                msg = "Error:" + xhr.status + " " + xhr.responseText;
            }
           
        }
    }); 
    });


    }
    $(document).ready(function(){
        refresh();
});

</script>