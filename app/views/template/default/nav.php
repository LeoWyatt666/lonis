<div class="ui grid">
  <div class="computer only row">
    <div class="column">
      
      <div class="ui inverted fixed menu">
        <div class="ui container">
          <a id="hamburger-link" class="item">
            <i class="icon bars"></i>
          </a>
          <a href="#" class="header item brand">
            <img src="{image(logo.png)}" style="width: 3em; heiht: 3em;">
          </a>
          <div id="computer_menu_main" class="left menu">
            {MENU_MAIN}
          </div>
          <div id="computer_menu_user" class="right menu">
            {MENU_USER}
          </div>  
        </div>
      </div>

    </div>
  </div>

   <div class="tablet mobile only row">
    <div class="column">
     
      <div class="ui inverted fixed menu">
        <a id="hamburger-link" class="item"><i class="bars icon"></i></a>

        <div id="tablet_menu_user" class="right menu">
        </div>
      </div>

    </div>
  </div>
</div>
<div class="ui pushable">
  
  <div class="ui thin sidebar inverted vertical menu">
    <a id="hamburger-link" class="item header">
      MENU<i class="bars icon"></i>
    </a>
    <div id="sidebar_menu_main">
    </div>
    <div id="sidebar_menu_admin">
      {MENU_ADMIN}
    </div>
  </div><!-- blue menu-->
  <div class="pusher"></div>
</div>