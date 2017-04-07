<!-- MAIN CONTENT =======================================================================================-->
<div class="content_wrap">
    <div class="content">

        <h1><i class="fa fa-cube"></i>&nbsp;<?php if (@$new): ?>New<?php else: ?>Edit<?php endif; ?> Product</h1>
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
                <h1><span style="color:#090;"><i class="fa fa-check"></i></span>&nbsp;Success</h1>
                <p>Success Message!</p>
            </div>
        <?php endif; ?>
        <!-- END SUCCESS -->			

        <!-- TABS -->
        <div class="tab">
            <ul>
                <li><a href="<?php echo base_url('admin/product_edit/' . @$product['partnumber']); ?>"><i class="fa fa-bars"></i>&nbsp;General Options*</a></li>
                <li><a href="<?php echo base_url('admin/product_description/' . @$product['partnumber']); ?>"><i class="fa fa-file-text-o"></i>&nbsp;Description*</a></li>
                <li><a href="<?php echo base_url('admin/product_meta/' . @$product['partnumber']); ?>"><i class="fa fa-list-alt"></i>&nbsp;Meta Data</a></li>
                <li><a href="<?php echo base_url('admin/product_shipping/' . @$product['partnumber']); ?>"><i class="fa fa-truck"></i>&nbsp;Shipping*</a></li>
                <li><a href="<?php echo base_url('admin/product_images/' . @$product['partnumber']); ?>" class="active"><i class="fa fa-image"></i>&nbsp;Images*</a></li>
                <li><a href="<?php echo base_url('admin/product_reviews/' . @$product['part_id']); ?>"><i class="fa fa-image"></i>&nbsp;Reviews</a></li>
                <li><a href="<?php echo base_url('admin/product_video/' . @$product['part_id']); ?>"><i class="fa fa-image"></i>&nbsp;Videos</a></li>
                <li><a href="<?php echo base_url('admin/product_sizechart/' . @$product['part_id']); ?>"><i class="fa fa-image"></i>&nbsp;Size Chart</a></li>
                <div class="clear"></div>
            </ul>
        </div>
        <!-- END TABS -->

        <form class="form_standard">

            <!-- TAB CONTENT -->
            <div class="tab_content">
                <div class="hidden_table">
                    <table width="auto" cellpadding="12">
                        <tr>
                            <td valign="top" style="width:130px;"><b>Image 1:</b></td>
                            <td><img src="images/test_image.jpg" width="70"></td>
                            <td valign="top">
                                <input id="name" name="name" placeholder="Upload Image" class="text medium" /><br>
                                <input type="radio"> <b>Make Main Image:</b>
                            </td>
                        </tr>
                        <tr>
                            <td valign="top"><b>Image 2:</b></td>
                            <td><img src="images/test_image.jpg" width="70"></td>
                            <td valign="top">
                                <input id="name" name="name" placeholder="Upload Image" class="text medium" /><br>
                                <input type="radio"> <b>Make Main Image:</b>
                            </td>
                        </tr>
                        <tr>
                            <td valign="top"><b>Image 3:</b></td>
                            <td><img src="images/test_image.jpg" width="70"></td>
                            <td>
                                <input id="name" name="name" placeholder="Upload Image" class="text medium" /><br>
                                <input type="radio"> <b>Make Main Image:</b>
                            </td>
                        </tr>
                        <tr>
                            <td valign="top"><b>Image 4:</b></td>
                            <td><img src="images/test_image.jpg" width="70"></td>
                            <td valign="top">
                                <input id="name" name="name" placeholder="Upload Image" class="text medium" /><br>
                                <input type="radio"> <b>Make Main Image:</b>
                            </td>
                        </tr>
                        <tr>
                            <td valign="top"><b>Image 5:</b></td>
                            <td><img src="images/test_image.jpg" width="70"></td>
                            <td valign="top">
                                <input id="name" name="name" placeholder="Upload Image" class="text medium" /><br>
                                <input type="radio"> <b>Make Main Image:</b>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <!-- END TAB CONTENT -->
            <br>
            <!-- SUBMIT PRODUCT -->
            <button type="submit" id="button"><i class="fa fa-upload"></i>&nbsp;Submit Product</button>

            <!-- SUBMIT DISABLED -->
            <p id="button_no"><i class="fa fa-upload"></i>&nbsp;Submit Product</p>

            <!-- CANCEL BUTTON -->
            <a href="" id="button"><i class="fa fa-times"></i>&nbsp;Cancel</a>			

        </form>



    </div>
</div>
<!-- END MAIN CONTENT ==================================================================================-->
<div class="clearfooter"></div>


</div>
<!-- END WRAPPER =========================================================================================-->
