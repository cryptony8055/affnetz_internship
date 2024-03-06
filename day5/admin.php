<?php
include('sidebar.php');

include('database.php');

echo $_GET['page_no'];
//$qry = "SELECT * FROM users WHERE roles = 'user' AND is_delete = 0";
$qry = "SELECT users.*, count(family_info.id) as family_cnt FROM users LEFT JOIN family_info ON users.id = family_info.user_id WHERE users.roles = 'user' AND users.is_delete = 0 GROUP BY
users.id";

$result = $conn->query($qry);

$data = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>
<style>
    body {
    color: #566787;
    background: #f5f5f5;
    font-family: 'Roboto', sans-serif;
    }
    .table-responsive {
    margin: 30px 0;
    }
    .table-wrapper {
    min-width: 1000px;
    background: #fff;
    padding: 20px;
    box-shadow: 0 1px 1px rgba(0,0,0,.05);
    }
    .table-title {
    font-size: 15px;
    padding-bottom: 10px;
    margin: 0 0 10px;
    min-height: 45px;
    }
    .table-title h2 {
    margin: 5px 0 0;
    font-size: 24px;
    }
    .table-title select {
    border-color: #ddd;
    border-width: 0 0 1px 0;
    padding: 3px 10px 3px 5px;
    margin: 0 5px;
    }
    .table-title .show-entries {
    margin-top: 7px;
    }
    table.table tr th, table.table tr td {
    border-color: #e9e9e9;
    }
    table.table th i {
    font-size: 13px;
    margin: 0 5px;
    cursor: pointer;
    }
    table.table td:last-child {
    width: 130px;
    }
    table.table td a {
    color: #a0a5b1;
    display: inline-block;
    margin: 0 5px;
    }
    table.table td a.view {
    color: #03A9F4;
    }
    table.table td a.edit {
    color: #FFC107;
    }
    table.table td a.delete {
    color: #E34724;
    }
    table.table td a.delete {
    color: #E34724;
    }
    table.table td i {
    font-size: 19px;
    }    
</style>
<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">			
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Family </th>
                        <th>Added On</th>
                        <th>Address</th>
                        <th>Actions</th>
                        <th>status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($data as $key => $value){
                    ?>
                    <tr>
                        <td><?= $key + 1 ?></td>
                        <td><?= $value['display_name'] ?></td>
                        <td><?= $value['email'] ?></td>
                        <td><a href="<?= 'family_info.php?id='.$value['id'] ?>"><?= $value['family_cnt'] ?></a></td>
                        <td><?= date('d-M-Y', strtotime($value['create_time'])) ?></td>
                        <td><a href="#" class="view" title="View" data-toggle="tooltip" onclick="viewaddress(<?= $value['id'] ?>)"><i class="material-icons">&#xE417;</i></a></td>
                        <td>
                            <a href="#" class="delete" title="Delete" data-toggle="tooltip" onclick="deleteItem(<?= $value['id'] ?>)"><i class="material-icons">&#xE872;</i></a>
                            <a href="#" class="approve" title="approve" data-toggle="tooltip" onclick="unapproveUser(<?= $value['id'] ?>)"><i class="material-icons text-danger"><?= $value['user_status'] == 1 ? "&#xE9D3;" : ""?></i></a>
                            <a href="#" class="unapprove" title="approve" data-toggle="tooltip" onclick="approveUser(<?= $value['id'] ?>)"><i class="material-icons text-success"><?= $value['user_status'] == 1 ? "" : "&#xE877;"?></i></a>
                        </td>
                        <td>
                            <i class="material-icons"><?= $value['user_status'] == 1 ? "&#xef76;" : "&#xE14B;"?>
                        </td>
                    </tr>    
                    <?php
                        }
                    ?>   
                </tbody>
            </table>
            <div class="modal" id="exampleModalCentered" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenteredLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenteredLabel">Address</h5>
                    </div>
                    <div class="modal-body">
                        <p id = "add_content"></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>        
</div>  
<?php
include('footer.php');
?>                             		
