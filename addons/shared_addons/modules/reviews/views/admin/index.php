<div class="one_full">
  <section class="title">
    <h4><?php echo lang('blog:posts_title') ?></h4>
  </section>

  <section class="item">
    <div class="content">
      <?php if ($reviews) : ?>

        <?php echo form_open('admin/reviews/action') ?>
        <div id="filter-stage">
          <?php echo $this->load->view('admin/tables/posts') ?>
        </div>
        <?php echo form_close() ?>
      <?php else : ?>
        <div class="no_data">No reviews</div>
      <?php endif ?>
    </div>
  </section>
</div>
