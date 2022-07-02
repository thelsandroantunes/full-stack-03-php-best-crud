<?php
  include '../config/connect.php';
  include '../models/FakePerson.php';
  include '../models/FakePersonDAO.php';

  $id = filter_input(INPUT_POST,"id");
  $FakePerson = new FakePerson();
  $FakePersonDAO = new FakePersonDAO();
  $FakePerson = $FakePersonDAO->getFakePersonId($id);
?>

  <div class="modal-header">
    <h5 class="modal-title">Edit User</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar" onclick="fecharModal()">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body p-4">
    <form method="post">
      <!-- 2 column grid layout with text inputs for the first and last names -->
      <div class="row mb-4">
        <div class="col">
          <div class="form-outline">
            <input type="text" name="fake_first_edit" id="fake_first_edit" class="form-control" value="<?= $FakePerson->getFirstName() ?> "/>
            <label class="form-label" for="fake_first_edit">First name</label>
          </div>
        </div>
        <div class="col">
          <div class="form-outline">
            <input type="text" name="fake_last_edit" id="fake_last_edit"  class="form-control" value="<?= $FakePerson->getLastName() ?> "/>
            <label class="form-label" for="fake_last_edit">Last name</label>
          </div>
        </div>
      </div>
      <!-- Text input -->
      <div class="form-outline mb-4">
        <input type="text" name="fake_gender_edit" id="fake_gender_edit" class="form-control" value="<?= $FakePerson->getGender() ?> "/>
        <label class="form-label" for="fake_gender_edit">Gender</label>
      </div>
      <!-- Text input -->
      <div class="form-outline mb-4">
        <input type="text" name="fake_company_edit" id="fake_company_edit"  class="form-control" value="<?= $FakePerson->getCompany() ?> "/>
        <label class="form-label" for="fake_company_edit">Company Name</label>
      </div>
      <!-- Text input -->
      <div class="form-outline mb-4">
        <input type="text" name="fake_office_edit" id="fake_office_edit"  class="form-control" value="<?= $FakePerson->getOffice() ?> "/>
        <label class="form-label" for="fake_office_edit">Office</label>
      </div>
      <!-- Email input -->
      <div class="form-outline mb-4">
        <input type="email" name="fake_email_edit" id="fake_email_edit"   class="form-control" value="<?= $FakePerson->getEmail() ?> "/>
        <label class="form-label" for="fake_email_edit">Email</label>
      </div>
      <!-- Text input -->
      <div class="form-outline mb-4">
        <input type="text" name="fake_ip_edit" id="fake_ip_edit"   class="form-control" value="<?= $FakePerson->getIpAddress() ?> " />
        <label class="form-label" for="fake_ip_edit">IP Address</label>
      </div>

      <!-- Text input -->
      <div class="form-outline mb-4">
        <input type="text" name="fake_social_edit" id="fake_social_edit"   class="form-control" value="<?= $FakePerson->getSocialMidia() ?> "/>
        <label class="form-label" for="fake_social_edit">Social Midia</label>
      </div>

      <!-- Message input -->
      <div class="form-outline mb-4">
        <textarea class="form-control" name="fake_about_edit" id="fake_about_edit"   rows="4" ><?= $FakePerson->getAbout() ?></textarea>
        <label class="form-label" for="fake_about_edit">About</label>
      </div>
      <input type="hidden" name="fake_id_edit" id="fake_id_edit"   class="form-control" value="<?= $FakePerson->getId() ?> "/>
    </form>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-danger" onclick="fecharModal()">Close</button>
    <button type="button" class="btn btn-primary" onclick="save_editModal()">Save changes</button>
  </div>
