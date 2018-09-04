<?php  
//export.php  
$connect = mysqli_connect("localhost", "root", "", "spedi_db");
$output = '';
if(isset($_POST["export"]))
{
 $query = "SELECT * FROM tbl_item2  ORDER BY a_description";
 $search_result = mysqli_query($connect, $query);
 $counter = 1;
 if(mysqli_num_rows($search_result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                         <th>No.</th>  
                         <th>Description</th>  
                         <th>Unit Cost</th>  
                         <th>Quantity</th>
                         <th>Issuance</th>
                         <th>Return</th>
                         <th>Balance</th>
                    </tr>
  ';
  while($row = mysqli_fetch_array($search_result))
  {
   $output .= '
                     <tr>  
                         <td>'.$counter.'</td>  
                         <td>'.$row["a_description"].'</td>  
                         <td>'.number_format($row['a_unitcost'],2).'</td>  
                         <td>'.$row["a_qty"].'</td>  
                         <td>'.$row["a_issuance"].'</td>
                         <td>'.$row["a_return"].'</td>
                         <td>'.$row["a_balance"].'</td>
                                               
                    </tr>


   ';
   $counter++;

  }

  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=download.xls');
  echo $output;
 }
}
?>