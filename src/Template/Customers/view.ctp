<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Customer $customer
 */
$cartes = array(2 => "Carte Cheque", 1 => "Caribbean Club", 3 => "Carte Credit");
$status = array(1 => "Actif", 0 => "Inactif");
?>

<div class="panel panel-default">
  <div class="panel-heading">Profil : <?= $customer->first_name . " " . $customer->last_name ?></div>
  <div class="panel-body">
      <div class="customers view large-9 medium-8 columns content">
    <table class="vertical-table table table-bordered">
    <tr>
            <th scope="row"><?= __('Client') ?></th>
            <td><?= h($customer->first_name . " " . $customer->last_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type Carte') ?></th>
            <td><?= $cartes[$customer->type_carte] ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('NIF') ?></th>
            <td><?= h($customer->NIF) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($customer->email) ?></td>
        </tr>
        <tr>
        <?php if(!empty($customer->telephone)) : ?>
            <th scope="row"><?= __('Telephone') ?></th>
            <td><?= "+509-".$customer->telephone ?></td>
            <?php else : ?>
                <th scope="row"><?= __('Telephone') ?></th>
            <td></td>
            <?php endif; ?>
            
        </tr>
        <tr>
        <?php if(!empty($customer->cellulaire)) : ?>
            <th scope="row"><?= __('Telephone') ?></th>
            <td><?= "+509-".$customer->cellulaire ?></td>
            <?php else : ?>
                <th scope="row"><?= __('Telephone') ?></th>
            <td></td>
            <?php endif; ?>
        </tr> 
        <tr>
            <th scope="row"><?= __('Adresse') ?></th>
            <td><?= h($customer->address) ?></td>
        </tr>
        
        <tr>
            <th scope="row"><?= __('Entreprise') ?></th>
            <td><?= h($customer->entreprise) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Employeur') ?></th>
            <td><?= h($customer->employeur) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Post Occupe') ?></th>
            <td><?= h($customer->post_occupe) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Adresse Employeur') ?></th>
            <td><?= h($customer->adresse_employeur) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Num Client') ?></th>
            <td><?= h($customer->num_client) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tel Employeur') ?></th>
            <td><?= "+509-". $customer->tel_employeur ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <?php if($customer->status == 0) : ?>
                <td><span class="label label-success"><?= $status[$customer->status] ?></label></td>
            <?php else : ?>
                <td><span class="label label-danger"><?= $status[$customer->status] ?></label></td>
            <?php endif; ?>
        </tr>
        
    </table>
    <div class="related">
        <h4><?= __('Références') ?><button type="button" class="btn btn-info" data-toggle="modal" data-target="#newAdvisor" style="float:right;margin-bottom:7px">
                    <span class='glyphicon glyphicon-plus'></span> Nouveau
                  </button></h4>
        <?php if (!empty($customer->advisors)): ?>
        <table cellpadding="0" cellspacing="0" class = "table table-bordered">
            <tr>
                <th scope="col"><?= __('Nom') ?></th>
                <th scope="col"><?= __('Téléphone') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Adresse') ?></th>
                <th scope="col"><?= __('Employeur') ?></th>
                <th scope="col" class="actions"></th>
            </tr>
            <?php foreach ($customer->advisors as $advisors): ?>
            <tr>
                <td><?= h($advisors->first_name." ".$advisors->last_name) ?></td>
                <td><?= h($advisors->address) ?></td>
                <?php if(!empty($advisors->phone)) : ?>
                    <td><?= h("+509-". $advisors->phone) ?></td>
                <?php else : ?>
                    <td></td>
                <?php endif; ?>
                
                <td><?= h($advisors->email) ?></td>
                <td><?= h($advisors->employer) ?></td>
                <td class="actions text-center">
                    <?= $this->Form->postLink(__('Supprimer'), ['controller' => 'Advisors', 'action' => 'delete', $advisors->id], ['confirm' => __('Etes-vous sûr de voiloir supprimer {0}?', $advisors->first_name." ".$advisors->last_name)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Documents') ?><button type="button" class="btn btn-info" data-toggle="modal" data-target="#newDocument" style="float:right;margin-bottom:7px">
                    <span class='glyphicon glyphicon-plus'></span> Nouveau
                  </button></h4>
        <?php if (!empty($customer->documents)): ?>
        <table cellpadding="0" cellspacing="0" class = "table table-bordered">
            <tr>
                <th scope="col"><?= __('Nom') ?></th>
                <th scope="col"><?= __('Lien') ?></th>
                <th scope="col" class="actions"></th>
            </tr>
            <?php foreach ($customer->documents as $document): ?>
            <tr>
                <td><?= h($document->name) ?></td>
                <td><?= h($document->doc_path) ?></td>
                <td class="actions text-center">
                <a href="http://localhost/clients/img/documents/<?= $document->doc_path ?>" style = "color:green" target = "_blank">Voir</a>
                    <?= $this->Form->postLink(__('Supprimer'), ['controller' => 'Documents', 'action' => 'delete', $document->id ], ['confirm' => __('Etes-vous sûr de voiloir supprimer {0}?', $document->name), 'style' => "color:red"]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

  </div>
  <div class="panel-footer"></div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="newDocument">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <?= $this->Form->create($document, array('url' =>"/documents/add", 'enctype' => 'multipart/form-data')) ?>
    <?= $this->Form->control('customer_id', ['type' => "hidden", 'value' => $customer->id]); ?>
      <div class="modal-header">
        <h5 class="modal-title"><span class = "glyphicon glyphicon-plus"> </span> Nouveau Document</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        
          <?php echo $this->Form->control('name', array('class' => "form-control", "placeholder" => "Nom", "label" => "Nom")); ?>
          <hr>  
          <div class="form-group">
            <label for="exampleInputFile">Pièce jointe</label>
            <input type="file" id="exampleInputFile" name = "path_to_doc">
            <p class="help-block">Nous acceptons les PDF et les images</p>
          </div>
      </div>
      <div class="modal-footer">
        <?= $this->Form->button(__('Valider'), array('class' => "btn btn-success")) ?>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
      </div>
      <?= $this->Form->end() ?>
    </div>
  </div>
</div>

<div class="modal fade" id="newAdvisor">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <?= $this->Form->create($advisor, array('url' =>"/advisors/add")) ?>
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title"><span class="glyphicon glyphicon-plus"></span> Nouvelle référence</h4>
      </div>
      <div class="modal-body">
      <div class="row">
          <div class="col-md-6">
              <?php echo $this->Form->control('first_name', array('class' => "form-control", "placeholder" => "Prénom", "label" => "Prénom")); ?>
          </div>
          <div class="col-md-6">
              <?php echo $this->Form->control('last_name', array('class' => "form-control", "placeholder" => "Nom", "label" => "Nom")); ?>
          </div>
      </div>
      <hr>
      <div class="row">
          <div class="col-md-12">
              <?php echo $this->Form->control('address', array('class' => "form-control", "placeholder" => "Adresse", "label" => "Adresse"));?>
          </div>
       </div>
       <hr>
       <div class="row">
          <div class="col-md-6">
              <?php echo $this->Form->control('phone', array('class' => "form-control", "placeholder" => "Téléphone", "label" => "Téléphone")); ?>
          </div>
          <div class="col-md-6">
              <?php echo $this->Form->control('email', array('class' => "form-control", "placeholder" => "Email", "label" => "Email")); ?>
          </div>
      </div>
      <hr>
        <?php
            echo $this->Form->control('customer_id', ['type' => "hidden", 'value' => $customer->id]);
            echo $this->Form->control('employer', array('class' => "form-control", "placeholder" => "Nom Employeur", "label" => "Nom Employeur"));
        ?>
      </div>
      <div class="modal-footer">
       <?= $this->Form->button(__('Valider'), array('class' => "btn btn-success")) ?>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
      </div>
      <?= $this->Form->end() ?>
    </div>
  </div>
</div>