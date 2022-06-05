<?php

class FakePerson{
  
  private $first_name;
  private $last_name;
  private $email;
  private $gender;
  private $ip_address;
  private $photo;
  private $social_midia;
  private $data_create;
  private $about;
  private $data_update;
  private $office;

  //Method GETs
  public function getFirstName(){
    return $this->first_name;
  }
  public function getLastName(){
    return $this->last_name;
  }
  public function getEmail(){
    return $this->email;
  }
  public function getGender(){
    return $this->gender;
  }
  public function getIpAddress(){
    return $this->ip_address;
  }
  public function getPhoto(){
    return $this->photo;
  }
  public function getSocialMidia(){
    return $this->social_midia;
  }
  public function getDataCreate(){
    return $this->data_create;
  }
  public function getAbout(){
    return $this->about;
  }
  public function getDataUpDate(){
    return $this->data_update;
  }
  public function getOffice(){
    return $this->office;
  }
  //Method SETs
  public function setFirstName($first_name){
    $this->first_name = $first_name;
  }
  public function setLastName($last_name){
    $this->last_name = $last_name;
  }
  public function setEmail($email){
    $this->email = $email;
  }
  public function setGender($gender){
    $this->gender = $gender;
  }
  public function setIpAddress($ip_address){
    $this->ip_address = $ip_address;
  }
  public function setPhoto($photo){
    $this->photo = $photo;
  }
  public function setSocialMidia($social_midia){
    $this->social_midia = $social_midia;
  }
  public function setDataCreate($data_create){
    $this->data_create = $data_create;
  }
  public function setAbout($about){
    $this->about = $about;
  }
  public function setDataUpdate($data_update){
    $this->data_update = $data_update;
  }
  public function setOffice($office){
    $this->office = $office;
  }

}

?>