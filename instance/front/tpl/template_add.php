<?php
include "ckEditorLib.php";
$urlArgs = _cg("url_vars");
?>
<div class="addAffiliates actionItem">
    <div class="panel panel-default">
        <div class="panel-heading">Add New Template</div> 
        <div class="panel-body">
            <form method="post" action="" class="form-horizontal" role="form">

                <div class="form-group">
                    <label for="inputquestion" class="col-lg-2 control-label">Template Name</label>
                    <div class="col-lg-5">
                        <input type="text" class="form-control" name="fields[template_name]" id="template_name" value="<?php print $tmp_name; ?>" placeholder="Template Name" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputquestion" class="col-lg-2 control-label">Template Content</label>
                    <div class="col-lg-5" >

                        <textarea type="text"  class="form-control ckeditor"  name="fields[template_content]" id="template_content" placeholder="Template Content"  required>
                            <?php
                            if ($urlArgs[0] == 'add') {
                                ?>
                                                     Hi {firstname} {lastname},<br>
                                                    Thank you for buying<br>
                                                    Please pay here  <br>
                                                    {payment_link} 

            <!--<a href="<?php print _U ?>stripe_co?customer_id=<?php print base64_encode($id) ?>">Click Here</a>-->
                            <?php }
                            ?>
                          
                            <?php print $tmp_content; ?></textarea>
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                        <input type="hidden" name="fields[temp_id]" id="temp_id" value="<?php print $tmp_id; ?>">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>

        </div>
    </div>

</div>