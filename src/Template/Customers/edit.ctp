<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Customer $customer
 */
?>
<div class="panel panel-default">
  <div class="panel-heading">Edit customer : <?= $customer->first_name . " " . $customer->last_name ?></div>
  <div class="panel-body">
    <?= $this->Form->create($customer) ?>
  <?= $this->Form->button(__('Submit'), array('class' => "btn btn-success", "style" => "    float: right;
    margin-top: -53px;
")) ?>
      <div class="row">
          <div class="col-md-3"><?= $this->Form->control('first_name', array('class' => "form-control", 'placeholder' => 'First Name')) ?></div>
          <div class="col-md-3"><?= $this->Form->control('last_name', array('class' => "form-control", 'placeholder' => 'Last Name')) ?></div>
          <div class="col-md-3"><?= $this->Form->control('NIF', array('class' => "form-control", 'placeholder' => 'NIF')) ?></div>
          <div class="col-md-3"><?= $this->Form->control('type_carte', array('class' => "form-control", "options" => array(2 => "Carte Cheque", 1 => "Caribbean Club", 3 => "Carte Credit"), "label" => "Card Type")) ?></div>
      </div>
      <hr>
      <div class="row">
          <div class="col-md-4"><?= $this->Form->control('telephone', array('class' => "form-control", "label" => "Home Phone", "placeholder" => "Home Phone")) ?></div>
          <div class="col-md-4"><?= $this->Form->control('cellulaire', array('class' => "form-control", "label" => "Cell Phone", "placeholder" => "Cell Phone")) ?></div>
          <div class="col-md-4"><?= $this->Form->control('email', array('class' => "form-control", 'placeholder' => 'Email')) ?></div>
      </div>
      <hr>
      <div class="row">
          <div class="col-md-9"><?= $this->Form->control('address', array('class' => "form-control", 'placeholder' => 'Address')) ?></div>
          <div class="col-md-3"><?= $this->Form->control('status', array('class' => "form-control", "options" => array(0 => "Inactive", 1 => "Active", "value" => 1))) ?></div>
      </div>
      <div class="display-none">
         <div class="row">
              <p style = "margin-top:25px; padding-left: 10px;background: #f2f2f2; border-top:1px solid #ddd; border-bottom:1px solid #ddd; padding-top: 10px;padding-bottom: 10px;">Employer Information</h4>
          </div> 
          <div class="row">
              <div class="col-md-4">
                  <?= $this->Form->control('entreprise', array('class' => "form-control", 'label' => 'Business', 'placeholder' => 'Business')); ?>
              </div>
              <div class="col-md-4">
                  <?= $this->Form->control('employeur', array('class' => "form-control", 'label' => "Employer", 'placeholder' => 'Employer')); ?>
              </div>
              <div class="col-md-4">
                  <?= $this->Form->control('post_occupe', array('class' => "form-control", 'label' => "Job Position", 'placeholder' => 'Job Position')); ?>
              </div>
          </div>
          <hr>
          <div class="row">
              <div class="col-md-3">
                  <?= $this->Form->control('tel_employeur', array('class' => "form-control", 'label' => 'Employer Phone', 'placeholder' => 'Employer Phone')); ?>
              </div>
              <div class="col-md-9">
                  <?= $this->Form->control('addresse_employeur', array('class' => "form-control", 'label' => "Employer Address", 'placeholder' => 'Employer Address')); ?>
              </div>
          </div>
      </div>
      <?= $this->Form->end() ?>
  </div>
  <div class="panel-footer"></div>
</div>
