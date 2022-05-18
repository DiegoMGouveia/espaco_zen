<div class="container-list-coupon">
<?php
// se o GET listall tiver algum valor, significa que o botão "excluir" foi acionado para excluir um cupom.
if ($_GET["listcoupons"] > 0) {
    delCoupon($_GET["listcoupons"], $conecta);

}
?>

<table class="shop-table">
            <thead>
                <tr>
                    <th width="30">ID</th>
                    <th width="200">Cupom</th>
                    <th width="200">Data</th>
                    <th width="30">Desconto</th>
                    <th width="30">Descrição</th>
                    <th width="30">Status</th>
                    <th width="30">Excluir</th>
                </tr>
            </thead>
            <tbody>

            <?php
            $query = listcoupons($conecta);
            while($coupon_list = mysqli_fetch_array($query)) {
                ?>
                <tr>
                    <center>
                        <td><?php echo $coupon_list['couponID']; ?></td>
                    </center>
    
                        <td><?php echo $coupon_list['coupon']; ?></td>
                        <td><?php echo $coupon_list['dateTime']; ?></td>
                        <td><?php echo $coupon_list['discount'] .  "%"; ?></td>
                        <td><?php echo $coupon_list['description']; ?></td>
                        <td><?php echo $coupon_list['status']; ?></td>
                        <td><a href="admin-coupons.php?listcoupons=<?php echo $coupon_list['couponID']; ?>"><button type="submit">Excluir</button></a></td>
                </tr>
                <?php
                } // while($coupon_list = mysqli_fetch_array($query)) {

            ?>
            
            </tbody>

        </table><br><br>

        

</div>