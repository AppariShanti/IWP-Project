<?php
$db1=mysqli_connect('localhost','root','','registration');
function find_client_by_id($client_id) 
{
        global $db1;

        $safe_client_id = mysqli_real_escape_string($db1, $client_id);

        $query = "SELECT * FROM `events` WHERE id = {$safe_client_id} LIMIT 1";
        $client_set = mysqli_query($db1, $query);
        if($client = mysqli_fetch_assoc($client_set)) 
        {
            return $client;
        } 
        else 
        {
            return null;
        }
}

?>