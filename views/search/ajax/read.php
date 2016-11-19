<?php
 
require 'lib.php';
 
$object = new CRUD();
 
// Design initial table header
$data = '<table class="table table-bordered table-striped">
                        <tr>
                            <th>No.</th>
                            <th>Location</th>
                            <th>Subject</th>
                            <th>Title</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>';
 
 
$users = $object->Read();
 
if (count($users) > 0) {
    $number = 1;
    foreach ($users as $user) {
        $data .= '<tr>
                <td>' . $number . '</td>
                <td>' . $user['location'] . '</td>
                <td>' . $user['subject'] . '</td>
                <td>' . $user['title'] . '</td>
                <td>
                    <button onclick="GetUserDetails(' . $user['id'] . ')" class="btn btn-warning">Update</button>
                </td>
                <td>
                    <button onclick="DeleteUser(' . $user['id'] . ')" class="btn btn-danger">Delete</button>
                </td>
            </tr>';
        $number++;
    }
} else {
    // records not found
    $data .= '<tr><td colspan="6">Records not found!</td></tr>';
}
 
$data .= '</table>';
 
echo $data;
 
?>