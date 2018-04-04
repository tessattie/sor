<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Mailer\Email;
use Cake\Datasource\ConnectionManager;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{

    public function beforeFilter(Event $event){
        parent::beforeFilter($event);
        $this->set("roles", $this->Users->roles);
        $this->set("status", $this->Users->status);
    }

    public function forgotpassword(){
        $this->viewBuilder()->layout('login');
        if ($this->request->is(['patch', 'post', 'put'])){
            $users = $this->Users->find('all', array('conditions' => array('email' => $this->request->data['email'])));
            foreach($users as $user){
                $user = $user;
            }
            $pass = rand(100000, 999999);
            $user->password = $pass;
            $user->first_login = 1;
            $us = $this->Users->save($user); 
            $this->sendAccountInfo($us, $pass);
            $this->set('confirmation', "Please check your email and go back to with the new account information we provided.");
        }
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $us = $this->Users->newEntity();
        if ($this->request->is(['patch', 'post', 'put'])) {
            if($this->request->data['formtype'] == "2"){
                $us = $this->Users->patchEntity($us, $this->request->data);
                if ($u = $this->Users->save($us)) {
                    $this->sendAccountInfo($u, $this->request->data['password']);
                    $this->set('success', "The user has successfully been saved");
                    $us = $this->Users->newEntity();
                    $this->request->data = [];
                }else{
                    $this->set('errors', $us->errors());
                }
            }else{
                if($this->request->data['formtype'] == "1"){
                    $usr = $this->Users->get($this->request->data['id'], [
                        'contain' => []
                    ]);
                    $usr = $this->Users->patchEntity($usr, $this->request->data);
                    if($usr->dirty('password')){
                        $sendmessage = true;
                    }else{
                        $sendmessage = false;
                    }
                    if ($u = $this->Users->save($usr)) {
                        $this->sendAccountInfo($u, $this->request->data['password'],true, $sendmessage);
                        $this->set('success', "The user has successfully been saved");
                        $this->request->data = [];
                        $us = $this->Users->newEntity();
                    }else{
                        $this->set('modalToShow', "edit_user_".$usr->id);
                        $this->set('currentEdit', $usr);
                        $this->set('editerrors', $usr->errors());
                    }
                }  
            }          
        }
        $this->set(compact('us', 'usr'));
        $users = $this->Users->find('all');
        $this->set(compact('user'));
        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }


    public function sendAccountInfo($user, $password, $edit = false, $sendPass = false){
        $message = "[ Name : ".$user['first_name'] . " " . $user['last_name'] . " ] - ";
        $message .= "[ Email : ".$user['email'] ." ] - ";
        $message .= "[ Username : ".$user['username'] ." ] - ";
        
        $email = new Email('default');
        if($edit == true){
            if($sendPass == true){
                $message .= "[ Password : ".$password . " ] - ";
            }else{
            }
            $email->from(['caribbeansupermarketsa@gmail.com' => 'Caribbean Supermarket S.A.'])
            ->to($user['email'])
            ->subject('CMSA : ACCOUNT INFORMATION EDIT')
            ->send($message);
        }else{
            $message .= "[ Password : ".$password . " ] - ";
            $email->from(['caribbeansupermarketsa@gmail.com' => 'Caribbean Supermarket S.A.'])
            ->to($user['email'])
            ->subject('CMSA : ACCOUNT INFORMATION')
            ->send($message);
        }
    }


    public function login(){
        $this->viewBuilder()->layout('login');
        if($this->request->is('post')){
            $user = $this->Auth->identify();
            // debug($user); die();
            if ($user) {
                if($user['status'] == false){
                    $this->Flash->error(__('This account is blocked. Please use other login credentials'));
                }else{
                    $this->Auth->setUser($user);
                    return $this->redirect($this->Auth->redirectUrl());
                }
            }else{
                $this->Flash->error(__('The username or password is incorrect'));
            }
        }
    }

    // public function createViews(){
    //     $conn = ConnectionManager::get('default');
    //     $conn->query("CREATE OR REPLACE VIEW credit_synthese AS (select `c`.`id` AS `c_id`,`c`.`name` AS `name`,`c`.`address` AS `address`,`c`.`username` AS `username`,`c`.`password` AS `password`,`c`.`status` AS `status`,`c`.`phone` AS `phone`,`c`.`customer_message` AS `customer_message`,`c`.`email` AS `email`,`c`.`logo` AS `logo`,`c`.`credit` AS `credit`,`c`.`discount` AS `c_discount`,`c`.`department_id` AS `department_id`,`o`.`taxe` AS `taxe`,`o`.`shipping` AS `shipping`,`o`.`discount` AS `discount`,`o`.`refunded` AS `refunded`,`o`.`id` AS `id`,sum((`op`.`customer_price` * `op`.`quantity`)) AS `total` from ((`customers` `c` left join `orders` `o` on((`o`.`customer_id` = `c`.`id`))) left join `orders_products` `op` on((`op`.`order_id` = `o`.`id`))) where (((`o`.`status` = 1) or (`o`.`status` = 3)) and (`o`.`payment_type` = 2)) group by `c`.`id`,`o`.`id` order by `c`.`id`,`o`.`id`)");
    //     die();
    // }


    public function firstLogin(){
        if ($this->request->is('post')){
            $user = $this->Users->get($this->request->data['id'], [
                'contain' => []
            ]);
            $user = $this->Users->patchEntity($user, $this->request->data);
            $user->first_login = 0;
            if ($this->Users->save($user)) {
                $this->logout();
            }
        }
    }


    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }


    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }


    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {

                $this->redirect($this->referer());
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }


    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete', 'get']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
        } else {
        }
        return $this->redirect(['action' => 'index']);
    }


    public function logout(){
        return $this->redirect($this->Auth->logout());
    }
}
