<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2/15/2017
 * Time: 3:45 AM
 */
?>
<!DOCTYPE hmtl>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="widt=device-width, initial-scale=1">
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <style>
            * {
            margin:0;
            padding: :0;
            }

            .container-main {
                width:400px;
                margin: 0 auto;
            }
            .edit-column-name {
                text-align: center;
            }
            tr {
                cursor: pointer;
            }
        </style>

    </head>
	<body>

        <div class="container-main">
            <?php
                $row = 1;
                // kiểm tra xem có thể mở file csv không
                if(($handle = fopen("list_persion.csv","r"))!== FALSE){
                    while(($data = fgetcsv($handle, 1000, ",")) !== FALSE){
                        $num = count($data);

                        for($c = 0; $c < $num; $c++){

                            if($c == 0){
                                ?>
                                <div>
                                    <table class="table table-striped">
                                        <tr>
                                            <td><?php  echo $row;?></td>
                                            <td class="edit-column-name"><?php  echo $data[$c];?></td>
                                        </tr>
                                    </table>
                                </div>
                                <?php
                            }
                        }
                        $row++;
                    }
                    fclose($handle);
                }
            ?>
    </div>
    </body>
    </html>
<?php
