<div class="listAffiliates actionItem">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div style="padding-top:8px"><b>List of Sales Person</b></div> 
        </div>
        <div class="panel-body">
            <?php
            $cr = 1;
            if (!empty($customer_Detail)):
                ?>
                <table class="table table-hover" id="table" >
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>UserName</th>
                            <th>First Name</th>
                            <th>Last Name </th> 
                            <th>Email</th>
                            <th>Mail Subject</th>
                            <th>Mail Content</th>
                            <th>Phone No</th>
                            <?php if ($_SESSION['user']['user_type'] == "Master Admin") { ?> <th>Salesperson</th><?php } ?>

                            <?php if ($_SESSION['user']['user_type'] != "Master Admin") { ?> <th>Action</th><?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($customer_Detail as $each_task):
                            ?>
                            <tr id="<?php print $each_task['id']; ?>">
                                <td><?php print $cr; ?></td>
                                <td><?php print $each_task['user_name']; ?> </td>
                                <td><?php print $each_task['first_name']; ?> </td>
                                <td><?php print $each_task['last_name']; ?> </td>
                                <td><?php print $each_task['email']; ?> </td>
                                <td><?php print $each_task['mail_subject']; ?> </td>
                                <td><?php print $each_task['mail_content']; ?> </td>
                                <td><?php print $each_task['phone_no']; ?> </td>
                                <?php if ($_SESSION['user']['user_type'] == "Master Admin") { ?>
                                    <td><?php print Customer::GetSalespersonName($each_task['salesperson']); ?></td>
                                <?php } ?>
                                <?php if ($_SESSION['user']['user_type'] != "Master Admin") { ?>
                                    <td>
                                        <a href="<?php print _U ?>customer/edit/<?php print $each_task['id']; ?>"><i class="glyphicon glyphicon-edit" title="Edit"></i></a>
                                        <a href="javascript:void(0);" onclick="return DeleteUser('customer/delete/<?php print $each_task['id']; ?>')"><i class="glyphicon glyphicon-trash" title="Delete"></i></a>
                                        <span class="label label-success" style="cursor:pointer" onclick="sendMail('<?php print $each_task['id']; ?>')">Send mail</span>

                                    </td>
                                <?php } ?>

                            </tr>
                            <?php $cr++; ?>    
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <div>No  Sales Person
                    Available</div>
            <?php endif; ?>
        </div>
    </div>
</div>

