<?php
$lastYearOrder = $totalOrders[(date('Y') - 1)] > 0 ? $totalOrders[(date('Y') - 1)] : 1;
$orderPer = ($totalOrders[date('Y')] * 100) / $lastYearOrder;

$lastYearRevenue = $totalRevenue[(date('Y') - 1)] > 0 ? $totalRevenue[(date('Y') - 1)] : 1;
$revenuePer = ($totalRevenue[date('Y')] * 100) / $lastYearRevenue;
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<div class="content_wrap">
    <div class="content">

        <h1><i class="fa fa-dashboard"></i>&nbsp;Dashboard</h1>
        <h3>Welcome to your admin panel</h3>
        <br>
        <?php if($dashboard || $_SESSION['userRecord']['admin']) { ?>

        <div class="dash-sec-1">
            <div class="container" style="min-height: 220px;">
                <div class="col-total">
                    <div class="total-1">
                        <p class="main">TOTAL ORDERS</P>
                        <p class="grow"><i class="fa fa-caret-up" aria-hidden="true"></i><?php echo $orderPer . '%'; ?></P>
                    </div>
                    <div class="total-2">
                        <p class="main1"><i class="fa fa-shopping-cart" aria-hidden="true"></i></P>
                        <p class="grow1"><?php echo $totalOrders[date('Y')]; ?></P>
                    </div>
                    <div class="total-3">
                        <p class="main2"><a href="<?php echo site_url('admin/orders'); ?>" style="color:white;">View More...</a></P>
                    </div>

                </div>
                <div class="col-total">
                    <div class="total-1">
                        <p class="main">TOTAL SALES</P>
                        <p class="grow"></P>
                    </div>
                    <div class="total-2">
                        <p class="main1"><i class="fa fa-credit-card" aria-hidden="true"></i></P>
                        <p class="grow1"><?php echo $totalRevenue[date('Y')]; ?></P>
                    </div>
                    <div class="total-3">
                        <p class="main2"><a href="<?php echo site_url('admin/orders'); ?>" style="color:white;">View More...</a></P>
                    </div>
                </div>
                <div class="col-total">
                    <div class="total-1">
                        <p class="main">TOTAL CUSTOMERS</P>
                        <p class="grow"></P>
                    </div>
                    <div class="total-2">
                        <p class="main1"><i class="fa fa-user" aria-hidden="true"></i></P>
                        <p class="grow1"><?php echo $totalCustomers; ?></P>
                    </div>
                    <div class="total-3">
                        <p class="main2"><a href="<?php echo site_url('admin/customers'); ?>" style="color:white;">View More...</a></P>
                    </div>
                </div>
                <div class="col-total">
                    <div class="total-1">
                        <p class="main">PENDING REVIEWS</P>
                        <p class="grow"></P>
                    </div>
                    <div class="total-2">
                        <p class="main1"><i class="fa fa-comments" aria-hidden="true"></i></P>
                        <p class="grow1"><?php echo $totalReviews; ?></P>
                    </div>
                    <div class="total-3">
                        <p class="main2"><a href="<?php echo site_url('admin_content/reviews'); ?>" style="color:white;">View More...</a></P>
                    </div>
                </div>
            </div>
        </div>

        <div class="dash-sec-1">
            <div class="container">
                <div class="panel-heading">
                    <div class="dropdown pull-right">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                            <i class="fa fa-calendar"></i> <i class="caret"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="chrt" data-cstm="daily"><a href="javascript:void(0);">Today</a></li>
                            <li class="chrt" data-cstm="weekly"><a href="javascript:void(0);">Week</a></li>
                            <li class="chrt active" data-cstm="monthly"><a href="javascript:void(0);">Month</a></li>
                            <li class="chrt" data-cstm="yearly"><a href="javascript:void(0);">Year</a></li>
                        </ul>
                    </div>
                    <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Sales Analytics</h3>
                </div>
                <div id="flot-placeholder" style="width:100%;height:500px;margin:0 auto" class="monthly chrt1"></div>
                <div id="flot-placeholder1" style="width:100%;height:500px;margin:0 auto;" class="daily chrt1"></div>
                <div id="flot-placeholder2" style="width:100%;height:500px;margin:0 auto;" class="weekly chrt1"></div>
                <div id="flot-placeholder3" style="width:100%;height:500px;margin:0 auto;" class="yearly chrt1"></div>
            </div>
        </div>

        <!--  REVIEW BLOCK -->
        <div class="dash-sec-1">
            <div class="container">
            <!--<h1 style="text-align:left"><a href="<?php echo base_url() . 'part'; ?>">Search</a></h1>
            <div class="hidden_table">
                <table width="100%" cellpadding="6">
                    <tr>
                        <td><b>Search Term</b></td><td><b>Count</b></td><td><b>Sales</b></td>
                    </tr>
                </table>
            </div>-->
                <div class="table-section">
                    <div class="sarni">
                        <p class="table-head"><i class="fa fa-shopping-cart" aria-hidden="true"></i>Latest Orders</p>
                        <table>
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Customer</th>
                                    <th>Status</th>
                                    <th>Order Date</th>
                                    <th>Total</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($orders as $order) { ?>
                                    <tr>
                                        <td><?php echo $order['order_id']; ?></td>
                                        <td><?php echo $order['first_name'] . ' ' . $order['last_name']; ?></td>
                                        <td><?php echo $order['status']; ?></td>
                                        <td><?php echo date('m/d/Y', $order['order_date']); ?></td>
                                        <td><?php echo $order['sales_price']; ?></td>
                                        <td><a class="btn btn-info" href="<?php echo site_url('admin/order_edit/' . $order['order_id']); ?>"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--  END REVIEW BLOCK -->
	<?php } ?>

        <!--  SALES BLOCK -->

        <!--  END SALES BLOCK -->

    </div>

</div>
<style>
    .btn-info {
        color: #ffffff;
        background-color: #5bc0de;
        border-color: #39b3d7;
    }
    a:link {
        color: #ffffff;
        text-decoration: none;
    }
    .btn {
        display: inline-block;
        margin-bottom: 0;
        font-weight: normal;
        text-align: center;
        vertical-align: middle;
        touch-action: manipulation;
        cursor: pointer;
        background-image: none;
        border: 1px solid transparent;
        white-space: nowrap;
        padding: 8px 13px;
        font-size: 12px;
        line-height: 1.42857143;
        border-radius: 3px;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }
</style>

<script>
    //******* 2012 Average Temperature - BAR CHART
    var dt = <?php echo json_encode($str); ?>;
    var dys = <?php echo json_encode($days); ?>;
    
    var dt1 = <?php echo json_encode($str1); ?>;
    var dys1 = <?php echo json_encode($days1); ?>;
    
    var dt2 = <?php echo json_encode($str2); ?>;
    var dys2 = <?php echo json_encode($days2); ?>;
    
    var dt3 = <?php echo json_encode($str3); ?>;
    var dys3 = <?php echo json_encode($days3); ?>;
    
    var data = new Array();
    var i = 0;
    jQuery.each( dt, function( key, value ) {
        data.push([i, Math.round(value)]);
        i++;
    });
    
    var data1 = new Array();
    var i = 0;
    jQuery.each( dt1, function( key, value ) {
        data1.push([i, Math.round(value)]);
        i++;
    });
    
    var data2 = new Array();
    var i = 0;
    jQuery.each( dt2, function( key, value ) {
        data2.push([i, Math.round(value)]);
        i++;
    });
    
    var data3 = new Array();
    var i = 0;
    jQuery.each( dt3, function( key, value ) {
        data3.push([i, Math.round(value)]);
        i++;
    });
    
    var dataset = [
        { label: "Orders", data: data, color: "#85A7FF" },
        { label: "Customers", data: data, color: "#5482FF" }
    ];
    
    var dataset1 = [
        { label: "Orders", data: data1, color: "#85A7FF" },
        { label: "Customers", data: data1, color: "#5482FF" }
    ];
    
    var dataset2 = [
        { label: "Orders", data: data2, color: "#85A7FF" },
        { label: "Customers", data: data2, color: "#5482FF" }
    ];
    
    var dataset3 = [
        { label: "Orders", data: data3, color: "#85A7FF" },
        { label: "Customers", data: data3, color: "#5482FF" }
    ];
    
    var ticks = new Array();
    var ticks1 = new Array();
    var ticks2 = new Array();
    var ticks3 = new Array();
    
    var i = 0;
    jQuery.each( dys, function( key, value ) {
        ticks.push([i, Math.round(value)]);
        i++;
    });

    var i = 0;
    jQuery.each( dys1, function( key, value ) {
        ticks1.push([i, Math.round(value)]);
        i++;
    });
    
    var i = 0;
    jQuery.each( dys2, function( key, value ) {
        ticks2.push([i, value]);
        i++;
    });
    
    var i = 0;
    jQuery.each( dys3, function( key, value ) {
        ticks3.push([i, value]);
        i++;
    });
    
    var options = {
        series: {
            bars: {
                show: true
            }
        },
        bars: {
            align: "center",
            barWidth: 0.5
        },
        xaxis: {
            axisLabel: "World Cities",
            axisLabelUseCanvas: true,
            axisLabelFontSizePixels: 12,
            axisLabelFontFamily: 'Verdana, Arial',
            axisLabelPadding: 10,
            ticks: ticks
        },
        yaxis: {
            axisLabel: "Average Temperature",
            axisLabelUseCanvas: true,
            axisLabelFontSizePixels: 12,
            axisLabelFontFamily: 'Verdana, Arial',
            axisLabelPadding: 3,
            tickFormatter: function (v, axis) {
                return v;
            }
        },
        legend: {
            noColumns: 0,
            labelBoxBorderColor: "#000000",
            position: "nw"
        },
        grid: {
            hoverable: true,
            borderWidth: 2,        
            backgroundColor: { colors: ["#ffffff", "#EDF5FF"] }
        }
    };

    var options1 = {
        series: {
            bars: {
                show: true
            }
        },
        bars: {
            align: "center",
            barWidth: 0.5
        },
        xaxis: {
            axisLabel: "World Cities",
            axisLabelUseCanvas: true,
            axisLabelFontSizePixels: 12,
            axisLabelFontFamily: 'Verdana, Arial',
            axisLabelPadding: 10,
            ticks: ticks1
        },
        yaxis: {
            axisLabel: "Average Temperature",
            axisLabelUseCanvas: true,
            axisLabelFontSizePixels: 12,
            axisLabelFontFamily: 'Verdana, Arial',
            axisLabelPadding: 3,
            tickFormatter: function (v, axis) {
                return v.toFixed(2); // v;
            }
        },
        legend: {
            noColumns: 0,
            labelBoxBorderColor: "#000000",
            position: "nw"
        },
        grid: {
            hoverable: true,
            borderWidth: 2,        
            backgroundColor: { colors: ["#ffffff", "#EDF5FF"] }
        }
    };
    
    var options2 = {
        series: {
            bars: {
                show: true
            }
        },
        bars: {
            align: "center",
            barWidth: 0.5
        },
        xaxis: {
            axisLabel: "World Cities",
            axisLabelUseCanvas: true,
            axisLabelFontSizePixels: 12,
            axisLabelFontFamily: 'Verdana, Arial',
            axisLabelPadding: 10,
            ticks: ticks2
        },
        yaxis: {
            axisLabel: "Average Temperature",
            axisLabelUseCanvas: true,
            axisLabelFontSizePixels: 12,
            axisLabelFontFamily: 'Verdana, Arial',
            axisLabelPadding: 3,
            tickFormatter: function (v, axis) {
                return v.toFixed(2); // v;
            }
        },
        legend: {
            noColumns: 0,
            labelBoxBorderColor: "#000000",
            position: "nw"
        },
        grid: {
            hoverable: true,
            borderWidth: 2,        
            backgroundColor: { colors: ["#ffffff", "#EDF5FF"] }
        }
    };
    
    var options3 = {
        series: {
            bars: {
                show: true,
                fill: true
            }
        },
        bars: {
            align: "center",
            barWidth: 0.5
        },
        xaxis: {
            axisLabel: "World Cities",
            axisLabelUseCanvas: true,
            axisLabelFontSizePixels: 12,
            axisLabelFontFamily: 'Verdana, Arial',
            axisLabelPadding: 10,
            ticks: ticks3
        },
        yaxis: {
            axisLabel: "Average Temperature",
            axisLabelUseCanvas: true,
            axisLabelFontSizePixels: 12,
            axisLabelFontFamily: 'Verdana, Arial',
            axisLabelPadding: 3,
            tickFormatter: function (v, axis) {
                return v.toFixed(2); // v;
            }
        },
        legend: {
            noColumns: 0,
            labelBoxBorderColor: "#000000",
            position: "nw"
        },
        grid: {
            hoverable: true,
            borderWidth: 2,        
            backgroundColor: { colors: ["#ffffff", "#EDF5FF"] }
        }
    };
    
    $(document).ready(function () {
        $.plot($("#flot-placeholder"), dataset, options);
        $("#flot-placeholder").UseTooltip();
        
        $.plot($("#flot-placeholder1"), dataset1, options1);
        $("#flot-placeholder1").UseTooltip();
        
        $.plot($("#flot-placeholder2"), dataset2, options2);
        $("#flot-placeholder2").UseTooltip();

        $.plot($("#flot-placeholder3"), dataset3, options3);
        $("#flot-placeholder3").UseTooltip();
    });

    function gd(year, month, day) {
        return new Date(year, month, day).getTime();
    }

    var previousPoint = null, previousLabel = null;

    $.fn.UseTooltip = function () {
        $(this).bind("plothover", function (event, pos, item) {
            if (item) {
                if ((previousLabel != item.series.label) || (previousPoint != item.dataIndex)) {
                    previousPoint = item.dataIndex;
                    previousLabel = item.series.label;
                    $("#tooltip").remove();

                    var x = item.datapoint[0];
                    var y = item.datapoint[1];

                    var color = item.series.color;

                    //console.log(item.series.xaxis.ticks[x].label);                
                
                    showTooltip(item.pageX,
                    item.pageY,
                    color,
                    "<strong>" + item.series.label + "</strong><br>" + item.series.xaxis.ticks[x].label + " : <strong>" + y + "</strong>");                
                }
            } else {
                $("#tooltip").remove();
                previousPoint = null;
            }
        });
    };

    function showTooltip(x, y, color, contents) {
        $('<div id="tooltip">' + contents + '</div>').css({
            position: 'absolute',
            display: 'none',
            top: y - 40,
            left: x - 120,
            border: '2px solid ' + color,
            padding: '3px',
            'font-size': '9px',
            'border-radius': '5px',
            'background-color': '#fff',
            'font-family': 'Verdana, Arial, Helvetica, Tahoma, sans-serif',
            opacity: 0.9
        }).appendTo("body").fadeIn(200);
    }
    jQuery('.chrt').on('click', function() {
        var cstm = jQuery(this).data('cstm');
        jQuery('.chrt').removeClass('active');
        jQuery(this).addClass('active');
        jQuery('.chrt1').hide();
        jQuery('.'+cstm).show();
    });
    jQuery(document).ready(function() {
       jQuery('#flot-placeholder1').hide();
       jQuery('#flot-placeholder2').hide();
       jQuery('#flot-placeholder3').hide();
    });
</script>
<style>
    * {
        -webkit-box-sizing: inherit !important;
        -moz-box-sizing: inherit !important;
        box-sizing: inherit !important;
    }
</style>