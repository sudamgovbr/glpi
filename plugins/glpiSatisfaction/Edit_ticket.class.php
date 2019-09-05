<?

//==================================================================================================//
//==    Customzação do GLPI - Desenvolvido por Issac Costa, Renato Lázaro e Ana Costa - ©2016     ==//
//==    Homepage: https://sourceforge.net/projects/glpisatisfaction/                              ==//
//==    E-mail: isaac@isaac.net.br          renatolazaroch@gmail.com                              ==//
//==================================================================================================//

/* Este é o código original do GLPI: */

     if ($_SESSION["glpiactiveprofile"]["interface"] != "central") {
         echo "<a href=\"".$CFG_GLPI["root_doc"]."/front/helpdesk.public.php?create_ticket=1\">".
                __('Create a ticket')."&nbsp;<img src='".$CFG_GLPI["root_doc"].
                "/pics/menu_add.png' title=\"". __s('Add')."\" alt=\"".__s('Add')."\"></a>";
      } else {
         echo "<a href=\"".$CFG_GLPI["root_doc"]."/front/ticket.php?".
                Toolbox::append_params($options,'&amp;')."\">".__('Ticket followup')."</a>";
      }
      echo "</th></tr>";
      echo "<tr><th>"._n('Ticket','Tickets', Session::getPluralNumber())."</th><th>"._x('quantity', 'Number')."</th></tr>";
	  
/* Altere para: */

      if ($_SESSION["glpiactiveprofile"]["interface"] != "central") {
        /* Isaac Costa - Custom - Oculta o segundo link de criação de chamado (interface simplificada conforme imagens 01) */
		/* echo "<a href=\"".$CFG_GLPI["root_doc"]."/front/helpdesk.public.php?create_ticket=1\">". 
                __('Create a ticket')."&nbsp;<img src='".$CFG_GLPI["root_doc"].
                "/pics/menu_add.png' title=\"". __s('Add')."\" alt=\"".__s('Add')."\"></a>"; */
		/* Isaac Costa - Custom - Oculta o segundo link de criação de chamado (interface simplificada conforme imagens 01) */
      } else {
         echo "<a href=\"".$CFG_GLPI["root_doc"]."/front/ticket.php?".
                Toolbox::append_params($options,'&amp;')."\">".__('Ticket followup')."</a>";
      }
      echo "</th></tr>";
      echo "<tr><th>"._n('Ticket','Tickets', Session::getPluralNumber())."</th><th>"._x('quantity', 'Number')."</th></tr>";

?>