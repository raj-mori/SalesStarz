<div class="listAffiliates actionItem">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div style="padding-top:8px"><b>List of Template</b></div> 
        </div>
        <div class="panel-body">
            <?php
            $cr = 1;
            if (!empty($template)):
                ?>
                <table class="table table-hover" id="table" >
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Template Name</th>
                            <th>Template Content </th> 
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($template as $each_temp):
                            ?>
                            <tr id="<?php print $each_temp['id']; ?>">
                                <td><?php print $cr; ?></td>
                                <td><?php print $each_temp['tmp_name']; ?> </td>
                                <td><?php print $each_temp['tmp_content']; ?> </td>


                                <td>
                                    <a href="<?php print _U ?>template/edit/<?php print $each_temp['id']; ?>"><i class="glyphicon glyphicon-edit" title="Edit"></i></a>
                                    <a href="javascript:void(0);" onclick="return DeleteTemp('template/delete/<?php print $each_temp['id']; ?>')"><i class="glyphicon glyphicon-trash" title="Delete"></i></a>

                                </td>


                            </tr>
                            <?php $cr++; ?>    
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <div>No  Template  Available</div>
            <?php endif; ?>
        </div>
    </div>
</div>

