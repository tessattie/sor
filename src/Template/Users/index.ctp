<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="panel panel-default">
  <div class="panel-heading">
  <div class="row">
      <div class="col-md-11">
          <h3 class="panel-title"><span class="glyphicon glyphicon-cog"></span> Utilisateurs</h3>
      </div>
      <div class="col-md-1"><button type="button" class="btn btn-default" data-toggle="modal" data-target="#newUser" style="float:right">
                    <span class='glyphicon glyphicon-plus'></span> Nouvel Utilisateur
                  </button></div>
  </div>
    
    
  </div>
  <div class="panel-body">
    <div class="row">
    <div class="col-md-12">
        <table id="usersTable" class='table-hover'>
        <thead>
            <tr>
                <th scope="col">Nom</th>
                <th scope="col" class="text-center">Nom d'utilisateur</th>
                <th scope="col" class="text-center">Email</th>
                <th scope="col" class="text-center">Rôle</th>
                <th scope="col" class="text-center">Statut</th>
                <th scope="col" class="actions text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td class="name"><?= strtoupper($user->last_name) . " " . ucfirst(strtolower($user->first_name)) ?></td>
                <td class="text-center"><?= h($user->username) ?></td>
                <td class="text-center"><?= h($user->email) ?></td>
                <td class="text-center"><?= $roles[$user->role] ?></td>
                <?php if($user->status == 0) : ?>
                    <td class="text-center"><span class="label label-danger"><?= $status[$user->status] ?></span></td>
                <?php else : ?>
                    <td class="text-center"><span class="label label-success"><?= $status[$user->status] ?><span></td>
                <?php endif; ?>
                <td class="actions text-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Action <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu">
                    <li><a href="#" data-toggle="modal" data-target="#edit_user_<?= $user->id ?>" ><i class='glyphicon glyphicon-pencil'></i> Edit</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#" data-toggle="modal" data-target="#delete_user_<?= $user->id ?>"><i class='glyphicon glyphicon-trash'></i> Delete</a></li>
                  </ul>
                </div>
                </td>
            </tr>
            <div class="modal fade" id="delete_user_<?= $user->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="exampleModalLabel"><span class='glyphicon glyphicon-check'></span> Confirmation</h4>
                    
                  </div>
                  <div class="modal-body">
                    Etes-vous sûr de vouloir supprimer l'utilisateur : <?= $user->first_name . " " . $user->last_name ?> ?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-primary"><a href="<?= ROOT_DIREC ?>/users/delete/<?= $user->id ?>" style="color:white">Oui</a></button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
                  </div>
                </div>
              </div>
            </div>
            <div id="edit_user_<?= $user->id ?>" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><span class='glyphicon glyphicon-edit'></span> Edition : <?= $user->first_name . " " . $user->last_name ?></h4>
              </div>
              <?php 
                if(!empty($currentEdit) && $currentEdit->id == $user->id){
                  echo $this->Form->create($currentEdit);
                  echo $this->Form->input('id', array('type' => "hidden", 'value' => $currentEdit->id));
                }else{
                  echo $this->Form->create($user);
                  echo $this->Form->input('id', array('type' => "hidden", 'value' => $user->id));
                } 
              ?>
              <?= $this->Form->input('formtype', array('type' => "hidden", 'value' => "1")); ?>
              <div class="modal-body">
        <div class="row">
          <div class="col-md-4"><label class="modallabel">Nom :</label></div>
          <div class="col-md-8"><?= $this->Form->input('last_name', array('class' => "form-control", "label" => false, "placeholder" => "Nom", 'value' => $user->last_name)); ?></div>
      </div>
      <div class="row">
          <div class="col-md-4"><label class="modallabel">Prénom :</label></div>
          <div class="col-md-8"><?= $this->Form->input('first_name', array('class' => "form-control", "label" => false, "placeholder" => "Prénom", 'value' => $user->first_name)); ?></div>
      </div>
      <div class="row">
          <div class="col-md-4"><label class="modallabel">Email :</label></div>
          <div class="col-md-8"><?= $this->Form->input('email', array('class' => "form-control", "label" => false, "placeholder" => "Email", 'value' => $user->email)); ?></div>
      </div>
      <hr>
      <div class="row">
          <div class="col-md-4"><label class="modallabel">Rôle :</label></div>
          <div class="col-md-8"><?= $this->Form->input('role', array('class' => "form-control", "type" => "select", "label" => false, "placeholder" => "Rôle", "options" => $roles, 'value' => $user->role)); ?></div>
      </div>
      <div class="row">
          <div class="col-md-4"><label class="modallabel">Statut :</label></div>
          <div class="col-md-8"><?= $this->Form->input('status', array('class' => "form-control", "type" => "select", "label" => false, "options" => $status, 'value' => $user->status)); ?></div>
      </div>
      <hr>
      <div class="row">
          <div class="col-md-4"><label class="modallabel">Nom d'utilisateur :</label></div>
          <div class="col-md-8"><?= $this->Form->input('username', array('class' => "form-control", "label" => false, "placeholder" => "Nom d'utilisateur", 'value' => $user->username)); ?></div>
      </div>
      <div class="row">
          <div class="col-md-4"><label class="modallabel">Mot de passe :</label></div>
          <div class="col-md-8"><?= $this->Form->input('password', array('class' => "form-control", "label" => false, "placeholder" => "Mot de passe", "autocomplete" => "new-password", 'value' => $user->password)); ?></div>
      </div>
      <div class="row">
          <div class="col-md-4"><label class="modallabel">Confirmation mot de passe :</label></div>
          <div class="col-md-8"><?= $this->Form->input('confirm_password', array('class' => "form-control", "label" => false, "placeholder" => "Confirmation MDP", "type" => "password", 'value' => $user->password)); ?></div>
      </div>
      </div>
              <div class="modal-footer">
                <?= $this->Form->button(__('Valider'), array('class' => "btn btn-success")); ?>              
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
              </div>
              <?= $this->Form->end() ?>
            </div>

          </div>
        </div></div>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
</div>
  </div>
</div>
<!-- Modal -->
<div id="newUser" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><span class='glyphicon glyphicon-plus'></span> Nouvel Utilisateur</h4>
      </div>
      <?= $this->Form->create($us) ?>
      <?= $this->Form->control('formtype', array('type' => "hidden", 'value' => "2")); ?>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4"><label class="modallabel">Nom :</label></div>
          <div class="col-md-8"><?= $this->Form->input('last_name', array('class' => "form-control", "label" => false, "placeholder" => "Nom", "required" => false, "value" => $us->last_name)); ?></div>
      </div>
      <div class="row">
          <div class="col-md-4"><label class="modallabel">Prénom :</label></div>
          <div class="col-md-8"><?= $this->Form->control('first_name', array('class' => "form-control", "label" => false, "placeholder" => "Prénom", "value" => $us->first_name)); ?></div>
      </div>
      <div class="row">
          <div class="col-md-4"><label class="modallabel">Email :</label></div>
          <div class="col-md-8"><?= $this->Form->input('email', array('class' => "form-control", "label" => false, "placeholder" => "Email", "value" => $us->email)); ?></div>
      </div>
      <hr>
      <div class="row">
          <div class="col-md-4"><label class="modallabel">Rôle :</label></div>
          <div class="col-md-8"><?= $this->Form->input('role', array('class' => "form-control", "type" => "select", "label" => false, "placeholder" => "Rôle", "options" => $roles, "value" => $us->role)); ?></div>
      </div>
      <div class="row">
          <div class="col-md-4"><label class="modallabel">Statut :</label></div>
          <div class="col-md-8"><?= $this->Form->input('status', array('class' => "form-control", "type" => "select", "label" => false, "options" => $status, 'value' => 1)); ?></div>
      </div>
      <hr>
      <div class="row">
          <div class="col-md-4"><label class="modallabel">Nom d'utilisateur :</label></div>
          <div class="col-md-8"><?= $this->Form->input('username', array('class' => "form-control", "label" => false, "placeholder" => "Nom d'utilisateur", "value" => $us->username)); ?></div>
      </div>
      <div class="row">
          <div class="col-md-4"><label class="modallabel">Mot de pase :</label></div>
          <div class="col-md-8"><?= $this->Form->input('password', array('class' => "form-control", "label" => false, "placeholder" => "Mot de passe", "autocomplete" => "new-password", "type" => "password", "value" => '')); ?></div>
      </div>
      <div class="row">
          <div class="col-md-4"><label class="modallabel">Confirmation mot de passe :</label></div>
          <div class="col-md-8"><?= $this->Form->input('confirm_password', array('class' => "form-control", "label" => false, "placeholder" => "Confirmation MDP", "type" => "password", "value" => '')); ?></div>
      </div>
      
      </div>
      <div class="modal-footer">
        <?= $this->Form->button(__('Valider'), array('class' => "btn btn-success")); ?>      
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
      </div>
      <?= $this->Form->end() ?>
    </div>

  </div>
</div></div>


<?php if(!empty($success)) : ?>
  <?php   echo "<script>$(document).ready(function(){ $('#successModal').modal('show'); })</script>"; ?>
<?php else :  ?>
<?php endif; ?>

  <div class="modal fade" id="successModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title"><span class='glyphicon glyphicon-check'></span> Confirmation</h4>
      </div>
      <div class="modal-body">
        <p class="bg-success"><i class="glyphicon glyphicon-ok"></i> <?= $success ?></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<?php if(!empty($errors)) {
  echo "<script>$(document).ready(function(){ $('#newUser').modal(); })</script>";
  } ?>

  <?php if(!empty($modalToShow)) {
  echo "<script>$(document).ready(function(){ $('#".$modalToShow."').modal('show'); })</script>";
  } ?>



