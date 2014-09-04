<div class="avada-row">
  <h1 style="text-align: center; font-size: 30px !important;">Over 70,000 Users, Let’s See What Some Have To Say?</h1>
  <p style="text-align: center; margin-top: -10px; font-size: 17px;">We love our users and are fully dedicated to keeping their trust by offering amazing updates and
        <span class="fusion-tooltip tooltip-shortcode" data-animation="" data-delay="" data-placement="top" data-title="94% of Users Recommend Avada" data-toggle="tooltip" data-trigger="hover" data-original-title="" title="">
            <strong>outstanding</strong>
        </span> after sale support!
  </p>
  <div class="fusion-sep-clear"></div>
  <div class="fusion-separator sep-none" style="border-color:#e0dede;margin-top:20px;"></div>

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