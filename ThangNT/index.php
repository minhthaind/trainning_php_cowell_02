
<!DOCTYPE html>
<head>
    <title>PHP Pagination</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="col-md-10 col-md-offset-1">
            <h1>PHP Pagination</h1>
            <?php
            $page = ( isset($_GET['page']) ) ? $_GET['page'] : 1; // lấy tham số ở trên url , nếu ko có page thì mđ=1
            $handle = fopen("list_persion.csv", "r") or die("file dont exist");
            $data = array();
           
            while (!feof($handle)) {
                $dataTmp = fgetcsv($handle, 4096, ",");
                array_push($data, $dataTmp);
            }

            $limit = 4; // 4 record trong 1 trang.
            $page = $page < 1 ? 1 : $page; // 
            $start = (($page - 1) * $limit) ; 
                      
            if ($page <= (ceil(count($data) / $limit))) { 
                $end = ($page * $limit); 
            } else {
                $end = (ceil(count($data) / $limit));
            }
            //echo count($data);
            echo '<table class="table table-striped table-condensed table-bordered table-rounded">
					<thead>
						<tr>
							<th width="20%">Name</th>
							<th width="15%">Ngay Sinh</th>
							<th width="10%">Gioi Tinh</th>
							<th width="20%">Phone</th>
							<th width="30%">Email</th>
						</tr>
					</thead>
					';
            for ($i = $start; $i < $end; $i++) {
                //echo $i;
                
                if ($i < count($data)) {
                    echo '<tbody>';
                    for ($j = 0; $j < count($data[$i]); $j++) {
                        echo '<td>' . $data[$i][$j] . '</td>';
                    }

                    // echo '<pre>';
                    // 	print_r($data[$i]);
                    // echo '</pre>';
                }
            }
            echo '</tbody>
				</table>';

            // Tạo link phân trang , col-md-12 pager là class boottrap
            echo createLinks($page, 'pagination', $data, $limit);

            function createLinks($page, $list_class, $data, $limit) {

                $lenghtData = ceil(count($data) / $limit);
                //echo $lenghtData;
                $start = 1;
                $end = $lenghtData;

                $html = '<div class = "col-md-12 pager">';
                $html .= '<ul class="' . $list_class . '">';

                $class = ( $page == 1 ) ? "disabled" : "";
                $html .= '<li class="' . $class . '"><a href="?page=' . ( $page - 1 ) . '">&laquo;</a></li>';

                if ($start > 1) {
                    $html .= '<li><a href="?page=1">1</a></li>';
                    $html .= '<li class="disabled"><span>...</span></li>';
                }

                for ($i = $start; $i <= $end; $i++) {
                    $class = ( $page == $i ) ? "active" : "";
                    $html .= '<li class="' . $class . '"><a href="?page=' . $i . '">' . $i . '</a></li>';
                }

                if ($end < $lenghtData) {
                    $html .= '<li class="disabled"><span>...</span></li>';
                    $html .= '<li><a href="?page=' . $lenghtData . '">' . $lenghtData . '</a></li>';
                }

                $class = ( $page == $lenghtData ) ? "disabled" : "";
                $html .= '<li class="' . $class . '"><a href="?page=' . ( $page + 1 ) . '">&raquo;</a></li>';

                $html .= '</ul></div>';

                return $html;
            }
            ?>
        </div>

    </div>
</body>
</html>
