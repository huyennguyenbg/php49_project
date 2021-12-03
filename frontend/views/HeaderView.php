<!-- header -->
<header id="header">
<!-- top header -->
<div class="top-header">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-6 col-md-6"> <span><i class="fa fa-phone"></i> (04) 6674 2332</span> <span><i class="fa fa-envelope-o"></i> <a href="mailto:support@mail.com">support@mail.com</a></span> </div>

      <?php if(isset($_SESSION["customer_email"])): ?>
        <div class="col-xs-12 col-sm-6 col-md-6 customer"> <a href="#">Xin chào <?php echo $_SESSION["customer_email"]; ?></a>&nbsp; &nbsp;<a href="index.php?controller=account&action=logout">Đăng xuất</a> </div>
        <?php else: ?>
      <div class="col-xs-12 col-sm-6 col-md-6 customer"> <a href="index.php?controller=account&action=login">Đăng nhập</a>&nbsp; &nbsp;<a href="index.php?controller=account&action=register">Đăng ký</a> </div>
    <?php endif; ?>
    
    </div>
  </div>
</div>
<!-- end top header --> 
<!-- middle header -->
<div class="mid-header">
<div class="container">
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-3 logo "> <a href="index.html"> <img src="../assets/frontend/100/047/633/themes/517833/assets/logo221b.png?1481775169361" alt="DKT Store" title="DKT Store" class="img-responsive"> </a> </div>
    <script type="text/javascript">
      function search(){
        var key = document.getElementById('key').value;
        //di chuyen den trang search
        location.href="index.php?controller=search&action=productName&key="+key;
      }
      //---
      function smartSearch(){
        var key = document.getElementById('key').value;
        if(key != ""){
          document.getElementById('smart-search').setAttribute("style","display:block;");
          //---
          $.ajax({
            url: "index.php?controller=search&action=smartSearch&key="+key,
            success: function( result ) {
              $( "#smart-search ul" ).empty();
              $( "#smart-search ul" ).append(result);
            }
          });
          //---
        }else{
          document.getElementById('smart-search').setAttribute("style","display:none;");
        }
      }
      //---
    </script>
    <div class="col-xs-12 col-sm-12 col-md-6 header-search"> 
      <!--<form method="post" id="frm" action="">-->
      <div style="margin-top:25px;" style="position: relative;">
        <input type="text" onkeyup ="smartSearch();" value="" placeholder="Nhập từ khóa tìm kiếm..." id="key" class="input-control">
        <button style="margin-top:5px;" type="submit"> <i class="fa fa-search" onclick="return search();"></i> </button>
      </div>
      <!--</form>--> 
      <style type="text/css">
        #smart-search ul{padding:0px; margin:0px; list-style: none;}
        #smart-search ul li{border-bottom: 1px solid #dddddd;}
        #smart-search{position: absolute; width: 100%; z-index: 1; background: white; display: none;}
      </style>
      <div id="smart-search">
        <ul>
        </ul>
      </div>
    </div>
    <?php 
        $numberOfProduct = 0;
        if(isset($_SESSION["cart"])){
          foreach($_SESSION["cart"] as $rows)
            $numberOfProduct++;
        }
     ?>
    <div class="col-xs-12 col-sm-12 col-md-3 mini-cart">
      <div class="wrapper-mini-cart"> <span class="icon"><i class="fa fa-shopping-cart"></i></span> <a href="cart"> <span class="mini-cart-count"> <?php echo $numberOfProduct; ?> </span> sản phẩm <i class="fa fa-caret-down"></i></a>
        <div class="content-mini-cart">
          <div class="has-items">
            <ul class="list-unstyled">
              <?php foreach($_SESSION["cart"] as $rows): ?>
              <li class="clearfix" id="item-1853038">
                <div class="image"> <a href="index.php?controller=products&action=detail&id=<?php echo $rows["id"]; ?>"> <img alt="<?php echo $rows["name"]; ?>" src="../assets/upload/products/<?php echo $rows["photo"]; ?>" title="<?php echo $rows["name"]; ?>" class="img-responsive"> </a> </div>
                <div class="info">
                  <h3><a href="index.php?controller=products&action=detail&id=<?php echo $rows["id"]; ?>"><?php echo $rows["name"]; ?></a></h3>
                  <p><?php echo $rows["number"]; ?> x <?php echo $rows["price"]-($rows["price"]*$rows["discount"]/100); ?>₫</p>
                </div>
                <div> <a href="index.php?controller=cart&action=remove&id=<?php echo $rows["id"]; ?>"> <i class="fa fa-times"></i></a> </div>
              </li>
              <?php endforeach; ?>
            </ul>
            <a href="index.php?controller=cart&action=checkOut" class="button">Thanh toán</a> </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end middle header --> 
<!-- bottom header -->
<div class="bottom-header">
  <div class="container">
    <div class="clearfix">
      <ul class="main-nav hidden-xs hidden-sm list-unstyled">
        <li class="active"><a href="index.php">Trang chủ</a></li>
        <li class="has-submenu"> <a href="#"> <span>Sản phẩm</span><i class="fa fa-caret-down" style="margin-left: 5px;"></i> </a>
          <?php 
              //load MVC bang tay
              include "controllers/CategoriesController.php";
              $obj = new CategoriesController();
              $obj->index();
           ?>
        </li>
        <li><a href="index.php?controller=cart">Giỏ hàng</a></li>
        <li><a href="index.php?controller=news">Tin tức</a></li>
        <li><a href="index.php?controller=contact">Liên hệ</a></li>
      </ul>
      <a href="javascript:void(0);" class="toggle-main-menu hidden-md hidden-lg"> <i class="fa fa-bars"></i> </a>
      <ul class="list-unstyled mobile-main-menu hidden-md hidden-lg" style="display:none">
        <li class="active"><a href="index.php">Trang chủ</a></li>
        <li><a href="#">Giới thiệu</a></li>
        <li><a href="index.php?controller=tintuc">Tin tức</a></li>
        <li><a href="index.php?controller=lienhe">Liên hệ</a></li>
      </ul>
    </div>
  </div>
</div>
<!-- end bottom header -->
</header>
<!-- end header -->