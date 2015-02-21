<div class="addAffiliates actionItem">
    <div class="panel panel-default">
        <div class="panel-heading">Add New Customer Detail</div> 
        <div class="panel-body">
            <form method="post" action="" class="form-horizontal" role="form">
                <div class="form-group">
                    <label for="inputquestion" class="col-lg-2 control-label">Username</label>
                    <div class="col-lg-5">
                        <input type="text" class="form-control" name="fields[user_name]" id="username" value="<?php print $user_name; ?>" placeholder="UserName" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputquestion" class="col-lg-2 control-label">First Name</label>
                    <div class="col-lg-5">
                        <input type="text" class="form-control" name="fields[first_name]" id="First Name" value="<?php print $first_name; ?>" placeholder="First Name" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputquestion" class="col-lg-2 control-label">Last Name</label>
                    <div class="col-lg-5">
                        <input type="text" class="form-control" name="fields[last_name]" id="Last Name " value="<?php print $last_name; ?>" placeholder="Last Name" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputquestion" class="col-lg-2 control-label">Email</label>
                    <div class="col-lg-5">
                        <input type="text" class="form-control" name="fields[email]" id="email" value="<?php print $email; ?>" placeholder="Email" required>
                    </div>
                </div>


                <div class="form-group">
                    <label for="inputquestion" class="col-lg-2 control-label">Phone No</label>
                    <div class="col-lg-5">
                        <input type="text" class="form-control" name="fields[phone_no]" id="phone" value="<?php print $phone; ?>" placeholder="Phone No" required>
                    </div>
                </div>
<!--                <div class="form-group">
                    <label for="inputquestion" class="col-lg-2 control-label">Credit Card No.</label>
                    <div class="col-lg-5">
                        <input type="text" class="form-control" name="fields[credit_card]" id="Last Name " value="<?php print $credit_card; ?>" placeholder="Credit Card No." required>
                    </div>
                </div>
                <div class="form-group">-->
                    <div class="col-lg-offset-2 col-lg-10">
                        <input type="hidden" name="fields[customer_id]" id="user_id" value="<?php print $id_val; ?>">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>

        </div>
    </div>

</div>