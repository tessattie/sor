<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Customer $customer
 */
?>
<style type="text/css">
    .display-none{
        display:none;
    }
</style>

<div class="panel panel-default">
  <div class="panel-heading"><span class = "glyphicon glyphicon-plus"></span> Nouveau Client</div>
  <div class="panel-body">
    <?= $this->Form->create($customer) ?>
  <?= $this->Form->button(__('Valider'), array('class' => "btn btn-success", "style" => "    float: right;
    margin-top: -53px;
")) ?>
      <div class="row">
          <div class="col-md-3"><?= $this->Form->control('first_name', array('class' => "form-control", 'placeholder' => 'Prénom', "label" => "Prénom")) ?></div>
          <div class="col-md-3"><?= $this->Form->control('last_name', array('class' => "form-control", 'placeholder' => 'Nom', "label" => "Nom" )) ?></div>
          <div class="col-md-3"><?= $this->Form->control('NIF', array('class' => "form-control", 'placeholder' => 'NIF')) ?></div>
          <div class="col-md-3"><?= $this->Form->control('type_carte', array('class' => "form-control", "options" => array(2 => "Carte Cheque", 1 => "Caribbean Club", 3 => "Carte Credit"), "label" => "Type Carte")) ?></div>
      </div>
      <hr>
      <div class="row">
          <div class="col-md-4"><?= $this->Form->control('telephone', array('class' => "form-control", "label" => "Téléphone", "placeholder" => "Téléphone")) ?></div>
          <div class="col-md-4"><?= $this->Form->control('cellulaire', array('class' => "form-control", "label" => "Cellulaire", "placeholder" => "Cellulaire")) ?></div>
          <div class="col-md-4"><?= $this->Form->control('email', array('class' => "form-control", 'placeholder' => 'Email')) ?></div>
      </div>
      <hr>
      <div class="row">
          <div class="col-md-9"><?= $this->Form->control('address', array('class' => "form-control", 'placeholder' => 'Adresse', 'label' => 'Adresse')) ?></div>
          <div class="col-md-3"><?= $this->Form->control('status', array('class' => "form-control", "label" => "Statut", "placeholder" => "Statut", "options" => array(0 => "Inactif", 1 => "Actif", "value" => 1))) ?></div>
      </div>
      <div class="display-none">
         <div class="row">
              <p style = "margin-top:25px; padding-left: 10px;background: #f2f2f2; border-top:1px solid #ddd; border-bottom:1px solid #ddd; padding-top: 10px;padding-bottom: 10px;">Informations Employeur</h4>
          </div> 
          <div class="row">
              <div class="col-md-4">
                  <?= $this->Form->control('entreprise', array('class' => "form-control", 'label' => 'Entreprise', 'placeholder' => 'Entreprise')); ?>
              </div>
              <div class="col-md-4">
                  <?= $this->Form->control('employeur', array('class' => "form-control", 'label' => "Employeur", 'placeholder' => 'Employeur')); ?>
              </div>
              <div class="col-md-4">
                  <?= $this->Form->control('post_occupe', array('class' => "form-control", 'label' => "Poste Occupé", 'placeholder' => 'Poste Occupé')); ?>
              </div>
          </div>
          <hr>
          <div class="row">
              <div class="col-md-3">
                  <?= $this->Form->control('tel_employeur', array('class' => "form-control", 'label' => 'Tel Employeur', 'placeholder' => 'Tel Employeur')); ?>
              </div>
              <div class="col-md-3">
                  <?= $this->Form->control('num_client', array('class' => "form-control", 'label' => 'Numéro Client', 'placeholder' => 'Numéro Client')); ?>
              </div>
              <div class="col-md-6">
                  <?= $this->Form->control('addresse_employeur', array('class' => "form-control", 'label' => "Adresse Employeur", 'placeholder' => 'Adresse Employeur')); ?>
              </div>
          </div>
      </div>
      <?= $this->Form->end() ?>
  </div>
  <div class="panel-footer"></div>
</div>
