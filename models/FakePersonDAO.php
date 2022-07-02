<?php
require_once('../config/connect.php');

class FakePersonDAO{

  public static function getAllFakePersons(){
    $connect = new Connection();
    $connect = $connect->Connection();
    $stmt = $connect->prepare("SELECT * FROM fake_person LIMIT 15");
    $stmt->execute();
    $fake_persons = $stmt->fetchAll();
    $stmt = null;

    return $fake_persons;
  }

  public static function getFakePersonId($id){
    $connect = new Connection();
    $connect = $connect->Connection();
    $stmt = $connect->prepare("SELECT * FROM fake_person WHERE id = :id");
    $stmt->bindParam("id", $id);
    $stmt->execute();
    $object = $stmt->fetchAll();
    $stmt = null;

    $fake_person = new FakePerson();

    if($object != null){
      $fake_person->setId($object[0]['id']);
      $fake_person->setFirstName($object[0]['first_name']);
      $fake_person->setLastName($object[0]['last_name']);
      $fake_person->setEmail($object[0]['email']);
      $fake_person->setOffice($object[0]['office']);
      $fake_person->setAbout($object[0]['about']);
      $fake_person->setGender($object[0]['gender']);
      $fake_person->setIpAddress($object[0]['ip_address']);
      $fake_person->setSocialMidia($object[0]['social_midia']);
      $fake_person->setCompany($object[0]['company']);
      return $fake_person;
    }else{
      return false;
    }
  }

  public static function updatePerson(array $inputs){

    try {

    $connect = new Connection();
    $connect = $connect->Connection();
    $stmt = $connect->prepare(" UPDATE fake_person
                                SET about = :about,
                                company = :company,
                                email = :email,
                                first_name = :first_name,
                                last_name = :last_name,
                                gender = :gender,
                                ip_address = :ip_address,
                                office = :office,
                                social_midia = :social_midia,
                                WHERE id = :id"
                              );
    $stmt->bindValue(":id", $inputs['fake_id_edit']);
    $stmt->bindValue(":about", $inputs['fake_about_edit']);
    $stmt->bindValue(":company", $inputs['fake_company_edit']);
    $stmt->bindValue(":email", $inputs['fake_email_edit']);
    $stmt->bindValue(":first_name", $inputs['fake_first_edit']);
    $stmt->bindValue(":last_name", $inputs['fake_last_edit']);
    $stmt->bindValue(":gender", $inputs['fake_gender_edit']);
    $stmt->bindValue(":ip_address", $inputs['fake_ip_edit']);
    $stmt->bindValue(":office", $inputs['fake_office_edit']);
    $stmt->bindValue(":social_midia", $inputs['fake_social_edit']);
    
    var_dump($stmt->execute());
    print_r('OK');
    exit();
    if($stmt->rowCount() > 0){
      echo 'success';
      return true;
    } else {
        return false;
    }

    } catch (Exception $e) {
      return $e->getMessage();
    }
  }

}

?>