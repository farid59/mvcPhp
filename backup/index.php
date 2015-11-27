<?php
include "header.php";
include "menu.php";


foreach($contacts as $contact)
{

	echo "<div class=\"col-md-12\">".
         "<div class=\"msg msg-info\">".$contact['nom']." </div></div>";
}

include "footer.php";