<!-- load file layout chung -->
<?php $this->layoutPath = "LayoutTrangTrong.php"; ?>
<div class="product-detail" itemscope itemtype="http://schema.org/Product">
        <div class="top">
        <div class="row">
        <div class="col-xs-12 col-md-6 product-image">
        <div class="featured-image"> <img src="../assets/upload/products/<?php echo $record->photo; ?>" class="img-responsive" id="large-image" itemprop="image" data-zoom-image="../assets/upload/products/<?php echo $record->photo; ?>" alt="<?php echo $record->name; ?>" /></div>
        </div>
        <div class="col-xs-12 col-md-6 info">
        <h1 itemprop="name"><?php echo $record->name; ?></h1>
        <p class="vendor"> Category:&nbsp; <span> <?php echo $this->modelGetCategory($record->category_id); ?> </span></p>
        <p itemprop="price" class="price-box product-price-box"> <span class="special-price"> <span class="price product-price" style="text-decoration:line-through;"> <?php echo number_format($record->price); ?>₫ </span></span></p>
        <p itemprop="price" class="price-box product-price-box"> <span class="special-price"> <span class="price product-price"> <?php echo number_format($record->price - ($record->price*$record->discount)/100); ?>₫ </span></span></p>
        </p>
        <a href="index.php?controller=cart&action=create&id=<?php echo $record->id; ?>" class="btn btn-primary">Cho vào giỏ hàng</a>
        <div style="margin-top: 10px;">
                <input type="number" id="quantity" min="1" value="1">
                <a href="#" onclick="addCart();" class="btn btn-primary">Cho vào giỏ hàng</a>
<script type="text/javascript">
        function addCart(){
                var quantity = document.getElementById('quantity').value;
                location.href="index.php?controller=cart&action=createWithNumber&id=<?php echo $record->id; ?>&quantity="+quantity;
        }
</script>
        </div>
        <!-- rating -->
        <div style="border:1px solid #dddddd; margin-top: 15px;">
        <h4 style="padding-left: 10px;">Rating</h4>
        <table style="width: 100%;">
        <tr>
        <td style="width: 80%; padding-left: 10px;"><img src="../assets/frontend/images/star.jpg"></td>
        <td><span class="label label-primary"><?php echo $this->modelGetStar($record->id,1); ?> vote</span></td>
        </tr>
        <tr>
        <td style="width: 80%; padding-left: 10px;"><img src="../assets/frontend/images/star.jpg"> <img src="../assets/frontend/images/star.jpg"></td>
        <td><span class="label label-warning"><?php echo $this->modelGetStar($record->id,2); ?> vote</span></td>
        </tr>
        <tr>
        <td style="width: 80%; padding-left: 10px;"><img src="../assets/frontend/images/star.jpg"> <img src="../assets/frontend/images/star.jpg"> <img src="../assets/frontend/images/star.jpg"></td>
        <td><span class="label label-danger"><?php echo $this->modelGetStar($record->id,3); ?> vote</span></td>
        </tr>
        <tr>
        <td style="width: 80%; padding-left: 10px;"><img src="../assets/frontend/images/star.jpg"> <img src="../assets/frontend/images/star.jpg"> <img src="../assets/frontend/images/star.jpg"> <img src="../assets/frontend/images/star.jpg"></td>
        <td><span class="label label-info"><?php echo $this->modelGetStar($record->id,4); ?> vote</span></td>
        </tr>
        <tr>
        <td style="width: 80%; padding-left: 10px;"><img src="../assets/frontend/images/star.jpg"> <img src="../assets/frontend/images/star.jpg"> <img src="../assets/frontend/images/star.jpg"> <img src="../assets/frontend/images/star.jpg"> <img src="../assets/frontend/images/star.jpg"></td>
        <td><span class="label label-success"><?php echo $this->modelGetStar($record->id,5); ?> vote</span></td>
        </tr>
        </table>
        <br>
        </div>
        <!-- /rating -->
        </div>
        </div>
        </div>
        <div class="middle">
        <ul class="list-unstyled navtabs">
        <li><a href="#tab1" class="head-tabs head-tab1 active" data-src=".head-tab1">Chi tiết sản phẩm</a></li>
        </ul>
        <div class="tab-container">
        <!-- chi tiet -->
        <?php echo $record->description; ?>
        <?php echo $record->content; ?>
        <!-- chi tiet -->
        </div>
        </div>
        </div>