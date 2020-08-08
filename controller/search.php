<?php 
include_once '../model/connect.php';
include_once '../global.php';
searchsp();
function searchsp(){
        global $pathimg;
        $output = '';
        if(isset($_POST["query"])){
            $search = $_POST['query'];
            $sql = "SELECT * FROM products WHERE name LIKE '%".$search."%'";
        }
        else{
            $sql = "SELECT * FROM products WHERE 1";
        }
        $result = result1(0,$sql);
        if($result){
            $output .= ' <div class="showtable">
                            <table>
                            <tr class="tabletitle">
                                <th class="thid">ID</th>
                                <th class="thname">Name</th>
                                <th class="thphoto">Photo</th>
                                <th class="thprice">Price</th>
                                <th class="thdiscount">Discount</th>
                                <th class="thaction">Action</th>
                            </tr>
                        ';
                        foreach ($result as $showsp) {
                                $id = $showsp['id'];
                                $name = $showsp['name'];
                                $anh = $pathimg.$showsp['img'];
                                $gia = $showsp['gia'];
                                $giamgia = $showsp['giamgia'];
                                $linkdel = "admin.php?act=delsanpham&iddel=".$id;
                                $linkedit = "admin.php?act=editsanpham&idedit=".$id;
                                $output .=  
                                '<tr>
                                    <td>'.$id.'</td>
                                    <td>'.$name.'</td>
                                    <td><img src="'.$anh.'"></td>
                                    <td>'.$gia.'</td>
                                    <td>'.$giamgia.'</td>
                                    <td>  <a href="'.$linkedit.'"> <i class="fa fa-edit" ></i></a> <a href="'.$linkdel.'"> <i class="fa fa-trash" onclick="return checkDelete()"></i></a></td> 
                                </tr>';   
                            }
                $output .='</table>';       
                $output .='</div>';
                echo $output;
        }
        else{
            $output = "<h3>Không có sản phẩm nào</h3>";
        }
}


?>