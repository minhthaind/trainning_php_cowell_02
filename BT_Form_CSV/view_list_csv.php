
<!DOCTYPE html>
<head>
  <title>PHP Pagination</title>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  <a href="index.php">Trở về trang chủ</a>

</head>
<body>
  <div class="container">
    <div class="col-md-10 col-md-offset-1">
      <h2 align="center">Danh sách thành viên</h2>

      <?php
$page   = (isset($_GET['page'])) ? $_GET['page'] : 1;
$handle = fopen("list_persion.csv", "r") or die("file dont exist");
$data   = array();
//đọc dòng nào thì add dòng đấy vào mảng data
//hàm feof dùng để test điểm cuối của file.
while (!feof($handle)) {
    $dataTmp = fgetcsv($handle, 4096, ",");
    array_push($data, $dataTmp);
}

$limit = (isset($_GET['limit'])) ? $_GET['limit'] : 10; // 4 record trong 1 trang.
$page  = ($page < 1) ? 1 : $page;
$start = (($page - 1) * $limit);
// $start là số thứ tự record bắt đầu của trang.
//print_r(count($data)); die(); hàm count($data) trả về số bản ghi trong mảng data

if ($page <= (ceil(count($data) / $limit))) {
    $end = ($page * $limit); // tinh thứ tự của bản ghi cuối cùng của trang
} else {
    $end = (ceil(count($data) / $limit));
}

echo '<table class="table table-striped table-condensed table-bordered table-rounded">
<thead>
    <tr>
       <th width="20%">Họ và tên</th>
       <th width="15%">Ngày sinh</th>
       <th width="10%">Giới tính</th>
       <th width="20%">Điện thoại</th>
       <th width="30%">Email</th>
   </tr>
</thead>

';
echo '
<tfoot>
 <tr>
   <th width="20%">Họ và tên</th>
   <th width="15%">Ngày sinh</th>
   <th width="10%">Giới tính</th>
   <th width="20%">Điện thoại</th>
   <th width="30%">Email</th>
</tr>
</tfoot>

';
for ($i = $start; $i < $end; $i++) {

    if ($i < count($data)) {
        echo '<tbody>';
        for ($j = 0; $j < count($data[$i]); $j++) {
            echo '<td>' . $data[$i][$j] . '</td>';
        }

        // echo '<pre>';
        //     print_r($data[$i]);
        // echo '</pre>';
    }
}
echo '</tbody>
</table>';

// Tạo link phân trang , col-md-12 pager là class boottrap
?>
<div class="navbar-fixed-bottom">
  <?php echo createLinks($page, 'pagination', $data, $limit); ?>
</div>
<?php

function createLinks($page, $list_class, $data, $limit)
{

    $lenghtData = ceil(count($data) / $limit); //số lượng trang
    //echo $lenghtData;
    $start = 1;
    $end   = $lenghtData; // số lượng trang
    $html  = '<div class = "col-md-12 pager">';
    $html .= '<ul class="' . $list_class . '">';

    $class = ($page == 1) ? "disabled" : "";
    $html .= '<li class="' . $class . '"><a href="?page=' . ($page - 1) . '">&laquo;</a></li>';

    if ($start > 1) {
        $html .= '<li><a href="?page=1">1</a></li>';
        $html .= '<li class="disabled"><span>...</span></li>';
    }
    // hiển thị các số phân trang/
    for ($i = $start; $i <= $end; $i++) {
        $class = ($page == $i) ? "active" : "";
        $html .= '<li class="' . $class . '"><a href="?page=' . $i . '">' . $i . '</a></li>';
    }

    if ($end < $lenghtData) {
        $html .= '<li class="disabled"><span>...</span></li>';
        $html .= '<li><a href="?page=' . $lenghtData . '">' . $lenghtData . '</a></li>';
    }

    $class = ($page == $lenghtData) ? "disabled" : "";
    $html .= '<li class="' . $class . '"><a href="?page=' . ($page + 1) . '">&raquo;</a></li>';

    $html .= '</ul></div>';

    return $html;
}
?>
</div>

</div>
</body>
</html>