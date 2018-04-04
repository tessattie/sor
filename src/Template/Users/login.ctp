 <div class="row">
   <div class="col-md-4 col-md-offset-4">
     <div class="row">
       <div class="col-md-12">
         <section class="login_content" style="background:#F2F2F2;border:1px solid #ddd;border-radius:3px;padding:10px 20px 30px">
            <?= $this->Form->create() ?>
              <h2>Log in</h2>
              <div>
              <?= $this->Form->input("username", array('label' => false, "class" => "form-control loginForm", "placeholder" => "Username")) ?>
              </div>
              <div>
              <?= $this->Form->input("password", array('label' => false, "class" => "form-control loginForm", "placeholder" => "Password")) ?>
              </div>
              <div>
              <?= $this->Flash->render() ?>
                <?= $this->Form->button("Submit", array('class' => "btn btn-success loginForm")) ?>
              </div>
              <a href="<?= ROOT_DIREC ?>/users/forgotpassword" style="float:right">Forgot Password</a>
            <?= $this->Form->end() ?>
          </section>
       </div>
     </div>
   </div>
 </div>
 