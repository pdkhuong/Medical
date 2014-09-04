<?php if ($this->method == 'edit'): ?>
  <section class="title">
    <h4><?php echo sprintf("Edit %s", $post->name) ?></h4>
  </section>
<?php else: ?>
  <section class="title">
    <h4>Add Reviews</h4>
  </section>
<?php endif ?>

<section class="item">
  <div class="content">

    <?php echo form_open(uri_string(), 'class="crud"') ?>

    <div class="form_inputs">

      <ul>
        <li>
          <label for="name">Name<span>*</span></label>
          <div class="input"><?php echo form_input('name', $post->name);?></div>
        </li>
        <li>
          <label for="email">Email<span>*</span></label>
          <div class="input"><?php echo form_input('email', $post->email);?></div>
        </li>
        <li>
          <label for="phone">Phone<span>*</span></label>
          <div class="input"><?php echo form_input('phone', $post->phone);?></div>
        </li>
        <li>
          <label for="status">Status</label>
          <div class="input"><?php echo form_dropdown('status', array('draft' => 'Draft', 'live' => 'Live'), $post->status) ?></div>
        </li>
        <li class="editor">
          <label for="body">Body<span>*</span></label><br>
          <div class="input small-side">
            <?php echo form_dropdown('type', array(
              'html' => 'html',
              'markdown' => 'markdown',
              'wysiwyg-simple' => 'wysiwyg-simple',
              'wysiwyg-advanced' => 'wysiwyg-advanced',
            ), $post->type) ?>
          </div>

          <div class="edit-content">
            <?php echo form_textarea(array('id' => 'body', 'name' => 'body', 'value' => html_entity_decode($post->body), 'rows' => 30, 'class' => $post->type)) ?>
          </div>
        </li>
      </ul>

    </div>

    <div class="buttons">
      <?php $this->load->view('admin/partials/buttons', array('buttons' => array('save', 'cancel') )) ?>
    </div>

    <?php echo form_close();?>


  </div>
</section>

<script type="text/javascript">
  jQuery(function($) {
    $('form input[name="name"]').keyup($.debounce(100, function(){
      $(this).val( this.value.toLowerCase().replace(',', '') );
    }));
  });
</script>