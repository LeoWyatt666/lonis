<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>General Protection Fault - 404</title>
<script type="text/javascript">
function disableEnterKey(e)
{
    var key = (e.keyCode ? e.keyCode : e.which);
    
    if (key == 13) {
        window.location='<?=base_url()?>';
    }
    else {
        window.location='http://cartoonnetwork.com/';
    }   
}

</script>
</head>
<body alink="#ff0000" bgcolor="#000099" link="#ffffff" text="#ffffff" vlink="#ffffff" onKeyPress="return disableEnterKey(event)">
<br>
<br>

<br>
<center>
<table bgColor="#cccccc" border=0>
<tr>
<td><tt><b><font color="#000099">&nbsp;ERROR 404&nbsp;</font></b></tt></td>
</tr></table>
<p>
<table width="80%" border="0" cellpadding="10"><tr><td>

<tt>A Fatal exception <strong><?php echo $heading; ?></strong>
<br><?php echo $message; ?>
It is possible to continue normally.
<br>
<br>* Press any key to attempt to continue
<br>* Press CTRL+ALT+DEL to restart your computer. You will lose any unsaved information in all applications
<br>* Inform your local MSCE about this exception and wait for help.
<br><br>
Press enter key to <a href="<?=base_url()?>">continue</a><br>
Press esc key to <a href="http://www.cartoonnetwork.com/">clean your brain</a>&nbsp;_<br>

</td></tr></table>
</tt>
</center>

<small></small>

</body>
</html>
