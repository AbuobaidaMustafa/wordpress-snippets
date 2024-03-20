<?php 
function force_post_title() 
{
	$validation_message = _("العنوان لا يمكن أن يكون فارغ");

  echo "<script type='text/javascript'>\n";
  echo "
  jQuery('#publish').click(function(){
        var testervar = jQuery('[id^=\"titlediv\"]')
        .find('#title');
        if (testervar.val().length < 1)
        {
            var validator_snippet = '<div style=\"padding: 10px; color: #fff; margin-top: -3px; background: #F55E4F;\">" . $validation_message . "</div>';                    
          jQuery('[id^=\"titlediv\"]').find('#titlewrap').append(validator_snippet);          
          setTimeout(\"jQuery('#publish').removeClass('button-primary-disabled');\", 100);
          return false;

        }
    });
  ";
   echo "</script>\n";
}
add_action('edit_form_advanced', 'force_post_title');
?>
