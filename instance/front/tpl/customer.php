<div style="" class="moduleActionBar">
    <div>
        <nav class="navbar navbar-default " role="navigation">

            <div class="collapse navbar-collapse navbar-ex1-collapse ">
                <ul class="nav navbar-nav">
                    <li class="<?php print $activeMenuList ?>"><a href="<?php print _U ?>customer/list"><i class="glyphicon glyphicon-th-list"></i>&nbsp;List of Customer</a></li>
                   <?php if ($_SESSION['user']['user_type']!="Master Admin") { ?>
                         <li class="<?php print $activeMenuAdd ?>" ><a href="<?php print _U ?>customer/add"  ><i class="glyphicon glyphicon-<?php print $addIcon ?>"></i>&nbsp;<?php print $addLabel ?></a></li>
                   <?php }?>
                   
		    
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
<?php include_once('message.php') ?>

<?php include $subTpl; ?>