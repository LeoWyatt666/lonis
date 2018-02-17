<div class="ui three column grid">
    <div class="column"></div>
    <div class="column">
        <div class="ui segments">
            <div class="ui center aligned segment">
                <h5 class="ui header">
                    {lang(forgot_password_heading)}
                </h5>
            </div>
            <div class="ui center aligned segment">
                {form_open(auth/forgot_password,class="ui form")}
                    <div class="required field">
                        <label>Email</label>
                        <?=form_input($identity)?>
                    </div>
                    <button class="ui blue fluid submit button">
                        {lang(forgot_password_submit_btn)}
                    </button>
                    <div class="ui error message"></div>
                    <div style="color: red; text-align: center;">{message}</div>
                {form_close()}
            </div>
            <div class="ui center aligned segment">
                Do not have an account? <a href="auth/register" class="ui">Sign Up</a>
            </div>
        </div>
    </div>
    <div class="ui five column"></div>
</div>

<script>
$('.ui.form').form({
    on: 'blur',
    inline: true,
	fields: {
		identity: {
			identifier: 'identity',
			rules: [
			{
				type: 'empty',
				prompt: 'Please enter your email'
			},
            {
				type: 'email',
				prompt: 'Please enter valid email'
			}
			]
		}
    },
});
</script>
