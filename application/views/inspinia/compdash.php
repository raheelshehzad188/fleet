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
$last_d = date("t", strtotime("next month"));
$m = date("m");
$y = date("y");
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
                                if(isset($vehicles) && $vehicles)
                                {
                                    foreach ($vehicles as $key => $v) {
                                        // code...
                                    
                                    ?>
                                    <tr style="width:2500px;">
                                <td><?= $v['v_registration_no'] ?></td>
                                <?php
                                for($i = 1;$i <=$last_d ;$i++)
                                {
                                    ?>
                                <td class="load" date="<?= $i.'-'.$m.'-'.$y ?>" vid="<?= $v['v_id'] ?>" ></td>
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
                                <th class="tot_income" date="<?= $i.'-'.$m.'-'.$y ?>"><?= $i ?></th>
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
        url: BASE_URL+'dashboard/load?date='+date+'&vid='+vid,
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
    $(document).ready(function(){
        refresh();
});
</script>