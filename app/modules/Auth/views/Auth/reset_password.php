<div class="ui three column grid">
    <div class="column"></div>
    <div class="column">
		<div class="ui segments">
            <div class="ui center aligned segment">
                <h5 class="ui header">
					<?=lang('reset_password_heading')?>
                </h5>
            </div>
            <div class="ui segment">
				<?=form_open('auth/reset_password/'.$code, 'class="ui form"')?>
					<div class="required field">
						<label><l>New password</l>:</label>
						<?=form_input($new_password)?>
					</div>
					<div class="required field">
						<label><?=lang('reset_password_new_password_confirm_label', 'new_password_confirm')?> </label>
						<?=form_input($new_password_confirm)?>
					</div>
                    <button class="ui blue submit fluid button"><?= lang('reset_password_submit_btn')?></button>
                    <div class="ui error message"></div>
					<div style="color: red; text-align: center;"><?=$message?></div>
				
					<?=form_input($user_id)?>
					<?=form_hidden($csrf)?>
                <?=form_close()?>
            </div>
        </div>
	</div>
</div>

<script>
$('.ui.form').form({
	on: 'blur',
	inline: true,
	fields: {
		password: {
			identifier: 'password',
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
		repassword: {
			identifier: 'repassword',
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
				type: 'match[password]',
				prompt: 'Your passwords do not match'
			}
			]
		}
	}
});
</script>