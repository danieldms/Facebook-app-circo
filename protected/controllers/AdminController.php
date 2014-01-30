<?php

class AdminController extends Controller
{	

	public $layout = '//layout/admin';
    private $usuario;

    public function init(){
        $this->usuario = new Users();
    	$this->layout = 'admin';
    }

    public function actionIndex(){		
        $lista = $this->usuario->findAll(array('order'=>'create_at'));
        
        $connection=Yii::app()->db; 

        $sql="SELECT COUNT(*) as Total, create_at as data,  MONTH(create_at) as mon FROM users GROUP BY date(create_at);";
        $command=$connection->createCommand($sql);
        $rows = $command->queryAll();
        $stats = '';
        foreach ($rows as $key => $value) {
            if($stats) $stats .= ',';

            $stats .= "[".(strtotime($value['data']) * 1000).",".$value['Total']."]";
        }

        $this->render('index', array('lista' => $lista, 'stats' => $stats )); 
	}

	public function actionLogin(){
		$this->layout = 'login';
		if(count($_POST) > 1){

			$username = $_POST['login-email'];
			$password = $_POST['login-password'];

			// Login a user with the provided username and password.
			$identity = new UserIdentity($username,$password);

			if($identity->authenticate()){
			    Yii::app()->user->login($identity);
			    $this->redirect(array('admin/index'));
			}
			else
			    echo $identity->errorMessage;
		}
		$this->render('login');
	}

    public function actionExport(){
        if(isset($_GET['class'])){
            if($_GET['class'] == 'usuario'){
                $lista = $this->usuario->findAll();
            }else{
               if($_GET['class'] == 'votos'){
                  $lista = $this->usuario->with('instituicao')->findAll(array('order'=>'create_at'));
                }
            }
        }
        if($lista){
            foreach ($lista as $key => $value) {
                if($_GET['class'] == 'votos'){
                    foreach ($value->instituicao as $val) {
                        $aux['id'] = $value->id;
                        $aux['usuario'] = $value->nome;
                        $aux['email'] = $value->email;
                        $aux['instituicao'] = $val->nome;
                        $array[] = $aux;
                    }
                }else{
                    $aux = $value->attributes;
                    unset($aux['post_id']);
                    $array[] = $aux;
                }
            }
            $this->download_send_headers(md5(date("Y-m-d H:i:s")). ".csv");
            echo $this->array2csv($array);
            die();
        }
    }

    public function actionLogout(){
        Yii::app()->user->logout();
        $this->redirect(array('admin/login'));       
    }

	public function accessRules()
    {
        return array(
            array('deny',
                'actions'=>array('index'),
                'users'=>array('?'),
            ),
            array('allow',
                'actions'=>array('delete'),
                'roles'=>array('admin'),
            ),
            array('deny',
                'actions'=>array('delete'),
                'users'=>array('*'),
            ),
        );
    }

    public function filters()
    {
        return array(
            'accessControl',
        );
    }

    function array2csv(array &$array)
    {
       if (count($array) == 0) {
         return null;
       }

       ob_start();
       $df = fopen("php://output", 'w');
       fputcsv($df, array_keys(reset($array)));

       foreach ($array as $row) {
          fputcsv($df, $row);
       }
       fclose($df);
       return ob_get_clean();
    }

    function download_send_headers($filename)   
    {
        // disable caching
        $now = gmdate("D, d M Y H:i:s");
        header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
        header("Cache-Control: max-age=0, no-cache, must-revalidate, proxy-revalidate");
        header("Last-Modified: {$now} GMT");

        // force download  
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");

        // disposition / encoding on response body
        header("Content-Disposition: attachment;filename={$filename}");
        header("Content-Transfer-Encoding: binary");
    }

}