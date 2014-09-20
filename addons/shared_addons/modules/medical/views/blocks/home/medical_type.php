<div class="avada-row">
  <?php foreach($this->config->config['medical']['home_medical_type'] as $k => $type):?>
    <div class="fusion-one-third one_third fusion-column  <?php if($k==2) echo 'last'?>">
      <div class="fusion-title title">
          <h2 class="title-heading-left"><?php echo $type['name']?></h2>
          <div class="title-sep-container">
              <div class="title-sep sep-double"></div>
          </div>
      </div>
      <div class="fusion-flexslider flexslider flexslider-posts">
        <ul class="slides">
            <?php foreach($type['items'] as $item):?>
            <li class="" style="width: 100%; float: left; margin-right: -100%; position: relative; opacity: 0; display: block; z-index: 1;">
                <a href="<?php echo $item['link']?>">
                    <img src="<?php echo image_path($item['image'])?>" alt="<?php echo $item['name']?>" draggable="false">
                    </a>
                    <div class="slide-excerpt">
                        <h2>
                            <a  style="color: #fff !important;" href="<?php echo $item['link']?>"><?php echo $item['name']?></a>
                        </h2>
                    </div>
                </li>
                <?php endforeach;?>
                </ul>
                
            </div>
        </div>
    <?php endforeach;?>

    <div class="fusion-clearfix"></div>
</div>