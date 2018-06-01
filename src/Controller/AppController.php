<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        ini_set('memory_limit', -1);

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');

        define("ROOT_DIREC", '/clients');

        $this->loadComponent('Auth', [
            'loginRedirect' => [
                'controller' => 'Users',
                'action' => 'index'
            ],
            'logoutRedirect' => [
                'controller' => 'Users',
                'action' => 'login']
        ]);

        $this->Auth->allow(['login', 'forgotpassword']);

        /*
         * Enable the following components for recommended CakePHP security settings.
         * see http://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
        //$this->loadComponent('Csrf');
    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return \Cake\Network\Response|null|void
     */
    public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }

    public function beforeFilter(Event $event){
        if($this->Auth->user()){
            $this->set("current_user", $this->Auth->user());
            $this->set("name", $this->Auth->user()['first_name']);
        }
    }

    protected function checkfile($file, $name, $directory){
        // debug($file); die();
        $allowed_extensions = array('jpg', "JPG", "jpeg", "JPEG", "png", "PNG", 'pdf', 'html');
        if(!$file['error']){
            $extension = explode("/", $file['type'])[1];
            if(in_array($extension, $allowed_extensions)){
                $dossier = 'C:/wamp/www'.ROOT_DIREC.'/webroot/img/'.$directory.'/';
                if(move_uploaded_file($file['tmp_name'], $dossier . $name . "." . $extension)){
                    return $name . "." . $extension;
                }else{
                    return 'couldnt move file';
                }
            }else{
                return 'extension error';
            }
        }else{
            return 'error with upload';
        }
    }
}
