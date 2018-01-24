<?php

add_action("admin_menu","sassify_menu");

function sassify_menu(){
  if(current_user_can("administrator")){
    $menu = add_menu_page("Sassify","Sassify",4,"sassify","sassify_page","https://cdn2.iconfinder.com/data/icons/designer-skills/128/sass-20.png");

    $submenu = add_submenu_page( 'sassify', 'Edit SCSS', 'Edit SCSS', 'manage_options', 'sassify_scss_page', 'scss_page' );
    $submenu2 = add_submenu_page( 'sassify', 'Edit LESS', 'Edit LESS', 'manage_options', 'sassify_less_page', 'less_page' );

  }
}
function getSubmit(){
  echo '<p class="submit"><input style="margin: auto; display: block" type="submit" name="submit" id="submit" class="button button-primary sassify-submit-button" value="Save Changes"></p>';
}
function showScss(){
  echo '
        <center><h2>SCSS Editor</h2></center>
        <div id="scsseditor" style="margin-top: 30px">'. get_option('sassify_scss') . '</div><br>
        <textarea id="ace-scss-data" name="sassify_scss" style="display: none"></textarea>';
}

function showScssJs(){
  echo '
  <script>var editor = ace.edit("scsseditor");
    editor.setTheme("ace/theme/tomorrow_night");
    editor.session.setMode("ace/mode/scss");
    document.getElementById('.'"ace-scss-data"'.').value = editor.session.getValue();

    editor.session.on("change", function(){
      document.getElementById('.'"ace-scss-data"'.').value = editor.session.getValue();
    });</script>
  ';
}

function showLess(){
  echo '
        <center><h2>LESS Editor</h2></center>
        <div id="lesseditor" style="margin-top: 30px">'. get_option('sassify_less') . '</div><br>
        <textarea id="ace-less-data" name="sassify_less" style="display: none"></textarea>';
}

function showLessJs(){
  echo '
  <script>var editor2 = ace.edit("lesseditor");
    editor2.setTheme("ace/theme/tomorrow_night");
    editor2.session.setMode("ace/mode/less");
    document.getElementById('.'"ace-less-data"'.').value = editor2.session.getValue();

    editor2.session.on("change", function(){
      document.getElementById('.'"ace-less-data"'.').value = editor2.session.getValue();
    });</script>
  ';
}

function getAceScript(){
  echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.9/ace.js"></script>';
}

function sassify_page(){

  echo "<form id='sassify_conf' action='options.php' method='post' accept-charset='UTF-8'><div id='admin-top'> <style>#scsseditor, #lesseditor { position: relative; top: 0; left: 0; right: 0; bottom: 0; height: 50vh; width: 95%; margin-left: 2.5%; }</style>";
  settings_fields( 'sassify' );
  do_settings_sections( 'sassify' );
  echo '<center><h1>Sassify</h1></center>';

  showScss();
  showLess();

  getAceScript();
  showScssJs();
  showLessJs();
  getSubmit(); echo '</center></div></form>';
}

function scss_page(){

  echo "<form id='sassify_conf' action='options.php' method='post' accept-charset='UTF-8'><div id='admin-top'> <style>#scsseditor, #lesseditor { position: relative; top: 0; left: 0; right: 0; bottom: 0; height: 50vh; width: 95%; margin-left: 2.5%; }</style>";
  settings_fields( 'sassify' );
  do_settings_sections( 'sassify' );
  echo '<center><h1>Sassify SCSS</h1></center>';

  showScss();

  getAceScript();
  showScssJs();

  getSubmit(); echo '</center></div></form>';
}


function less_page(){

  echo "<form id='sassify_conf' action='options.php' method='post' accept-charset='UTF-8'><div id='admin-top'> <style>#scsseditor, #lesseditor { position: relative; top: 0; left: 0; right: 0; bottom: 0; height: 50vh; width: 95%; margin-left: 2.5%;


  }</style>";
  settings_fields( 'sassify' );
  do_settings_sections( 'sassify' );
  echo '<center><h1>Sassify LESS</h1></center>';

  showLess();

  getAceScript();
  showLessJs();

  getSubmit(); echo '</center></div></form>';
}
?>
