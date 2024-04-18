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
                        <h5>Basic Table</h5>
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
                   
                    <div style="width: 3000px;">

                        <table class="table table-bordered">
                            <thead>
                            <tr style="width:2500px;">
                                <th>Gari</th>
                                <?php
                                for($i = 1;$i <=$last_d ;$i++)
                                {
                                    ?>
                                <th><?= $i ?></th>
                                <?php
                                }
                                ?>
                            </tr>
                            </thead>
                            <tbody>
                            
                                <?php
                                if(isset($driverslist) && $driverslist)
                                {
                                    foreach ($driverslist as $key => $v) {
                                        // code...
                                    
                                    ?>
                                    <tr style="width:2500px;">
                                <td><?= $v['d_name'] ?></td>
                                <?php
                                for($i = 1;$i <=$last_d ;$i++)
                                {
                                    ?>
                                <td class="load" date="<?= $y.'-'.$m.'-'.$i ?>" vid="<?= $v['d_id'] ?>" ></td>
                                <?php
                                }
                                ?>
                            </tr>
                                <?php
                                }
                            }

                                ?>
                            </tbody>
                            <tfoot>
                            <tr style="width:2500px;">
                                <th>Total Income</th>
                                <?php
                                for($i = 1;$i <=$last_d ;$i++)
                                {
                                    ?>
                                <th class="tot_income" date="<?= $y.'-'.$m.'-'.$i ?>"><?= $i ?></th>
                                <?php
                                }
                                ?>
                            </tr>
                            </tfoot>
                        </table>

                    </div>
                </div>
            </div>    

</div>
<script type="text/javascript">
    function refresh(){
        $('.load').each(function(i, obj) {
    var vid = $(this).attr('vid');
    var old = $(this);
    old.html('Loading');
    var date = $(this).attr('date');
    console.log(vid+' '+date);
    $.ajax({
        url: BASE_URL+'drivers/load?date='+date+'&vid='+vid,
        type: "Post",
        async: true,
        data: { },
        success: function (data) {
            // old.html(data);
            var personObject = JSON.parse(data); //parse json string into JS object
            console.log(personObject);
            old.attr('bgcolor',personObject['bgcolor']);
            old.html(' ');
            old.css('color','#fff');
            if(personObject['status'])
            {
                old.html(personObject['html']);
                old.attr('bgcolor',personObject['bgcolor']);

            }
            else
            {
                // old.html(personObject['html']);
                old.attr('onclick',personObject['onclick']);

            }

            console.log(data);
           
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
        $('.tot_income').each(function(i, obj) {
    var vid = 0;
    var old = $(this);
    old.html('Loading');
    var date = $(this).attr('date');
    console.log(vid+' '+date);
    $.ajax({
        url: BASE_URL+'dashboard/tot_income?date='+date+'&vid='+vid,
        type: "Post",
        async: true,
        data: { },
        success: function (data) {
            old.html(data);
            console.log(data);
           
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
    function add_attendence(date,vid)
    {
        alert(date+' = '+vid);
    }
    $(document).ready(function(){
        refresh();
});
</script>