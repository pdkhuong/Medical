<div id="main" class="clearfix " style="">
  <div class="avada-row" style="">
    <div id="content" style="width:100%">
      <div id="post-5712" class="post-5712 page type-page status-publish hentry">
        <div class="post-content">
          <div class="woocommerce">
            {{ theme:partial name="notices" }}
            
            <div class="col2-set" id="customer_login">
              <div class="col-1">
                <h2>Login</h2>
                <?php echo form_open('users/login', array('id'=>'login', 'class'=>'login'), array('redirect_to' => $redirect_to)) ?>
                  <p class="form-row form-row-wide">
                    <label for="username">Email <span class="required">*</span></label>
                    <input type="text" class="input-text" name="email" id="email" value="<?php echo $_user->email ?>">
                  </p>
                  <p class="form-row form-row-wide">
                    <label for="password">Password <span class="required">*</span></label>
                    <input class="input-text" type="password" name="password" id="password">
                  </p>
                  <p class="form-row">
                    <input type="submit" class="button" name="login" value="Login">
                    <label for="rememberme" class="inline">
                      <?php echo form_checkbox('remember', '1', false) ?>
                      <?php echo lang('user:remember') ?>
                    </label>
                  </p>
                  <p class="lost_password">
                    <?php echo anchor('users/reset_pass', lang('user:reset_password_link'));?>
                  </p>
                <?php echo form_close() ?>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>