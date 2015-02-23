<div class="listAffiliates actionItem">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div style="padding-top:8px"><b>List of Sales Person</b></div> 
        </div>
        <div class="panel-body">
            <?php
            $cr = 1;

            if (!empty($salesperson_Detail)):
                ?>
                <table class="table table-hover" id="table" >
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>UserName</th>
                            <th>First Name</th>
                            <th>Last Name </th> 
                            <th>email</th>
                            <th>Phone No</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($salesperson_Detail as $each_task):
                            ?>
                            <tr id="<?php print $each_task['id']; ?>">

                                <td><?php print $cr; ?></td>
                                <td><?php print $each_task['user_name']; ?> </td>
                                <td><?php print $each_task['first_name']; ?> </td>
                                <td><?php print $each_task['last_name']; ?> </td>
                                <td><?php print $each_task['email']; ?> </td>
                                <td><?php print $each_task['phone_no']; ?> </td>
                                <td>

                                    <a href="<?php print _U ?>salesperson/edit/<?php print $each_task['id']; ?>"><i class="glyphicon glyphicon-edit" title="Edit"></i></a>
                                    <a href="javascript:void(0);" onclick="return DeleteUser('salesperson/delete/<?php print $each_task['id']; ?>')"><i class="glyphicon glyphicon-trash" title="Delete"></i></a>
                                    <a href="<?php print _U ?>customer/list/<?php print $each_task['id']; ?>">
                                                                            <span class="label label-info" style="cursor:pointer">Edit Customer</span>
</a>

                                </td>
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

