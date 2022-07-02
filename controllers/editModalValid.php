<?php
  include '../models/FakePersonDAO.php';

  $inputs = array(
    'fake_id_edit'   => filter_input(INPUT_POST,"fake_id_edit"),
    'fake_first_edit'   => filter_input(INPUT_POST,"fake_first_edit"),
    'fake_last_edit'   => filter_input(INPUT_POST,"fake_last_edit"),
    'fake_email_edit'   => filter_input(INPUT_POST,"fake_email_edit"),
    //'fake_img_edit'   => filter_input(INPUT_POST,"fake_img_edit"),
    'fake_gender_edit'   => filter_input(INPUT_POST,"fake_gender_edit"),
    'fake_ip_edit'   => filter_input(INPUT_POST,"fake_ip_edit"),
    'fake_about_edit'   => filter_input(INPUT_POST,"fake_about_edit"),
    'fake_social_edit'   => filter_input(INPUT_POST,"fake_social_edit"),
    'fake_office_edit'   => filter_input(INPUT_POST,"fake_office_edit"),
    'fake_company_edit'   => filter_input(INPUT_POST,"fake_company_edit"),
  );

  FakePersonDAO::updatePerson($inputs);

?>





