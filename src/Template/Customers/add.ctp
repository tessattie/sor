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
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Profile</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="references-tab" data-toggle="tab" href="#references" role="tab" aria-controls="references" aria-selected="true">References</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="documents-tab" data-toggle="tab" href="#documents" role="tab" aria-controls="documents" aria-selected="true">Documents</a>
  </li>
</ul>

<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
  <?= $this->Form->create($customer) ?>
  <?= $this->Form->button(__('Submit'), array('class' => "btn btn-success", "style" => "    float: right;
    margin-top: -79px;
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
              <h4 style = "margin-right: -20px;margin-left: -20px;margin-top:25px; padding-left: 10px;background: #ddd;padding-top: 10px;padding-bottom: 10px;">Employer Information</h4>
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
  <div class="tab-pane fade" id="documents" role="tabpanel" aria-labelledby="documents-tab">...</div>
  <div class="tab-pane fade" id="references" role="tabpanel" aria-labelledby="references-tab">...</div>
</div>

<div class="customers form large-9 medium-8 columns content">
    
</div>
