<div class="slider">
    <div class="callbacks_container">
       <ul class="rslides" id="slider">
           <li>
         <div class="banner1">          
            <div class="banner-info">
            <h3>Morbi lacus hendrerit efficitur.</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. consectetur adipiscing elit. consectetur adipiscing elit.</p>
            </div>
         </div>
           </li>
           <li>
         <div class="banner2">
           <div class="banner-info">
           <h3>Phasellus elementum tincidunt.</h3>
           <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. consectetur adipiscing elit. consectetur adipiscing elit.</p>
           </div>
         </div>
       </li>
           <li>
               <div class="banner3">
             <div class="banner-info">
             <h3>Maecenas interposuere volutpat.</h3>
               <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. consectetur adipiscing elit. consectetur adipiscing elit.</p>
         </div>
         </div>
           </li>
        </ul>
    </div>
  </div>
<!---->
<script src="<?php echo base_url() ?>lighting_web/js/bootstrap.js"> </script>

<div class="items">
   <div class="container">
    <div class="items-sec">
      <?php foreach ($products as $key => $product) { ?>
       <div class="col-md-3 feature-grid">
         <a href="product.html"><img src="<?php echo base_url() ?>assets/pictures/<?php echo $product['gambar'] ?>" alt="" height="200"/> 
           <div class="arrival-info" style="text-align: center;">
             <h4><?php echo $product['nama_produk'] ?></h4>
             <p>Rp <?php echo number_format($product['harga'], 0 ,',','.') ?></p>
             <!-- <span class="pric1"><del>Rs 18000</del></span>
             <span class="disc">[12% Off]</span> -->
           </div>
           <div class="viw">
            <a href="<?php echo base_url() ?>katalog_produk/detail/<?php echo $product['kd_produk'] ?>"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>View</a>
           </div>
          </a>
       </div>
      <?php } ?>
    </div>
  </div>
</div>
<!---->