<!DOCTYPE html>
<!--[if IE 8]>     <html class="ie8"> <![endif]-->
<!--[if !IE]><!--> <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">            <!--<![endif]-->

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<?php

		$baseUrl = Yii::app()->baseUrl; 
		$cs = Yii::app()->getClientScript();
		Yii::app()->clientScript->scriptMap=array(
                'jquery.js'=>false);

		$cs->registerScriptFile($baseUrl.'/js/jquery-1.9.0.js');

		$cs->registerScriptFile($baseUrl.'/js/vendor/custom.modernizr.js');
		$cs->registerScriptFile($baseUrl.'/js/modernizr.custom.79639.js');
		$cs->registerScriptFile($baseUrl.'/js/vendor/zepto.js');
		$cs->registerScriptFile($baseUrl.'/js/foundation.min.js');

		//Yii::app()->clientScript->registerCoreScript('jquery');    

		$cs->registerScriptFile("//connect.facebook.net/en_UK/all.js");

		$cs->registerScriptFile($baseUrl.'/js/jquery.baraja.js');
		$cs->registerScriptFile($baseUrl.'/js/jquery.cookie.js');
		$cs->registerScriptFile($baseUrl.'/js/jquery.toastmessage.js');

		$cs->registerCssFile($baseUrl.'/css/foundation.css');
		$cs->registerCssFile($baseUrl.'/css/estilo.css');
		$cs->registerCssFile($baseUrl.'/css/baraja.css');
		$cs->registerCssFile($baseUrl.'/css/demo.css');
		$cs->registerCssFile($baseUrl.'/css/custom.css');
		$cs->registerCssFile($baseUrl.'/css/jquery.toastmessage.css');

		Yii::app()->clientScript->registerScript('initial','
			var url = "'.$this->createUrl("site/escolha").'";
			var urlObg = "'.$this->createUrl("site/obrigado").'";
			var urlUserSave = "'.$this->createUrl("site/saveuser").'";
			var action = "'.$this->action->Id.'";
			var collection = "";
			var access_token = "";
			var facebook = "";

			var BrowserDetect = 
			{
			    init: function () 
			    {
			        this.browser = this.searchString(this.dataBrowser) || "Other";
			        this.version = this.searchVersion(navigator.userAgent) ||       this.searchVersion(navigator.appVersion) || "Unknown";
			    },

			    searchString: function (data) 
			    {
			        for (var i=0 ; i < data.length ; i++)   
			        {
			            var dataString = data[i].string;
			            this.versionSearchString = data[i].subString;

			            if (dataString.indexOf(data[i].subString) != -1)
			            {
			                return data[i].identity;
			            }
			        }
			    },

			    searchVersion: function (dataString) 
			    {
			        var index = dataString.indexOf(this.versionSearchString);
			        if (index == -1) return;
			        return parseFloat(dataString.substring(index+this.versionSearchString.length+1));
			    },

			    dataBrowser: 
			    [
			        { string: navigator.userAgent, subString: "Chrome",  identity: "Chrome" },
			        { string: navigator.userAgent, subString: "MSIE",    identity: "Explorer" },
			        { string: navigator.userAgent, subString: "Firefox", identity: "Firefox" },
			        { string: navigator.userAgent, subString: "Safari",  identity: "Safari" },
			        { string: navigator.userAgent, subString: "Opera",   identity: "Opera" }
			    ]

			};
			BrowserDetect.init();


			$(document).foundation();

			// Carrega o plugin do facebook
		  	//$.ajaxSetup({ cache: true });
		  	//$.getScript("//connect.facebook.net/en_UK/all.js", function(){

		  		// Inicia o plugin
		    	FB.init({
		      		appId: "646071515456356",
		      		status: true,
		      		oauth: true,
		      		cookie : true,
        			channelURL : "https://degree3.com/channel.php"
	    		});     

				// Verifica se o status esta connectado e depois redireciona para a pagina de escolha da carta
		    	FB.getLoginStatus(function(response){
		    		access_token = response.authResponse.accessToken;
		    		facebook = response.authResponse.userID;
		    		if (response.status === "connected" && action == "index") {
		    			$.cookie("facebookid", response.authResponse.userID);
		    			$.cookie("access_token", response.authResponse.accessToken);
		    			self.location.href = url +"?facebookid="+response.authResponse.userID;
		    		}
		    	});					

				/* Quando clicar em participar abre o login do facebook e depois salva o usuario
				 * Seta o cookie com o facebook id do usuario
				 * Depois redireciona para escolha da carta
				 */
				$("#participar").bind("click", function(){
					FB.login(function(response){ 
						if (response.authResponse) {
                            FB.api("/me", function(me) {                            	
								$.ajax({          
                                    type: "POST",
                                    url: urlUserSave,
                                    data: me ,
                                    success: function(responseText) {

                                   		$.cookie("facebookid", me.id);
                                   		facebook = me.id;

                                   		var result = JSON.parse(responseText);
                                   		if(result.sucesso){
                                   			self.location.href = url+"?facebookid="+ me.id;
                                   		}
                                    }
                            	});
                            });
						}		
					}, {scope: "email,publish_stream,photo_upload,publish_actions,user_birthday"});
				});
				
				// Para acoes da pagina de escolha
				
				if(action == "escolha"){
					var el = $( "#baraja-el" ),
					baraja = el.baraja();

				// END Page Site / Acoes de Obrigado 
					if(BrowserDetect.browser === "Explorer"){
						$(".container").css("margin-top", 410);
						$(".container").css("margin-left", -80);
						var angle = 25,
							anterior = 0, 
							count = el.children().length
							current = 1;

						el.children().each(function(index){
							var val = angle * current + (anterior);

							anterior = angle * current;
							current +=1;
							
							$(this).animate({top: val});

							//$(this).css("top", val);
						});
						
						el.children().bind("click", function(e){
							var th = $(this);

							$(this).detach();

							el.append(th);

							el.children().each(function(index){
								$(this).animate({top: 100});
							});
							
						});
					}else{

						baraja.fan( {
							speed : 500,
							easing : "ease-out",
							range : 80,
							direction : "left",
							origin : { x : 200, y : 50 },
							center : true
						});
					}

					$("#baraja-el>li").bind("click", function(){
						collection = $(this).children("img");
						var carta_escolhida = "";
						collection.each(function(){
							var carta = $(this).attr("id");
							if(carta != null ){
								$.cookie("carta_escolhida", carta);
								carta_escolhida = carta;
							}

							if($(this).attr("class") == "front"){
								$(this).attr("class", "verso");
							}else{	
								$(this).attr("class", "front");
							}
						});

						setInterval(function(){
							self.location.href = urlObg +"?carta_escolhida="+ carta_escolhida;
						},2000);

					});	
				}

				//End escolha

				// Page Site / Acoes de Obrigado 
				if(action == "obrigado"){
					$("#compartilhar").bind("click", function(e){
						
						FB.api("/me/photos", "POST", {
							message: "Eu visitei a tenda da Madame Zoraide e descobri quem sou no Festival de Circo do Salvador Norte Shopping! Clique no link: https://www.facebook.com/SalvadorNorteShopping/app_241368579222450 e descubra você também!",
							url: "'.$this->data['baseUrl'].'/images/post_'.$this->data['carta']['image'].'",
							access_token: access_token
						}, function(response){

							if(!response.hasOwnProperty("error")){
								$.post("'.$this->createUrl("site/compartilhar").'", {post_id: response.id}, function(response){
									var result = JSON.parse(response);
									 $().toastmessage("showToast", {
									    text     : result.msg,
									    sticky   : true,
									    position : "middle-center",
									    type     : "success"});
								});
							}else{
								$().toastmessage("showSuccessToast", "Neste momento Madame Zoraide esta ocupada, tente novamente!");
							}
						});

						e.preventDefault();
					});

					$("#embaralhar").bind("click", function(e){
						self.location.href = url +"?facebookid="+ facebook;
						e.preventDefault();
					});
				}

			//});
			
		');
	?>

	<meta class="foundation-mq-small">
	<meta class="foundation-mq-medium">
	<meta class="foundation-mq-large">
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
	<div id="fb-root"></div>

	<?php echo $content; ?>

	<div class="clear"></div>

</body>
</html>
