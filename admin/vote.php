<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../classes/cart.php');
    include_once ($filepath.'/../helper/format.php');
    include_once ($filepath.'/../classes/customer.php');
?>
<?php
    $ct = new customer();
    //Khi nhấn vào Duyệt
    if(isset($_POST['r_cmt'])){
        $r_id = $_POST['r_id'];
        echo $r_id;
        $repcomment = $ct->rep_comment($r_id);
    }
    if(isset($_GET['rcmt_id'])){
        $id = $_GET['rcmt_id'];
        $del_comment = $ct->del_comment($id);
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Đánh Giá Sản Phẩm</h2>
        <div class="block">         
            <table class="data display datatable" id="example">
            <thead>
                <tr>
                    <th>STT</th>
                    <th style="width: 200px;">Sản Phẩm</th>
                    <th>Tên Khách Hàng</th>
                    <th>Đánh Giá</th>
                    <th style="width: 200px;">Bình Luận</th>
                    <th>Thời Gian</th>
                    <th>Hành Động</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $ct = new customer();
                    $fm = new Format();
                    $get_comment = $ct->get_comment();
                    if($get_comment){
                        $i = 0;
                        while($result = $get_comment->fetch_assoc()){
                            $i++;
                ?>
                <tr class="odd gradeX">
                    <td><?php echo $i ?></td>
                    <td><a title="Click để xem chi tiêt sản phẩm" href="../details.php?proid=<?php echo $result['product_id'] ?>" target="_blank">
                        <?php echo $result['productName'] ?>
                        </a>
                    </td>
                    <td><?php echo $result['name'] ?></td>
                    <td><?php echo $result['vote'] ?> &#9733</td>
                    <td><?php echo $result['cmt'] ?>
 
                    </td>
                    <td><?php echo $result['datecmt'] ?></td> 
                    <td>
                        <?php
                            if($result['status']==0){
                        ?>
                        <div style="color: #1B548D;">Trả lời:</div>
                        <form action="" method="POST">
                            <textarea name="rep_cmt" rows="3" required=""></textarea><br>
                            <div><input type="hidden" name="r_id" value="<?php echo $result['cmt_id'] ?>"></div> 
                            <div><input type="submit" name="r_cmt" value="Duyệt"></div> 
                        </form>                        
                        <?php 
                            }else{
                        ?>
                        <p style="font-weight: bold;">Đã Duyệt <a style="color: red" href="?rcmt_id=<?php echo $result['cmt_id'] ?>">(Xóa)</a></p>
                        <?php
                            }
                        ?>
                    </td>    
                </tr>
                <?php                       
                        }
                    }
                ?>
            </tbody>
        </table>
       </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();

        $('.datatable').dataTable();
        setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
