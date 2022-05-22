<?php
class FakePersonDAO{
  
  public function allFakePersons(){
    $connect = new Connection();
    $connect = $connect->Connection();
    $stmt = $connect->prepare("SELECT * FROM fake_person");
    $stmt->execute();
    $fake_persons = $stmt->fetchAll();
    $stmt = null;

    return $fake_persons;
  }
}

?>