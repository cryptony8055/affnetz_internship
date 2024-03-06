<?php
include('sidebar.php');

include('database.php');
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $qry = "SELECT * FROM family_info WHERE user_id = $id AND is_delete = 0";
    $result = $conn->query($qry);
    
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else{
    $data = "";
}
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
    <div class=" text-right col-md-12 mt-4">
        <!-- <button href="family.php" class="btn btn-success py-2 px-3">add family details</button> -->
		<input type="button" action="family.php" value="add family details" class="btn btn-success py-2 px-3">
    </div>
<div class="container-xl m-0">
    <div class="table-responsive">
        <div class="table-wrapper">			
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Relation</th>
                        <th>Gender</th>
                        <th>Age</th>
                        <th>Added On</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if($data){
                        foreach($data as $key => $value){
                    ?>
                    <tr>
                        <td><?= $key + 1 ?></td>
                        <td><?= $value['fname'] ?></td>
                        <td><?= $value['email'] ?></td>
                        <td><?= $value['phone'] ?></td>
                        <td><?= $value['relation'] ?></td>
                        <td><?= $value['gender'] ?></td>
                        <td><?= $value['age'] ?></td>
                        <td><?= date('d-M-Y', strtotime($value['created_at'])) ?></td>
                        <td>
                            <a href="#" class="delete" title="Delete" data-toggle="tooltip" onclick="deleteFamily(<?= $value['ID'] ?>)"><i class="material-icons">&#xE872;</i></a>
                        </td>
                    </tr>    
                    <?php
                        }}else{
                            echo '<tbody><tr><td colspan="9"><h4 style="text-align:center; color:#c04949;">No record found!!!</h4></td></tr></tbody>';
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
