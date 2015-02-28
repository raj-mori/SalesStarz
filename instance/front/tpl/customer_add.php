<?php
include "ckEditorLib.php";
$urlArgs = _cg("url_vars");
?>
<div class="addAffiliates actionItem">
    <div class="panel panel-default">
        <div class="panel-heading">Add New Customer Detail</div> 
        <div class="panel-body">
            <form method="post" action="" class="form-horizontal" role="form">
                <!--                <div class="form-group">
                                    <label for="inputquestion" class="col-lg-2 control-label">Username</label>
                                    <div class="col-lg-3">
                                        <input type="text" class="form-control" name="fields[user_name]" id="username" value="<?php print $user_name; ?>" placeholder="UserName" required>
                                    </div>
                                </div>-->

                <div class="form-group">
                    <label for="inputquestion" class="col-lg-2 control-label">First Name</label>
                    <div class="col-lg-3">
                        <input type="text" class="form-control" name="fields[first_name]" id="First Name" value="<?php print $first_name; ?>" placeholder="First Name" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputquestion" class="col-lg-2 control-label">Last Name</label>
                    <div class="col-lg-3">
                        <input type="text" class="form-control" name="fields[last_name]" id="Last Name " value="<?php print $last_name; ?>" placeholder="Last Name" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputquestion" class="col-lg-2 control-label">Email</label>
                    <div class="col-lg-3">
                        <input type="email" class="form-control" name="fields[email]" id="email" value="<?php print $email; ?>" placeholder="Email" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputquestion" class="col-lg-2 control-label">Phone No</label>
                    <div class="col-lg-3">
                        <input type="number" class="form-control" name="fields[phone_no]" id="phone" value="<?php print $phone; ?>" placeholder="Phone No" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputquestion" class="col-lg-2 control-label">Template</label>
                    <div class="col-lg-3">
                        <select class="form-control"  name="fields[template]" id="template">
                            <option value="">Select Template</option>
                            <?php
                            $temp = q("Select * from template");
                            foreach ($temp as $each_temp) {
                                ?>
                                <option value="<?php print $each_temp['tmp_name'].'@'. $each_temp['tmp_content']?>"><?php print $each_temp['tmp_name'] ?> </option>

                                <?php
                            }
                            ?>


                        </select>
                    </div>
                </div>

                <!--                <div class="form-group">
                                    <label for="inputquestion" class="col-lg-2 control-label">Mail Subject</label>
                                    <div class="col-lg-3">
                                        <input type="text" class="form-control" name="fields[mail_subject]" id="mail_subject" value="<?php print $mail_subject; ?>" placeholder="Mail Subject" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputquestion" class="col-lg-2 control-label">Mail Content</label>
                                    <div class="col-lg-3" >
                
                                        <textarea type="text" class="form-control ckeditor"  name="fields[mail_content]" id="mail_content" placeholder="Mail Content"  required>
                <?php
                if ($urlArgs[0] == 'add') {
                    ?>
                                                                             Hi {firstname} {lastname},<br>
                                                                            Thank you for buying<br>
                                                                            Please pay here <br>
                <?php }
                ?>
                                          
                <?php print $mail_content; ?></textarea>
                                    </div>
                                </div>-->

                <div class="form-group">
                    <label for="inputquestion" class="col-lg-2 control-label">Credit Card No.</label>
                    <div class="col-lg-3">
                        <input type="text" class="form-control" name="fields[credit_card]" id="Last Name " value="<?php print $credit_card; ?>" placeholder="Credit Card No." required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                        <input type="hidden" name="fields[customer_id]" id="user_id" value="<?php print $id_val; ?>">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>

        </div>
    </div>

</div>