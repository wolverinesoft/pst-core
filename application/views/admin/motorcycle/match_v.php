<?php
$CI =& get_instance();
$CI->load->model("CRS_m");

?>
<!-- Gritter -->
<link rel="stylesheet"
      href="/assets/Gritter/css/jquery.gritter.css" />
<!--<link rel="stylesheet" href="/assets/newjs/jquery-ui.structure.min.css" />-->
<link rel="stylesheet" href="/assets/newjs/jquery-ui.min.css" />

<script type="text/javascript"
        src="/assets/Gritter/js/jquery.gritter.min.js"></script>

<script type="application/javascript" src="/assets/underscore/underscore-min.js" ></script>
<script type="application/javascript" src="/assets/backbone/backbone-min.js" ></script>
<script type="application/javascript" src="/assets/dropzone/dropzone.js" ></script>
<script type="application/javascript" src="/assets/newjs/jquery-ui.min.js" ></script>
<script type="text/template" id="AvailableTrimView">
</script>
<div class="content_wrap">
    <div class="content">

<?php
$CI =& get_instance();
echo $CI->load->view("admin/motorcycle/moto_head", array(
    "new" => @$new,
    "product" => @$product,
    "success" => @$success,
    "assets" => $assets,
    "id" => @$id,
    "active" => "match",
    "descriptor" => "Match",
    "source" => @$product["source"],
    "stock_status" => @$product["stock_status"]
), true);

?>
<div class="tab_content">
    <?php if ($product["crs_trim_id"] > 0): ?>
    <div class="existing_trim_holder">
        This unit is already matched<?php
        $trim = $CI->CRS_m->getTrim($product["crs_trim_id"]);
        if (count($trim) > 0) {
            print "<strong>" . $trim["year"] . " " . $trim["make"] . " " . $trim["model"] . " " . $trim["trim"] . " (MSRP $" . $trim["msrp"] . ")</strong>.";
        } else {
            print ".";
        }
        ?>
        <a href="<?php echo site_url('admin/motorcycle_remove_trim/' . $id); ?>" onClick="return confirm('Are you sure?'); "><i class='fa fa-times'></i> Remove Match</a>
    </div>
    <?php endif; ?>

    <div style="display: table">
        <div style="display: table-row;">
            <div style="display: table-cell; width: 50%; border: 1px solid black; padding: 6px">
                <strong>Unit Details</strong>

                <ul>
                    <li><em>Make:</em> <?php echo $product["make"]; ?></li>
                    <li><em>Model:</em> <?php echo $product["model"]; ?></li>
                    <li><em>Year:</em> <?php echo $product["year"]; ?></li>
                    <?php if ($product["codename"] != ""): ?>
                    <li><em>Lightspeed Codename:</em> <?php echo $product["codename"]; ?></li>
                    <?php endif; ?>
                </ul>

            </div>
            <div style="display: table-cell; width: 50%; border: 1px solid black; padding: 6px">
                <strong>Match Search</strong>

            </div>
        </div>
    </div>



</div>


<script type="application/javascript">
$(document).on("ready", function() {

    <?php if ($product["crs_trim_id"] > 0): ?>

    <?php endif; ?>


});


</script>

    </div>
</div>
