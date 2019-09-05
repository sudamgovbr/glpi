<?

//==================================================================================================//
//==    Customzação do GLPI - Desenvolvido por Issac Costa, Renato Lázaro e Ana Costa - ©2016     ==//
//==    Homepage: https://sourceforge.net/projects/glpisatisfaction/                              ==//
//==    E-mail: isaac@isaac.net.br          renatolazaroch@gmail.com                              ==//
//==================================================================================================//

/* Como requisito pra funcionamento, o usuário deve aprovar a solução do chamado no final e a abertura do chamado deve ser realizada através do menu superior 
conforme print 00 (o arquivo Edit_ticket.class.php contém um código que oculta a segunda opção de abertura de chamado para o usuário na interface simplificada) */

/* Este é o código original do GLPI: */

      //  Create ticket
      if (Session::haveRight("ticket", CREATE)) {
         $menu['create_ticket']['id']      = "menu2";
         $menu['create_ticket']['default'] = '/front/helpdesk.public.php?create_ticket=1';
         $menu['create_ticket']['title']   = __s('Create a ticket');
         $menu['create_ticket']['content'] = array(true);
      }

/* Altere para: */

      //  Create ticket 
	  if (Session::haveRight("ticket", CREATE)) {
			$menu['create_ticket']['id']  = "menu2";
			/* Isaac Costa - Custom - Restrição de abertura de chamado (com a colaboração de Renato Lázaro e Ana Costa) */
			$usuarioIDString = Session::getLoginUserID(); 
			$usuarioID = (int)$usuarioIDString; 		
			$conectaGLPI = mysql_connect("SERVIDOR", "USUARIO", "SENHA") or print (mysql_error()); /* Isaac Costa - Custom - Substituir SERVIDOR, USUARIO e SENHA pelos dados de conexão ao banco do GLPI*/	
			mysql_select_db("BANCO", $conectaGLPI) or print(mysql_error()); /* Isaac Costa - Custom - Substituir BANCO pelo banco de dados utilizado pelo GLPI*/   
			$sql = "select count(*) from glpi_ticketsatisfactions S inner join glpi_tickets T on S.tickets_id = T.id inner join glpi_users U on T.users_id_lastupdater = U.id 
				where T.status = 6 and S.date_begin is not null and S.date_answered is null and U.id = {$usuarioID}";
			$res = mysql_query($sql); 
			$countSatisfaction = mysql_fetch_assoc($res); 			
			$contSatisfacao = (int) end($countSatisfaction);
			$quantidadeLimiteSatisfacao = 2 ; /* Isaac Costa - Aqui inserimos o limite de chamados que podem existir sem pesquisa de satisfação respondida para o usuário */
			if ($contSatisfacao > $quantidadeLimiteSatisfacao) {  
				$menu['create_ticket']['default'] = '/front/helpdesk.public.php';;
			} 
			else { 	
				$menu['create_ticket']['default'] = '/front/helpdesk.public.php?create_ticket=1';
			}		 
			/* Isaac Costa - Custom - Restrição de abertura de chamado (com a colaboração de Renato Lázaro e Ana Costa) */
			$menu['create_ticket']['title']   = __s('Create a ticket');		 
			$menu['create_ticket']['content'] = array(true);
      }

?>