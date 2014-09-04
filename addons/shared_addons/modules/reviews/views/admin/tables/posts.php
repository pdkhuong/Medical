	<table cellspacing="0">
		<thead>
			<tr>
				<th width="20"><?php echo form_checkbox(array('name' => 'action_to_all', 'class' => 'check-all')) ?></th>
				<th class="collapse">Name</th>
				<th class="collapse">Email</th>
				<th class="collapse">Content</th>
        <th class="collapse">Phone</th>
				<th>Status</th>
				<th width="180"><?php echo lang('global:actions') ?></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($reviews as $post) : ?>
				<tr>
					<td><?php echo form_checkbox('action_to[]', $post->id) ?></td>
					<td><?php echo $post->name ?></td>
					<td class="collapse"><?php echo $post->email ?></td>
					<td class="collapse"><?php echo html_entity_decode($post->body) ?></td>
          <td class="collapse"><?php echo $post->phone ?></td>
					<td class="collapse"><?php echo ucfirst($post->status) ?></td>
					<td style="padding-top:10px;">
						<a href="<?php echo site_url('admin/reviews/edit/' . $post->id) ?>" title="<?php echo lang('global:edit')?>" class="button"><?php echo lang('global:edit')?></a>
						<a href="<?php echo site_url('admin/reviews/delete/' . $post->id) ?>" title="<?php echo lang('global:delete')?>" class="button confirm"><?php echo lang('global:delete')?></a>
					</td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>

	<?php $this->load->view('admin/partials/pagination') ?>

	<br>

	<div class="table_action_buttons">
		<?php $this->load->view('admin/partials/buttons', array('buttons' => array('delete', 'publish'))) ?>
	</div>