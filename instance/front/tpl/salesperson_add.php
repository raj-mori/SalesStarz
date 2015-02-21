<div class="addAffiliates actionItem">
    <div class="panel panel-default">
        <div class="panel-heading">Add New Salesperson Detail</div>
        <div class="panel-body">
            <form method="post" action="" class="form-horizontal" role="form">
                <div class="form-group">
                    <label for="inputquestion" class="col-lg-2 control-label">Username</label>
                    <div class="col-lg-5">
                        <input type="text" class="form-control" name="fields[user_name]" id="username" value="<?php print $user_name; ?>" placeholder="UserName" required>
                    </div>
                </div>
                <?php if ($add_password == 1): ?>
                    <div class="form-group" id='add'>
                        <label for="inputquestion" class="col-lg-2 control-label">Password</label>
                        <div class="col-lg-5">
                            <input type="text" class="form-control" name="fields[password]" id="password" placeholder="password" >
                        </div>
                    </div>
                <?php endif; ?>
                <div class="form-group">
                    <label for="inputquestion" class="col-lg-2 control-label">First Name</label>
                    <div class="col-lg-5">
                        <input type="text" class="form-control" name="fields[first_name]" id="first_name" value="<?php print $first_name; ?>" placeholder="First Name" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputquestion" class="col-lg-2 control-label">Last Name</label>
                    <div class="col-lg-5">
                        <input type="text" class="form-control" name="fields[last_name]" id="last_name" value="<?php print $last_name; ?>" placeholder="Last Name" required>
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

                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                        <input type="hidden" name="fields[salesperson_id]" id="user_id" value="<?php print $id_val; ?>">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>

        </div>
    </div>

</div>