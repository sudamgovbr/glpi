<?

//==================================================================================================//
//==    Customzação do GLPI - Desenvolvido por Issac Costa, Renato Lázaro e Ana Costa - ©2016     ==//
//==    Homepage: https://sourceforge.net/projects/glpisatisfaction/                              ==//
//==    E-mail: isaac@isaac.net.br          renatolazaroch@gmail.com                              ==//
//==================================================================================================//

/* Este é o código original do GLPI: */

         echo "<tr class='tab_bg_2'>";
         echo "<td rowspan='1'>".__('Comments')."</td>";
         echo "<td rowspan='1' class='middle'>";
         echo "<textarea cols='45' rows='7' name='comment' >".$this->fields["comment"]."</textarea>";
         echo "</td></tr>\n";
 
/* Altere para: */
 
		/* Renato Lázaro - Custom – Comentário da avaliação como obrigatório */
         echo "<tr class='tab_bg_2'>";
         echo "<td rowspan='1'>".__('Comments')."</td>";
         echo "<td rowspan='1' class='middle'>";
         echo "<textarea cols='45' rows='7' name='comment' required>".$this->fields["comment"]."</textarea>"; /* Renato Lázaro - parâmetro REQUIRED para tornar o campo obrigatório */
         echo "</td></tr>\n";
		/* Renato Lázaro - Custom – Comentário da avaliação como obrigatório */

 
 ?>
