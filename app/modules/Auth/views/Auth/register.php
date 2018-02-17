<div class="ui text container">
	<div class="ui segments">
		<div class="ui center aligned segment">
			<h5>
				Sign Up
			</h5>
		</div>
		<div class="ui segment">
			{form_open(auth/register,class="ui form")}
				<div class="two fields">
					<div class="required field">
						<label>Username</label>
						<input name="username" type="text" value="{set_value(username)}">
					</div>
					<div class="required field">
						<label>Email</label>
						<input name="email" type="email" value="{set_value(email)}">
					</div>
				</div>
				<div class="two fields">
					<div class="required field">
						<label>Password</label>
						<input type="password" name="password">
					</div>
					<div class="required field">
						<label>Confirm password</label>
						<input type="password" name="repassword">
					</div>
				</div>
				<div class="inline required field">
					<div class="ui checkbox">
						<input type="checkbox" name="terms">
						<label class="modalTerms" style="text-decoration:underline;cursor:pointer">
							I agree to the terms and conditions
						</label>
					</div>
				</div>
				<button class="ui blue submit fluid button">Sign Up</button>
				<div class="ui error message"></div>
				<br><div style="color: red; text-align: center;">{message}</div>
			{form_close()}
		</div>
		<div class="ui  center aligned segment">
			Already have an account? <a href="auth/login" class="ui">Sign In</a>
		</div>
	</div>
</div>

<script>
$('.ui.form').form({
	on: 'blur',
	inline: true,
	fields: {
		username: {
			identifier: 'username',
			rules: [
			{
				type: 'empty',
				prompt: 'Please enter your username'
			},
			{
				type: 'minLength[3]',
				prompt: 'Your password must be at least {ruleValue} characters'
			}
			]
		},
		email: {
			identifier: 'email',
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
		},
		password: {
			identifier: 'password',
			rules: [
			{
				type: 'empty',
				prompt: 'Please enter a password'
			},
			{
				type: 'minLength[6]',
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
				type: 'minLength[6]',
				prompt: 'Your password must be at least {ruleValue} characters'
			},
			{
				type: 'match[password]',
				prompt: 'Your passwords do not match'
			}
			]
		},
		terms: {
			identifier: 'terms',
			rules: [
			{
				type: 'checked',
				prompt: 'You must agree to the terms and conditions'
			}
			]
		}
	}
});
</script>