<div class="avada-row">
  <div class="fusion-title title">
    <h2 class="title-heading-left">What Some Have To Say?</h2>
    <div class="title-sep-container">
      <div class="title-sep sep-double"></div>
    </div>
  </div>
  <?php if($data):?>
    <?php foreach($data as $key => $d):?>
  <div class="fusion-one-third one_third fusion-column <?php if($key==count($data)-1) echo 'last' ?>">
    <div class="fusion-testimonials fusion-testimonials-1">
      <style type="text/css">.fusion-testimonials.fusion-testimonials-1 .author:after{border-top-color:#f6f6f6 !important}</style>
      <div class="reviews">
        <div class="review male">
          <blockquote>
            <q style="background-color:#f6f6f6;color:#747474;"><?php echo html_entity_decode($d->body)?></q>
          </blockquote>
          <div class="author">
            <span class="testimonial-thumbnail doe"></span>
            <span class="company-name">
              <strong><?php echo $d->name?></strong>
              <div class="clearfix"></div>
              <span><?php echo $d->email?></span>
              <div class="clearfix"></div>
              <span><?php echo $d->phone?></span>
            </span>

          </div>
        </div>
      </div>
    </div>
  </div>
  <?php endforeach;?>
  <?php endif;?>
  <div class="fusion-clearfix"></div>
</div>