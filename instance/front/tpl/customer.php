<div style="" class="moduleActionBar">
    <div>
        <nav class="navbar navbar-default " role="navigation">

            <div class="collapse navbar-collapse navbar-ex1-collapse ">
                <ul class="nav navbar-nav">
                    <li class="<?php print $activeMenuList ?>"><a href="<?php print _U ?>customer/list"><i class="glyphicon glyphicon-th-list"></i>&nbsp;List of Customer</a></li>
                    <?php // if ($_SESSION['user']['user_type'] != "Master Admin") { ?>
                    <li class="<?php print $activeMenuAdd ?>" ><a href="<?php print _U ?>customer/add"  ><i class="glyphicon glyphicon-<?php print $addIcon ?>"></i>&nbsp;<?php print $addLabel ?></a></li>
                    <?php // } ?>


                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>

    </div>
</div>

<div class="modal fade" id="callModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body" id="div1">
                <div class="alert alert-success" id="success" >
                </div>


                </br>
                <div style="text-align:right;">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>


                </div>
            </div>
            <div class="modal-body" id="div2">
                <div class="alert alert-danger" id="error" >
                </div>


                </br>
                <div style="text-align:right;">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>


                </div>
            </div>
        </div>
    </div>
</div>
<?php include "ckEditorLib.php";
?>

<div class="modal fade" id="sendmail"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    <div class="modal-dialog" style="width:700px;">
        <div class="modal-content" >
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Send EMail</h4>
            </div>
            <div class="modal-body" >
                <div class="form-group">
                    <label for="inputquestion" class="col-lg-3 control-label">Mail Subject</label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" name="fields[mail_subject]" id="mail_subject" value="<?php print $mail_subject; ?>" placeholder="Mail Subject" required>
                    </div>
                    <div class="clearfix">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputquestion" class="col-lg-3 control-label">Mail Content</label>
                    <div class="col-lg-8">

                        <textarea type="text" class="form-control ckeditor"  name="fields[mail_content]" id="mail_content" placeholder="Mail Content"  required>

                            Hi {firstname} {lastname},,<br>
                            Thank you for buying<br>
                            Please pay here {payment_link}<br>
                            <?php print $mail_content; ?></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-offset-3 col-lg-10">
                        <input type="hidden" id="cust_id" name="cust_id" />
                        <button type="button" class="btn btn-primary" onclick="send()">Save</button>
                    </div>
                </div>
            </div>

            <div class="clearfix">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="showText"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width:700px;">
        <div class="modal-content" >
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Send Text</h4>
            </div>
            <div class="modal-body" >
                <div class="form-group">
                    <label  class="col-lg-3 control-label">Enter Your Number </label>
                    <div class="col-lg-2">
                        <input type="text" class="form-control" name="country_code" id="country_code"  placeholder="Code" required>

                    </div>
                    <div class="col-lg-3">
                        <input type="text" class="form-control" name="number" id="number"  placeholder="Number" required>

                    </div>
                    <div class="clearfix">
                    </div>
                </div>
                <div class="form-group">
                    <label  class="col-lg-3 control-label">Message Text</label>
                    <div class="col-lg-5">
                        <input type="text" class="form-control" name="text" id="text" required/>
                    </div>
                    <div class="clearfix">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-offset-3 col-lg-10">
                        <input type="hidden" id="cust_id" name="cust_id" />
                        <button type="button" class="btn btn-primary" onclick="send()">Save</button>
                    </div>
                </div>
            </div>

            <div class="clearfix">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php include_once('message.php') ?>

<?php include $subTpl; ?>