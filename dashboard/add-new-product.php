<?php
require_once('include.php');
$title = 'Dashboard | Add Product'; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php
$msg = '';

if (isset($_POST['sub'])) {

    $product_name = $_POST['product_name'];
    $product_category = $_POST['product_category'];
    $product_description = $_POST['editor_content'];
    $product_video = $_POST['product_video'];
    $product_price = $_POST['product_price'];
    $product_old_price = $_POST['product_old_price'];
    $product_commision = $_POST['product_commision'];
    $product_status = $_POST['product_status'];
    $product_features = '';

    $pic_name  = $_FILES['product_thumbnail']['name'];
    $pic_tmp = $_FILES['product_thumbnail']['tmp_name'];
    $pic_size = $_FILES['product_thumbnail']['size'];

    $pic_name1  = $_FILES['product_image']['name'];
    $pic_tmp1 = $_FILES['product_image']['tmp_name'];
    $pic_size1 = $_FILES['product_image']['size'];

    $url_info = str_replace(' ', '-', $product_name);
    $theurl = preg_replace('/[^A-Za-z0-9\-]/', '', $url_info);
    $product_slug = $theurl . '-' . $bassic->randGenerator();
    $product_id = $bassic->randGenerator();

    if (!empty($pic_name) && !empty($pic_name1) && !empty($product_name) && !empty($product_category) && !empty($product_description) && !empty($product_price)) {

        $gen_Num = $bassic->randGenerator();
        $extension_Name = $bassic->extentionName($pic_name);
        $new_name = $gen_Num . uniqid() . $extension_Name;
        $path = '../../photo/' . $new_name;
        $picvalidation = $bassic->picVlidator($pic_name, $pic_size);

        $gen_Num1 = $bassic->randGenerator();
        $extension_Name1 = $bassic->extentionName($pic_name1);
        $new_name1 = $gen_Num . uniqid() . $extension_Name1;
        $path1 = '../../photo/' . $new_name1;
        $picvalidation1 = $bassic->picVlidator($pic_name1, $pic_size1);

        if (empty($picvalidation)) {
            $upl = $bassic->uploadImage($pic_tmp, $path);
            $upl2 = $bassic->uploadImage($pic_tmp1, $path1);

            if (empty($upl)) {
                $fieldup = array("id", "product_id", "product_slug", "category_id", "product_name", "product_price", "product_old_price", "product_commision", "product_thumbnail", "product_image", "product_description", "product_features", "product_video", "product_status", "date_created");
                $valueup = array(null, $product_id, $product_slug, $product_category, $product_name, $product_price, $product_old_price, $product_commision, $new_name, $new_name1, $product_description, $product_features, $product_video, $product_status, $bassic->getDate());
                $update = $cal->insertDataB($product, $fieldup, $valueup);
                if (!empty($update)) {
                    if ($update == 'Registration was successful. Proceed to login!') {
                        $msg = 'Product was successfully created!';
                    } else {
                        $msg = $update;
                    }
                } else {
                    $msg = 'An error occured!';
                }
            } else {
                $msg =  $upl;
            }
        } else {
            $msg =  $picvalidation;
        }
    } else {
        $msg = 'Please fill all fields';
    }
}

require_once('head.php');
?>
<style>
    .carda {
        width: 100%;
        height: 400px;
        box-shadow: 0px 0px 12px 0px #ccc;
        border-radius: 5px;
        overflow: hidden;
    }

    .carda img {
        width: 100%;
        height: 100%;
        border-radius: 5px;
        object-fit: cover;
    }
</style>

<body>

    <div class="tap-top">
        <i class="ri-arrow-up-double-fill"></i>
    </div>

    <?php require_once('loader.php');
    ?>

    <div class="page-wrapper compact-wrapper" id="pageWrapper">
        <?php require_once('header.php'); ?>

        <div class="page-body-wrapper">
            <?php require_once('side-bar.php'); ?>

            <div class="page-body">

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <form method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Product List</h5>
                                            </div>
                                            <?php if (!empty($msg)) { ?>
                                                <div id="go" class=" col-lg-12">
                                                    <div id="go" class="alert alert-warning" style="text-align: center; color:dark;"><?php print @$msg; ?> <i id="remove" class="fa fa-remove pull-right"></i></div>
                                                </div>
                                            <?php } ?>
                                            <div class="card-body">
                                                <div class="row">

                                                    <?php
                                                    $sql = query_sql("SELECT * FROM $product WHERE `product_status`=1 ORDER BY id DESC");
                                                    if (mysqli_num_rows($sql) > 0) {
                                                        $c = 0;
                                                        while ($row = mysqli_fetch_assoc($sql)) { ?>
                                                            <div class="col-md-4 col-sm-6 mb-4">
                                                                <div class="card carda">
                                                                    <img src="../photo/<?php echo $row['product_thumbnail']; ?>" class="card-img-top" alt="<?php echo htmlspecialchars($row['product_name']); ?>" style="height: 200px; object-fit: cover;">
                                                                    <div class="card-body">
                                                                        <h3 class="card-title pt-3"><?php echo htmlspecialchars($row['product_name']); ?></h3>
                                                                        <p class="card-text"><?php echo substr(strip_tags($row['product_description']), 0, 27) . '...'; ?></p>
                                                                        <p class="card-text">
                                                                            <strong>Price:</strong> <?php print $base_currency; ?><?php echo number_format($row['product_price']); ?>
                                                                            <?php if (!empty($row['product_old_price'])) { ?>
                                                                                <small class="text-muted"><del><?php print $base_currency; ?><?php echo number_format($row['product_old_price']); ?></del></small>
                                                                            <?php } ?>
                                                                        </p>
                                                                        <a href="product-details.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">View Details</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php $c++;
                                                        }
                                                    } else { ?>
                                                        <div class="col-12">
                                                            <p class="text-center">No products available.</p>
                                                        </div>
                                                    <?php } ?>

                                                </div>

                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <?php require_once('footer.php'); ?>

</body>

</html>