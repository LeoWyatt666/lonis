<div class="ui grid">
    <div class="four wide column"></div>
    <div class="eight wide column">
        <div class="ui text segments">
            <div class="ui center aligned segment">
                <h5 class="ui ">
                    Sign In
                </h5>
            </div>
            <div class="ui segment">
                {form_open(auth/login,class="ui form")}
                    <div class="required field">
                        <!-- <label>Email</label> -->
                        <div class="ui left icon input">
                            <i class="user icon"></i>
                            <?=form_input($identity)?>
                        </div>
                    </div>
                    <div class="required field">
                        <!-- <label>Password</label> -->
                        <div class="ui left icon input">
                            <i class="lock icon"></i>
                            <?=form_input($password)?>
                        </div>
                    </div>
                    <div class="inline required field">
                        <div class="ui checkbox">
                            <input type="checkbox" name="remember" value="1" checked>
                            <label>Remember</label>
                        </div>
                    </div>
                    <button class="ui blue submit fluid button">Sign In</button>
                    <div class="ui error message"></div>
                    <div style="color: red; text-align: center; padding-top: 10px;">{message}</div>
                {form_close()}
                <div class="ui horizontal divider">Or sign in with</div>
                <div id="hauth" align="center" data-url="{base_url(hauth)}"></div>
            </div>
            <div class="ui center aligned segment">
                Do not have an account? <a href="auth/register" class="ui">Sign Up</a>
                <p>Forgot password? <a href="auth/forgot_password" class="ui">Recover</a>
            </div>
        </div>
	</div>
</div>

<script>
$(document).ready(function() {
    $.ajax({
    url: $('#hauth').data('url'),
    success: function($data){
        $('#hauth').html($data);
    }
    });

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
            }
        },
    });
} );
</script>