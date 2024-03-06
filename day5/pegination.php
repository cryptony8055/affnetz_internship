<?php
include('sidebar.php');
include('database.php');
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
                            if (isset($_GET['page_no']) && $_GET['page_no']!="") {
                            $page_no = $_GET['page_no'];
                            } else {
                            $page_no = 1;
                            }
                        
                            $total_records_per_page = 2;
                            $offset = ($page_no-1) * $total_records_per_page;
                            $previous_page = $page_no - 1;
                            $next_page = $page_no + 1;
                            $adjacents = "2"; 
                        
                            $result_count = mysqli_query($conn,"SELECT COUNT(*) As total_records FROM users");
                            $total_records = mysqli_fetch_array($result_count);
                            $total_records = $total_records['total_records'];
                            $total_no_of_pages = ceil($total_records / $total_records_per_page);
                            $second_last = $total_no_of_pages - 1; // total page minus 1
                        
                            $result = mysqli_query($conn,"SELECT * FROM users LIMIT $offset, $total_records_per_page");
                            while($row = mysqli_fetch_array($result)){
                                echo '<tr>';
                                echo '<td>' . ($row['id'] + 1) . '</td>';
                                echo '<td>' . $row['display_name'] . '</td>';
                                echo '<td>' . $row['email'] . '</td>';
                                echo '<td>n/a</td>';
                                echo '<td>' . date('d-M-Y', strtotime($row['create_time'])) . '</td>';
                                echo '<td><i class="material-icons"></i></td>';
                                echo '<td>';
                                echo '<a href="#" class="delete" title="Delete" data-toggle="tooltip" onclick="deleteItem(' . $row['id'] . ')"><i class="material-icons"></i></a>';
                                echo '<a href="#" class="approve" title="approve" data-toggle="tooltip" onclick="unapproveUser(' . $row['id'] . ')"><i class="material-icons text-danger">' . ($row['user_status'] == 1 ? '' : '') . '</i></a>';
                                echo '<a href="#" class="unapprove" title="approve" data-toggle="tooltip" onclick="approveUser(' . $row['id'] . ')"><i class="material-icons text-success">' . ($row['user_status'] == 1 ? '' : '') . '</i></a>';
                                echo '</td>';
                                echo '<td><i class="material-icons">' . ($row['user_status'] == 1 ? '' : '') . '</i></td>';
                                echo '</tr>';
                                }
                            mysqli_close($conn);
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
        <div style='padding: 10px 20px 0px; border-top: dotted 1px #CCC;'>
            <strong>Page <?php echo $page_no." of ".$total_no_of_pages; ?></strong>
        </div> 
        <ul class="pagination">    
                <li <?php if($page_no <= 1){ echo "class='disabled'"; } ?>>
                <a <?php if($page_no > 1){ echo "href='?page_no=$previous_page'"; } ?>>Previous</a>
                </li>   
                    <?php 
                        if ($total_no_of_pages <= 10){  	 
                            for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
                                if ($counter == $page_no) {
                            echo "<li class='active'><a>$counter</a></li>";	
                                    }else{
                            echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                                    }
                            }
                        }
                        elseif($total_no_of_pages > 10){            
                        if($page_no <= 4) {			
                        for ($counter = 1; $counter < 8; $counter++){		 
                                if ($counter == $page_no) {
                            echo "<li class='active'><a>$counter</a></li>";	
                                    }else{
                            echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                                    }
                            }
                            echo "<li><a>...</a></li>";
                            echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
                            echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
                            }
                        
                        elseif($page_no > 4 && $page_no < $total_no_of_pages - 4) {		 
                            echo "<li><a href='?page_no=1'>1</a></li>";
                            echo "<li><a href='?page_no=2'>2</a></li>";
                            echo "<li><a>...</a></li>";
                            for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {			
                            if ($counter == $page_no) {
                            echo "<li class='active'><a>$counter</a></li>";	
                                    }else{
                            echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                                    }                  
                        }
                        echo "<li><a>...</a></li>";
                        echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
                        echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";      
                                }
                            
                            else {
                            echo "<li><a href='?page_no=1'>1</a></li>";
                            echo "<li><a href='?page_no=2'>2</a></li>";
                            echo "<li><a>...</a></li>";
                            
                            for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
                            if ($counter == $page_no) {
                            echo "<li class='active'><a>$counter</a></li>";	
                                    }else{
                            echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                                    }                   
                                    }
                                }
                        }
                    ?>
                <li <?php if($page_no >= $total_no_of_pages){ echo "class='disabled'"; } ?>>
                <a <?php if($page_no < $total_no_of_pages) { echo "href='?page_no=$next_page'"; } ?>>Next</a>
                </li>
                <?php if($page_no < $total_no_of_pages){
                    echo "<li><a href='?page_no=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a></li>";
                    } ?>
        </ul>

                   
</div>                              		

<?php
include('footer.php');
?> 