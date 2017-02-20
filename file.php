<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">

 <title>list_person</title>
    <!-- Latest compiled and minified CSS & JS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" >
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
   
</head>
<body>
    <div class=" container">
    <h2>Hiển thị danh  sách sinh viên</h2>
        <table class="table table-bordered">
            <thead>
              <tr>
                <th>STT</th>
                <th>Name</th>
                <th>Birth</th>
                <th>Sex</th>
                <th>Phone</th>
                <th>Email</th>
               
            </tr>
        </thead>
            <?php
               $row = 1;
               $list= array();
                if (($handle = fopen("test.csv", "r")) !== FALSE) {
                    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                        $num = count($data);
                        array_push($list,$data);
                        
                        $row++;    
                }

                $page = $_GET["page"];
                $page_one=4;
                
                $total_page=count($list);
                $page_s= ceil($total_page/$page_one);
                
                $start=($page -1)*$page_one; 


                $list_ol=array_slice($list,$start,$page_one);
                
       
        


      
    foreach ($list_ol as $key => $value) {
            
        ?>
        <tr>
            <td><?php echo $value[0]; ?> </td>
            <td><?php echo $value[1]; ?></td>
             <td><?php echo $value[2]; ?></td>
              <td><?php echo $value[3]; ?></td>
               <td><?php echo $value[4]; ?></td>
               <td><?php echo $value[5]; ?></td>

        </tr>

    


       
      <?php 
    }
    fclose($handle);

}
?>
    </table>
    <nav aria-label="Page navigation">
  <ul class="pagination pa_n">
    <li>
      <a href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <?php for($t=1; $t<=$page_s; $t++) {
    echo"<li><a href='file.php?page=$t'>$t</a></li>";
     }
    ?>
    <li>
      <a href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>


    </div>
</html>
