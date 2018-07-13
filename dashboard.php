<?php 

include('classes/merchant.php');
include('classes/planManager.php');
include('header.php');
 ?>


        
        <div class="wrapper wrapper-content">
            <div class="row">
                <div class="col-lg-12">
                       <div class="ibox float-e-margins">
                        <div class="ibox-title">
                        <div class="row">
                          <div class="col-md-3" style="float: left;">
                            
                            <select id="year" class="form-control" onchange="loadGraph()">
                                    
                                <?php
                                $yearList=$objMerchat->getYear();
                                if(count($yearList)>0)
                                {
                                $i=1;
                                foreach ($yearList as $key => $yearValue) 
                                {
                                ?>
                                            <option <?php if($i==1){ ?> selected="selected" <?php } ?> value="<?php echo $yearValue['year']; ?>"><?php echo $yearValue['year']; ?></option>
                                        <?php
                                        $i++;
                                        }
                                       }
                                       else
                                       {
                                        ?>
                                        <option>No Year Found.</option>
                                        <?php
                                       }
                                        ?>          
                                </select>
                          </div>

                          </div>
            <div class="chartContainer" style="height: 200px; width: 100%;"></div>
                    
                    </div>
                </div>
                       
                            
                        <div class="col-lg-12">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    <h5>All About Currency</h5>
                                    <div class="ibox-tools">
                                    </div>
                                </div>
                                <div class="ibox-content ibox-heading">
                                    <h3>Recent Data OF Models!</h3>
                                    
                                </div>

                                <div class="ibox-content inspinia-timeline">
                                <div class="timeline-item">
                                        <div class="row">
                                            <div class="col-xs-3 date">
                                                <i class="fa fa-credit-card fa-lg"></i>
                                                For More
                                                <br/>
                                                <a href="coin_plans.php"><small class="text-navy">Click Here</small></a>
                                            </div>
                                            <div class="col-xs-7 content">
                                                <p class="m-b-xs"><strong>Plan Type</strong></p>
                                        <table class="table table-striped table-bordered
                                        table-hover dataTables-example " id="">
                                        <thead>
                                        <tr>
                                            <th>Sr.No.</th>
                                            <th>Icons</th>
                                            <th>Plan Type</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                $planlst=$objPlan->planTable();
                                if(count($planlst)>0)
                                {
                                    $i='1';
                                    foreach ($planlst as $key => $planVal) 
                                    { 
                                ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?= $planVal['icon_class']?></td>
                                        <td><?= $planVal['planType']?></td>
                                    </tr>
                                    <?php
                                    $i++;
                                    }
                                }
                                    ?>
                                        
                                        </tbody>
                                        </table>
                                            </div>
                                        </div>
                                    </div>
                                   

                                    <div class="timeline-item">
                                        <div class="row">
                                            <div class="col-xs-3 date">
                                                <i class="fa fa-slideshare fa-lg"></i>
                                                For More
                                                <br/>
                                                <a href="merchant.php"><small>Click Here</small></a>
                                            </div>
                                            <div class="col-xs-7 content">
                                                <p class="m-b-xs"><strong>Merchant Info Update</strong></p>
                        
                            <table class="table table-striped table-bordered
                            table-hover dataTables-example " id="">
                                <thead>
                                    <tr>
                                        <th>Sr.No.</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $march=$objMerchat->marchList();
                                if(count($march)>0)
                                {
                                    $i='1';
                                    foreach ($march as $key => $marchVal) 
                                    { 
                                ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?= $marchVal['firstname']?></td>
                                        <td><?= $marchVal['email']?></td>
                                    </tr>
                                    <?php
                                    $i++;
                                    }
                                }
                                    ?>
                                </tbody>
                            </table>
                           

                                                <p><span data-diameter="40" class="updating-chart"></span></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="timeline-item">
                                        <div class="row">
                                            <div class="col-xs-3 date">
                                                <i class="fa fa-money fa-lg"></i>
                                                For More
                                                <br/>
                                                <a href="coin_manager.php"><small>Click Here</small></a>
                                            </div>
                                            <div class="col-xs-7 content">
                                                <p class="m-b-xs"><strong>Recent Available Coins</strong></p>
                                                <p>  </p>

                                    <table class="table table-striped table-bordered
                                    table-hover dataTables-example " id="">
                                    <thead>
                                        <tr>
                                            <th>Sr.No.</th>
                                            <th>Coin Name</th>
                                            <th>Abbreviation</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $coinMng=$objMerchat->coinList();
                                    if(count($coinMng)>0)
                                    {
                                        $i='1';
                                        foreach ($coinMng as $key => $coinVal) 
                                        { 
                                    ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?= $coinVal['coin_name']?></td>
                                            <td><?= $coinVal['coin_abbrv']?></td>
                                        </tr>
                                        <?php
                                        $i++;
                                        }
                                    }
                                        ?>
                                    </tbody>
                                    </table>


                                            </div>
                                        </div>
                                    </div>
                                    <div class="timeline-item">
                                        <div class="row">
                                            <div class="col-xs-3 date">
                                                <i class="fa fa-suitcase fa-lg"></i>
                                                For More
                                                <br/>
                                                <a href="credential.php"><small>Click Here</small></a>
                                            </div>
                                            <div class="col-xs-7 content">
                                                <p class="m-b-xs"><strong>Credencial Updates</strong></p>
                                                <p>  
                                                </p>
                                    <table class="table table-striped table-bordered
                                    table-hover dataTables-example " id="">
                                    <thead>
                                        <tr>
                                            <th>Sr.No.</th>
                                            <th>Host Name</th>
                                            <th>Host User</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $credlist=$objMerchat->credList();
                                    if(count($credlist)>0)
                                    {
                                        $i='1';
                                        foreach ($credlist as $key => $credVal) 
                                        {
                                            
                                    ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?=$credVal['host_name']?></td>
                                                <td><?=$credVal['host_user']?></td>
                                            </tr>
                                    <?php
                                        $i++;
                                        }
                                    }
                                    ?>
                                    </tbody>
                                    </table>


                                            </div>
                                        </div>
                                    </div>
                                    <div class="timeline-item">
                                        <div class="row">
                                            <div class="col-xs-3 date">
                                                <i class="fa fa-phone"></i>
                                                11:00 am
                                                <br/>
                                                <small class="text-navy">21 hour ago</small>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="timeline-item">
                                        <div class="row">
                                            <div class="col-xs-3 date">
                                                <i class="fa fa-user-md"></i>
                                                09:00 pm
                                                <br/>
                                                <small>21 hour ago</small>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="timeline-item">
                                        
                                    </div>
                                

                                </div>
                            </div>
                        </div>

                        </div>
                </div>

                
    <?php include('footer.php'); ?>

    <script type="text/javascript">
    function loadChart(dataVal,year)
    {
        $(".chartContainer").CanvasJSChart({
        title: {
            text: "Month Of -"+year
        },
        axisY: {
            title: "Income",
            includeZero: false
        },
        axisX: {
            interval: 1
        },
        data: [
        {
            type: "line", //try changing to column, area
            toolTipContent: "{label}: {y} Rupees",
            dataPoints:dataVal
        }
        ]
    });
    }
    $(document).ready(function(){
        loadChart(<?php print_r($objMerchat->graphData(2018)); ?>,'2018');
    });
    function loadGraph()
    {
        var year=$("#year").val();
        $.ajax({
            type:"post",
            url:"graph_data.php",
            data:"y="+year,
            dataType:"json",
            success:function(result){
                loadChart(result,year);
            }
        })
    }
    </script>
