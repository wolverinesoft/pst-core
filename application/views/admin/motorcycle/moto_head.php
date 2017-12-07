<?php
/**
 * Created by PhpStorm.
 * User: jonathan
 * Date: 12/7/17
 * Time: 9:57 AM
 *
 * I should have spelled it with an umlaut!
 *
 */

?>


<h1><i class="fa fa-motorcycle"></i>&nbsp;<?php if (@$new): ?>Add Unit<?php else: ?>Edit <?php echo $product["title"]; ?> - <?php echo $descriptor; ?><?php endif; ?></h1>
<p><b>Please fill out all fields within required tabs with an *</b></p>
<br>

<!-- ERROR -->
<?php if (validation_errors()): ?>
    <div class="error">
        <h1><span style="color:#C90;"><i class="fa fa-warning"></i></span>&nbsp;Error</h1>
        <p><?php echo validation_errors(); ?></p>
    </div>
<?php endif; ?>
<!-- END ERROR -->

<!-- SUCCESS -->
<?php if (@$success): ?>
    <div class="success">
        <img src="<?php echo $assets; ?>/images/success.png" style="float:left;margin-right:10px;">
        <h1>Success</h1>
        <div class="clear"></div>
        <p>
            Your changes have been made.
        </p>
        <div class="clear"></div>
    </div>
<?php endif; ?>
<!-- END SUCCESS -->


<!-- TABS -->
<div class="tab">
    <ul>
        <li><a href="<?php echo base_url('admin/motorcycle_edit/' . $id); ?>" <?php if ($active == "edit"): ?>class="active"<?php endif; ?>><i class="fa fa-bars"></i>&nbsp;General Options*</a></li>
        <li><a href="<?php echo base_url('admin/motorcycle_description/' . $id); ?>" <?php if ($active == "description"): ?>class="active"<?php endif; ?>><i class="fa fa-file-text-o"></i>&nbsp;Description*</a></li>
        <li><a href="<?php echo base_url('admin/motorcycle_specs/' . $id); ?>" <?php if ($active == "specs"): ?>class="active"<?php endif; ?>><i class="fa fa-file-list-ul"></i>&nbsp;Specifications*</a></li>
        <li><a href="<?php echo base_url('admin/motorcycle_images/' . $id); ?>" <?php if ($active == "images"): ?>class="active"<?php endif; ?>><i class="fa fa-image"></i>&nbsp;Images*</a></li>
        <li><a href="<?php echo base_url('admin/motorcycle_video/' . $id); ?>" <?php if ($active == "video"): ?>class="active"<?php endif; ?>><i class="fa fa-image"></i>&nbsp;Videos</a></li>
        <div class="clear"></div>
    </ul>
</div>
