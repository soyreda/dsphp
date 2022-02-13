<?php
include "../Controllers/ConnexionDB.php";
include "./boite_doutils.php";

$cle=$_POST['input'];
$req = $db->query("select * from pictures where title like '%".$cle."%' or description like '%".$cle."%'" );


$output = '';
while($data=$req->fetch()){
    
    $user = findUserById($db, $data['id_user']);
    $output .= "<div class='col-md-6'>
            <div class='card mb-4 shadow-sm'>
            <div class='card bg-dark text-white'>

                <img preserveAspectRatio='xMidYMid slice' focusable='false' class='bd-placeholder-img card-img-top' src='../uploads/".$data['image']."' alt='' width='100%' height='225'>

                <div class='card-body'>


                    <a href='User/showProfile.php?id=". $data['id_user'] ."'><img src='../uploads/". $user['image'] ."' class='rounded-circle' alt='Cinque Terre' width='30px' height='30px'>
                        <b>
                            
                            
                             ".$user['first_name'] . ' ' . $user['last_name']."
                            
                        </b>
                    </a>
                    <h6>". $data['title'] ."'</h6>
                    <div class='d-flex justify-content-between align-items-center'>
                        <div class='btn-group'>
                            <a href='Photo/viewPhoto.php?id=". $data['id'] ."' type='button' class='btn btn-sm btn-outline-warning'>View</a>
                           
                        </div>
                        <small class='text-muted'>". $data['date'] ."</small>
                    </div>
                </div>
                </div>
            </div>
        </div>";



    
}


echo $output;

?>