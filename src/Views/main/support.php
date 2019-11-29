<?php
# @Author: Anis KASMI
# @Date:   2019-03-26T02:07:51+02:00
# @Email:  contact@aniskasmi.com
# @Filename: support.php
# @Last modified by:   Anis KASMI
# @Last modified time: 2019-04-14T15:20:33+03:00
# @Copyright: Skyreka Studio (skyreka.com)

$this->layout('layout/layout');
?>
<div class="container-fluid">
  <div class="row page-titles">
    <div class="col-md-12 align-self-center">
      <h3 class="text-themecolor">Support</h3>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Nous contacter</h4>
          <h6 class="card-subtitle">Nous sommes disponibles du lundi au vendredi de 8 h à 17 h</h6>
          <div class="d-flex">
            <div class="m-r-20 align-self-center">
              <h1><i class="ti-email"></i></h1></div>
            <div>
              <h3 class="card-title">contact@lmsdesign.fr</h3>
              <h6 class="card-subtitle">E.mail</h6>
            </div>
          </div>
          <div class="d-flex">
            <div class="m-r-20 align-self-center">
              <h1><i class="ti-headphone"></i></h1></div>
            <div>
              <h3 class="card-title">06.75.15.16.61</h3>
              <h6 class="card-subtitle">Téléphone</h6>
            </div>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Une question, une réponse immédiate</h4>
          <h6 class="card-subtitle">N'hésitez pas à nous contacter si vous avez une question supplémentaire</h6>
          <!-- Accordian-part -->
          <div id="accordian-part">
            <div id="accordian-3">
              <?php foreach ($faq::findAll(NULL, NULL, true) as $faq): ?>
              <div class="card m-b-0 border-0">
                <div class="card-header p-l-0">
                  <h5 class="mb-0">
                    <a href="#" class="link p-10" id="headingOne" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                      <?= $faq->getQuestion(); ?>
                    </a>
                  </h5>
                </div>
                <div id="collapse1" class="collapse" aria-labelledby="headingOne" data-parent="#accordian-3">
                  <div class="card-body p-l-0">
                    <?= $faq->getReply(); ?>
                  </div>
                </div>
              </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
