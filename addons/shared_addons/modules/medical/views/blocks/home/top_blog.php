<?php if($data):?>
<div class="fusion-fullwidth fullwidth-box" style="">
  <div class="avada-row">
    <div class="fusion-recent-works layout-grid-with-excerpts portfolio portfolio-two portfolio-two-text" data-columns="two">
      <div class="portfolio-wrapper isotope" style="">
        
        <?php foreach($data as $key => $d):
          $imagePath = getImageThumb($d->image, 460, 295);
          ?>
        <div class="portfolio-item logo videography  isotope-item" style="">
          <div class="image" aria-haspopup="true">
            <img src="<?php echo $imagePath?>">
            <div class="image-extras" style="">
              <div class="image-extras-content">
                <a class="icon link-icon" href="<?php echo getBlogLink($d->created_on, $d->slug)?>"></a>
                <a class="icon gallery-icon" href="<?php echo $imagePath?>" rel="prettyPhoto[gallery_recent_1]"></a>
                <h3 class="entry-title">
                  <a href="<?php echo getBlogLink($d->created_on, $d->slug)?>" target=""><?php echo $d->title?></a>
                </h3>
              </div>
            </div>
          </div>
          <div class="portfolio-content">
            <h2>
              <a href="<?php echo getBlogLink($d->created_on, $d->slug)?>"><?php echo $d->title?></a>
            </h2>
            <h4>
              <a href="http://theme-fusion.com/avada/portfolio_category/photography/" rel="tag">Photography</a>, 
              <a href="http://theme-fusion.com/avada/portfolio_category/videography/" rel="tag">Videos</a>
            </h4>
            <div class="excerpt-container strip-html">
              <?php echo $d->intro?>
            </div>
          </div>
        </div>
        <?php endforeach;?>
      </div>
    </div>
  </div>
</div>
<?php endif;?>