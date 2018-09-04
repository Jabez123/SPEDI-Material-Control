<?php  
//export.php  
$connect = mysqli_connect("localhost", "root", "", "spedi_db");
$output = '';
if(isset($_POST["export"]))
{
 $query = "SELECT * FROM tbl_item";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                        <th>Project Name</th>
                        <th>Location</th>
                        <th>Item</th>
                        <th>Description</th>
                        <th>Unit</th>
                        <th>Issued</th>
                        <th>Returned</th>
                        <th>Transfer To</th>
                        <th>Transfer From</th>
                        <th>Balance</th>
                         
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
                     <tr>  
                         <td>'.$row["i_projectname"].'</td>
                         <td>'.$row["i_location"].'</td>  
                         <td>'.$row["i_item"].'</td>
                         <td>'.$row["i_description"].'</td>  
                         <td>'.$row["i_unit"].'</td>  
                         <td>'.$row["i_issued"].'</td>  
                         <td>'.$row["i_returned"].'</td>
                         <td>'.$row["i_transfer_to_qty"].'</td>
                         <td>'.$row["i_transfer_from_qty"].'</td>
                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=download.xls');
  echo $output;
 }
}
?>