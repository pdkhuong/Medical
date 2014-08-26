<?php if(0):?>
<h2>Recent Travelo News</h2>
<div class="image-carousel style2" data-animation="slide" data-item-width="370" data-item-margin="30">
  <ul class="slides image-box style10">
    <?php foreach($data as $key => $d):
      ?>
    <li class="box post">
      <figure>
        <a href="<?php echo getBlogLink($d->created_on, $d->slug)?>" class="hover-effect"><img src="<?php echo getImageThumb($d->image, 360, 250)?>" alt="" /></a>
        <figcaption class="entry-date">
          <label class="date"><?php echo date('d', $d->created_on)?></label>
          <label class="month"><?php echo date('M', $d->created_on)?></label>
        </figcaption>
      </figure>
      <div class="details">
        <a href="<?php echo getBlogLink($d->created_on, $d->slug)?>" class="button">MORE</a>
        <h4 class="post-title entry-title"><?php echo $d->title?></h4>
        <div class="post-meta single-line-meta vcard">
          By <span class="fn"><a rel="author" href="#" class="author">admin</a></span>
          <span class="sep">|</span>
          <a href="#" class="comment">1 COMMENT</a>
        </div>
      </div>
    </li>
    <?php endforeach;?>
    
  </ul>
</div>
<?php endif;?>