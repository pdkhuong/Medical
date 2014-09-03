<div id="main" class="clearfix " style="">
  <div class="avada-row" style="">
    <div id="content" style="width:100%">
      <div id="post-5712" class="post-5712 page type-page status-publish hentry">
        <div class="post-content">
          <div class="woocommerce">

            <?php if (validation_errors()):?>
            <ul class="woocommerce-error">
              <li>
                <?php echo validation_errors();?>
              </li>
            </ul>
            <?php endif;?>
            <div class="col2-set" id="customer_login">
              <div class="col-1">
                <h2>Edit Profile</h2>
                <?php echo form_open_multipart('', array('id'=>'user_edit', 'class'=>'login'));?>
                <p class="form-row form-row-wide">
                  <label for="email">Email <span class="required">*</span></label>
                  <input type="text" class="input-text" name="email" id="email" value="<?php echo $_user->email ?>">
                </p>
                <p class="form-row form-row-wide">
                  <label for="email">Display name <span class="required">*</span></label>
                  <input type="text" class="input-text" name="display_name" id="display_name" value="<?php echo $_user->display_name ?>">
                </p>
                <?php
                foreach($profile_fields as $field):
                  if($field['required'] && $field['field_slug'] != 'display_name') :
                    ?>
                    <p class="form-row form-row-wide">
                      <label for="<?php echo $field['field_slug'] ?>"><?php echo (lang($field['field_name'])) ? lang($field['field_name']) : $field['field_name'];  ?><span class="required">*</span></label>
                      <input type="text" class="input-text" name="<?php echo $field['field_slug'] ?>" id="<?php echo $field['field_slug'] ?>" value="<?php echo $field['value'] ?>">
                    </p>
                  <?php
                  endif;
                endforeach
                ?>
                <p class="form-row form-row-wide">
                  <label for="password">Password <span class="required">*</span></label>
                  <input class="input-text" type="password" name="password" id="password">
                </p>

                <p class="form-row">
                  <input type="submit" class="button" name="profile_save_btn" value="Save profile">
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
