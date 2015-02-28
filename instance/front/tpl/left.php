<nav class="navbar navbar-default navbar-fixed-top navbar-inverse" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php l('home') ?>" style="color:#009999">Sales Starz</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">

            <?php if ($_SESSION['user']['user_type'] == "Master Admin") { ?>
                                <!--<li><a href="<?php l('admin_') ?>">Admin</a></li>-->
                <li><a href="<?php l('report') ?>">Report</a></li>
                <!--<li><a href="<?php l('send_text') ?>">Send Text</a></li>-->
                <!--<li><a href="<?php l('chart') ?>">Chart</a></li>-->
                <li><a href="<?php l('salesperson/list') ?>">Sales Person</a></li>
                <li><a href="<?php l('customer/list') ?>">Customer</a></li>
                <li><a href="<?php l('template') ?>">Template</a></li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Setting <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php l('stripe_api') ?>">Stripe Api Key</a></li>
                        <li><a href="<?php l('click_tell_api') ?>">Click A Tell Api key </a></li>
                        <li><a href="<?php l('agree_terms') ?>">Agree To Terms</a></li>

                    </ul></li>


            <?php } else {
                ?> <li><a href="<?php l('customer/list') ?>">Customer</a></li>
            <?php } ?>
        </ul>
        <?php $admin = ($_SESSION['user']['user_name']); ?>
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown hidden-xs">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php
                    if ($admin != ''): echo $_SESSION['user']['user_type'];
                    endif;
                    ?>&nbsp;<i class="fa fa-user"uer_type >&nbsp;</i><b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="<?php print _U ?>?logout=1"><i class="glyphicon glyphicon-off"></i> Logout</a></li>
                </ul>
            </li>
        </ul>
    </div><!-- /.navbar-collapse -->
</nav>
