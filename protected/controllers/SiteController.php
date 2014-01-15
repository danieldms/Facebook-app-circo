<?php

class SiteController extends Controller
{

	public $data = array();
	private $current;
	private $session;

	public function init(){
		$this->data['baseUrl'] = Yii::app()->getBaseUrl(true);
		
		$this->session = new CHttpSession;
		$this->session->open();

		$user = new Users();
		$cookie = Yii::app()->request->cookies->contains('facebookid') ? Yii::app()->request->cookies['facebookid']->value : '';

		if(!$cookie){
			$facebookid = Yii::app()->request->getParam('facebookid');

			if($facebookid)
				$this->session->add('facebookid', $facebookid);

			$cookie = $this->session->get('facebookid');
		}

		$this->current = $user->findByAttributes(array('facebook_id' => $cookie));
		$this->data['carta']['image'] = '';
		$this->data['carta']['descricao'] = '';	
	}

	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'

		$this->render('index');
	}

	public function actionEscolha(){
		$cartas = new Cartas();

		$lista1 = $cartas->findAll("genero = 'M'");	
		$lista2 = $cartas->findAll("genero = 'M'");	

		//$lista1 = $cartas->findAll("genero = '".substr($this->current->genero,0,1)."'");	
		//$lista2 = $cartas->findAll("genero = '".substr($this->current->genero,0,1)."'");	
		$lista = array_merge($lista1, $lista2);
		shuffle($lista);

		$this->render('escolha', array('cartas' => $lista));
	}

	public function actionObrigado(){
		$carta = new Cartas();		
		
		$idCarta = Yii::app()->request->cookies->contains('carta_escolhida') ? Yii::app()->request->cookies['carta_escolhida']->value : '';
		if(!$idCarta){
			if(Yii::app()->request->getParam('carta_escolhida'))
				$this->session->add('carta_escolhida', Yii::app()->request->getParam('carta_escolhida'));

			$idCarta = $this->session->get('carta_escolhida');
		}

		$escolha = $carta->findByPk($idCarta);

		$this->data['carta']['image'] = $escolha->image;
		$this->data['carta']['descricao'] = $escolha->descricao;	
			
		$this->render('obrigado', array('escolhido'=> $escolha, 'usuario' => $this->current) );
	}

	public function actionCompartilhar(){
		$idCarta = Yii::app()->request->cookies->contains('carta_escolhida') ? Yii::app()->request->cookies['carta_escolhida']->value : '';
		
		if(!$idCarta){
			$idCarta = $this->session->get('carta_escolhida');
		}

		$usersCartas = new UsersCartas();

		$usersCartas->users_idusers = $this->current->idusers;
		$usersCartas->cartas_idcartas = $idCarta;
		$usersCartas->post_id = Yii::app()->request->getPost('post_id');
		$usersCartas->create_at = date('Y-m-d H:i:s');
		try {
			if($usersCartas->save()){
				$retorno['sucesso'] = true;
				$retorno['msg'] = "Compartilhamento Salvo com Sucesso!";			
			}else{
				$retorno['sucesso'] = false;
				$retorno['msg'] = "Erro ao Salvar os dados!";	
			}
		}catch(Exception $e){
			$retorno['sucesso'] = false;
			$retorno['msg'] = $e->getMessage();
		}
		echo json_encode($retorno);
	}

	public function actionSaveuser(){
		$result = array();
		$user = new Users();
		$result = $user->findByAttributes(array('facebook_id' => Yii::app()->request->getPost('id') ));
		if(!$result){
			$user->nome = Yii::app()->request->getPost('name');
			$user->email = Yii::app()->request->getPost('email');
			$user->facebook_id = Yii::app()->request->getPost('id');
			$cidade  = Yii::app()->request->getPost('location');			
			$user->cidade = $cidade['name'];
			$user->genero = Yii::app()->request->getPost('gender');
			$user->birthday = date('Y-m-d', strtotime(Yii::app()->request->getPost('birthday')));
			$user->create_at = date('Y-m-d H:i:s');
			$user->save();
			$retorno['sucesso'] = true;
			$retorno['msg'] = 'Usuário cadastrado com sucesso';
		}else{
			$retorno['sucesso'] = true;
			$retorno['msg'] = 'Usuário já cadastrado';
		}

		echo json_encode($retorno);
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}
}