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