<div class="ui grid">
  <div class="four wide column"></div>
  <div class="eight wide column">

    <?=form_open(uri_string(), 'class="ui form"')?>
      <h1 class="ui dividing header">
        <?=lang('edit_user_heading')?>
      </h1>
      <h4>
        <?=lang('edit_user_subheading')?>
      </h4>

      <div class="two fields">
        <div class="field">
          <label>
            <?=lang('Email', 'email')?>
          </label>
          <?=form_input($email, '', 'readonly=""')?>
        </div>
        <div class="field">
          <label>
            <?=lang('Password', 'password')?>
          </label>
          <a href="auth/change_password" class="ui button"><?=lang('Change', 'change')?></a>
        </div>
      </div>

      <div class="field">
        <label>
          <?=lang('edit_user_fname_label', 'first_name')?>
        </label>
        <?=form_input($first_name)?>
      </div>

      <div class="field">
        <label>
          <?=lang('edit_user_lname_label', 'last_name')?>
        </label>
        <?=form_input($last_name)?>
      </div>

      <div class="field">
        <label>
          <?=lang('edit_user_company_label', 'company')?>
        </label>
        <?=form_input($company)?>
      </div>

      <div class="field">
        <label>
          <?=lang('edit_user_phone_label', 'phone')?>
        </label>
        <?=form_input($phone)?>
      </div>

      <?php if ($this->ion_auth->is_admin()) : ?>
      <div class="field">
        <label>
          <?=lang('edit_user_password_label', 'password')?>
        </label>
        <?=form_input($password)?>
      </div>

      <div class="field">
        <label>
          <?=lang('edit_user_password_confirm_label', 'password_confirm')?>
        </label>
        <?=form_input($password_confirm)?>
      </div>

      <div class="field">
        <h3><?=lang('edit_user_groups_heading')?></h3>
          <?php foreach ($groups as $group) :?>
            <label class="checkbox">
              <?php
                $gID=$group['id'];
                $checked = null;
                $item = null;
              foreach ($currentGroups as $grp) {
                  if ($gID == $grp->id) {
                      $checked= ' checked="checked"';
                      break;
                  }
              }
              ?>
            <input type="checkbox" name="groups[]" value="<?=$group['id']?>"<?=$checked?>>
              <?=htmlspecialchars($group['name'], ENT_QUOTES, 'UTF-8')?>
            </label>
          <?php endforeach?>
      </div>
      <?php endif ?>

      <?=form_hidden('id', $user->id)?>
      <?=form_hidden($csrf); ?>

      <div id="infoMessage"><?=$message?></div>

      <p><?=form_submit('submit', lang('edit_user_submit_btn'), 'class="ui button"')?></p>

      <?=form_close()?>
  </div>
</div>