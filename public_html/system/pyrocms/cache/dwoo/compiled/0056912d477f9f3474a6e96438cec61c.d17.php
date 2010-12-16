<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><!-- Page layout: Default -->
<h2>Page missing</h2>


Welcome to our homepage. We have not quite finished setting up our website yet, but please add us to your bookmarks and come back soon.
<?php  /* end template body */
return $this->buffer . ob_get_clean();
?>