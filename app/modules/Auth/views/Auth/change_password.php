<div class="ui grid">
  <div class="four wide column"></div>
  <div class="eight wide column">

		<h1 class="ui dividing header">
			<?=lang('change_password_heading')?>
		</h1>

		<?=form_open("auth/change_password", 'class="ui form"')?>
			<div class="required field">
				<label><?=lang('change_password_old_password_label', 'old_password')?></label>
				<?=form_input($old_password)?>
			</div>
			<div class="required field">
				<label><?=sprintf(lang('change_password_new_password_label'), $min_password_length)?></label>
				<?=form_input($new_password)?>
			</div>
			<div class="required field">
				<label><?=lang('change_password_new_password_confirm_label', 'new_password_confirm')?></label>
				<?=form_input($new_password_confirm)?>
			</div>
			<?=form_input($user_id)?>
			<button class="ui button" type="submit"><?=lang('change_password_submit_btn')?></button>
			<div><?=$message?></div>
		<?=form_close()?>

	</div>
</div>

<script>
$('.ui.form').form({
	on: 'blur',
	inline: true,
	fields: {
		old: {
			identifier: 'old',
			rules: [
			{
				type: 'empty',
				prompt: 'Please enter a old password'
			},
			{
				type: 'minLength[8]',
				prompt: 'Your password must be at least {ruleValue} characters'
			}
			]
		},
		new: {
			identifier: 'new',
			rules: [
			{
				type: 'empty',
				prompt: 'Please enter a password'
			},
			{
				type: 'minLength[8]',
				prompt: 'Your password must be at least {ruleValue} characters'
			}
			]
		},
		new_confirm: {
			identifier: 'new_confirm',
			rules: [
			{
				type: 'empty',
				prompt: 'Please enter a confirm password'
			},
			{
				type: 'minLength[8]',
				prompt: 'Your password must be at least {ruleValue} characters'
			},
			{
				type: 'match[new]',
				prompt: 'Your passwords do not match'
			}
			]
		}
	}
});
</script>