<?php
class FakePersonDAO{
  
  public function getAllFakePersons(){
    $connect = new Connection();
    $connect = $connect->Connection();
    $stmt = $connect->prepare("SELECT * FROM fake_person");
    $stmt->execute();
    $fake_persons = $stmt->fetchAll();
    $stmt = null;

    return $fake_persons;
  }

  public function getFakePersonId($id){
    $connect = new Connection();
    $connect = $connect->Connection();
    $stmt = $connect->prepare("SELECT * FROM fake_person WHERE id = :id");
    $stmt->bindParam("id", $id);
    $stmt->execute();
    $fake_person = $stmt->fetchAll();
    $stmt = null;

    return $fake_person;
  }
}

?>