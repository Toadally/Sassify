<?php

add_action("admin_menu","sassify_menu");

function sassify_menu(){
  if(current_user_can("administrator")){
    $menu = add_menu_page("Sassify","Sassify",4,"sassify","sassify_page","https://cdn2.iconfinder.com/data/icons/designer-skills/128/sass-20.png");
      /*  */
    add_action( 'load-' . $menu, 'load_admin_js' );

  }
}

function sassify_page(){

  echo "<form id='sassify_conf' action='options.php' method='post' accept-charset='UTF-8'><div id='admin-top'> <style>#scsseditor, #lesseditor { position: relative; top: 0; left: 0; right: 0; bottom: 0; height: 50vh; width: 90%; margin-left: 5%; }</style>";
  settings_fields( 'sassify' );
  do_settings_sections( 'sassify' );
  echo '
  <center><h1>Sassify</h1>
  <br>
  <h2>SCSS</h2></center>
  <textarea id="ace-scss-data" name="sassify_scss" style="display: none"></textarea>
  <center><h2>LESS</h2></center>
  <textarea id="ace-less-data" name="sassify_less" style="display: none"></textarea>
  <div id="scsseditor" style="margin-top: 30px">'. get_option('sassify_scss') . '</div><br>
  <div id="lesseditor" style="margin-top: 30px">'. get_option('sassify_less') . '</div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.9/ace.js"></script>
  <script>var editor = ace.edit("scsseditor");
    editor.setTheme("ace/theme/tomorrow_night");
    editor.session.setMode("ace/mode/scss");
    document.getElementById('.'"ace-scss-data"'.').value = editor.session.getValue();

    editor.session.on("change", function(){
      document.getElementById('.'"ace-scss-data"'.').value = editor.session.getValue();
    });

    var lesseditor = ace.edit("lesseditor");
      lesseditor.setTheme("ace/theme/tomorrow_night");
      lesseditor.session.setMode("ace/mode/less);
      document.getElementById('.'"ace-less-data"'.').value = lesseditor.session.getValue();

      lesseditor.session.on("change", function(){
        document.getElementById('.'"ace-less-data"'.').value = lessditor.session.getValue();
      });

</script>
<center>';
submit_button();
echo '</center></div></form>';


}
?>
