<?php
include('database.php');
if(!empty($_POST)){
    $slug = $_POST['slug'];
    $id = $_POST['id'];

    switch ($slug) {
        case 'address':
            $qry = "SELECT * FROM userprofile WHERE is_delete = 0 AND user_id =".$id ;
            $result = $conn->query($qry);
            $user_details = mysqli_fetch_all($result, MYSQLI_ASSOC);
            if($user_details){
                $address = $user_details ? $user_details[0]['pin'].", ".$user_details[0]['city'].", ".$user_details[0]['district']." ,".$user_details[0]['st'] : "Na";
            } else {
                $address = 'Oops, Address not found!!!!';
            }
            echo json_encode($address);
            break;
        case 'delete':
            $qry = "UPDATE users SET is_delete = 1 WHERE id =".$id ;
                $result = $conn->query($qry); 
                if($result){
                    $response = 'successfully deleted';
                } else {
                    $response = 'Oops,Something went wrong!!!';
                }
                echo json_encode($response);
            break;
        case 'approve':
            $qry = "UPDATE users SET user_status = 1 WHERE id =".$id ;
                $result = $conn->query($qry); 
                if($result){
                    $response = 'successfully approved user';
                } else {
                    $response = 'Oops,Something went wrong!!!';
                }
                echo json_encode($response);
            break;
        case 'unapprove':
            $qry = "UPDATE users SET user_status = 0 WHERE id =".$id ;
                $result = $conn->query($qry); 
                if($result){
                    $response = 'successfully approved user';
                } else {
                    $response = 'Oops,Something went wrong!!!';
                }
                echo json_encode($response);
            break;
        case 'deleteFamily':
            $qry = "UPDATE family_info SET is_delete = 1 WHERE id =".$id ;
                $result = $conn->query($qry); 
                if($result){
                    $response = 'successfully approved user';
                } else {
                    $response = 'Oops,Something went wrong!!!';
                }
                echo json_encode($response);
            break;
        // ... more cases ...
        default:
            // Code block if no case matches
            echo 'invalid slug';
    }

    
}
?>