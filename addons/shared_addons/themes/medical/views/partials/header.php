<header id="header" class="navbar-static-top">
  <div class="topnav hidden-xs">
    <div class="container">
      <ul class="quick-menu pull-left">
        <li><a href="<?php echo base_url().'edit-profile'?>">My Account</a></li>
      </ul>
      <ul class="quick-menu pull-right">
        <?php if($this->current_user):?>
        <li><a href="<?php echo base_url().'users/logout'?>">LOGOUT</a></li>
        <?php else:?>
        <li><a href="<?php echo base_url().'users/login'?>">LOGIN</a></li>
        <li><a href="<?php echo base_url().'users/register'?>">Singup</a></li>
        <?php endif;?>

        <li class="ribbon currency hide">
          <a href="#" title="">USD</a>
          <ul class="menu mini">
            <li><a href="#" title="AUD">AUD</a></li>
            <li><a href="#" title="BRL">BRL</a></li>
            <li class="active"><a href="#" title="USD">USD</a></li>
            <li><a href="#" title="CAD">CAD</a></li>
            <li><a href="#" title="CHF">CHF</a></li>
            <li><a href="#" title="CNY">CNY</a></li>
            <li><a href="#" title="CZK">CZK</a></li>
            <li><a href="#" title="DKK">DKK</a></li>
            <li><a href="#" title="EUR">EUR</a></li>
            <li><a href="#" title="GBP">GBP</a></li>
            <li><a href="#" title="HKD">HKD</a></li>
            <li><a href="#" title="HUF">HUF</a></li>
            <li><a href="#" title="IDR">IDR</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>

  <div class="main-header">

    <a href="#mobile-menu-01" data-toggle="collapse" class="mobile-menu-toggle">
      Mobile Menu Toggle
    </a>

    <div class="container">
      <h1 class="logo navbar-brand">
        <a href="index.html" title="Travelo - home">
          <img src="<?php echo img_path("logo.png") ?>" alt="Travelo HTML5 Template" />
        </a>
      </h1>

      <?php theme_partial('main_menu') ?>
    </div>
    <?php theme_partial('mobile_menu') ?>
  </div>
</header>