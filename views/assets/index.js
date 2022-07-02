function fecharModal(){
  $('#modalEdit').modal('hide');
  $('.modal-backdrop').hide();
}

//View User
  view_user = document.getElementsByClassName('view');
  Array.from(view_user).forEach((element) => {
    element.addEventListener("click", (e) => {

      console.log("view => " + e.target.id);

      tr = e.target.parentNode.parentNode.parentNode;
      qty_td = tr.getElementsByTagName("td");
      const arrayClassName = ['fake_name', 'fake_email', 'fake_img'];
      const arrayIdName = [ 'nameModal', //0
                            'emailModal',//1
                            'imgModal',//2
                            'genderModal', //3
                            'ipModal',//4
                            'dataCreatedModal',//5
                            'dataUpdateModal', //6
                            'aboutModal',//7
                            'socialMidiaModal', //8
                            'officeModal',//9
                            'companyModal',//10
                          ];
      let arrayVariables = [];

      for (let index = 0; index < qty_td.length; index++) {
        if(index == 0){
          arrayClassName.forEach((element, i) => {
            if (i != 2) {
              arrayVariables.push(qty_td[1].getElementsByClassName(element)[index].innerText);
            }else{
              arrayVariables.push(qty_td[1].getElementsByClassName(element)[index].src);
            }
          });
        }else if(index == 1 || index == 6){
        }else{
          arrayVariables.push(tr.getElementsByTagName("td")[index].innerText);
        }
      }

      arrayIdName.forEach((element, index) => {
        if (index == 2) {
          document.getElementById(element).setAttribute("src", arrayVariables[index]);
        }else if(index == 6 || index == 8){
        }else if(index == 9){
          if(arrayVariables[index] == ""){
            document.getElementById(element).textContent = 'Fake Office';
          }else{
            document.getElementById(element).textContent = arrayVariables[index];
          }
        }else if(index == 10){
          if(arrayVariables[index] == ""){
            document.getElementById(element).textContent = 'Fake Company';
          }else{
            document.getElementById(element).textContent = arrayVariables[index];
          }
        }else{
          document.getElementById(element).textContent = arrayVariables[index];
        }
      });

    })
  });
//Edit User
 function editModal(id) {
  $.ajax({
      data: {id:id},
      type: 'POST',
      url:'../controllers/editModal.php',
      beforeSend:function() {
          $('#modalEdit').modal('show');
      },
      success:function(html) {
          $('#modalEdit').find('.modal-content').html(html);
          $('#modalEdit').find('.modal-content').find('form');
          $('#modalEdit').find('show');
      }
  });
}
 //Save Edit
  function save_editModal(){
    console.log('ENTROU');
    fake_first_edit = document.getElementById("fake_first_edit").value;

    fake_last_edit = document.getElementById("fake_last_edit").value;

    fake_email_edit = document.getElementById("fake_email_edit").value;

    //fake_img_edit = document.getElementById("fake_img_edit").value;

    fake_gender_edit = document.getElementById("fake_gender_edit").value;
    fake_ip_edit = document.getElementById("fake_ip_edit").value;
    fake_about_edit = document.getElementById("fake_about_edit").value;
    fake_social_edit = document.getElementById("fake_social_edit").value;
    fake_office_edit = document.getElementById("fake_office_edit").value;
    fake_company_edit = document.getElementById("fake_company_edit").value;
    fake_id_edit = document.getElementById("fake_id_edit").value;

console.log(fake_id_edit)
    $.ajax({
      data: {
        fake_first_edit: fake_first_edit,
        fake_last_edit: fake_last_edit,
        fake_email_edit: fake_email_edit,
        fake_gender_edit: fake_gender_edit,
        fake_ip_edit: fake_ip_edit,
        fake_about_edit: fake_about_edit,
        fake_social_edit: fake_social_edit,
        fake_office_edit: fake_office_edit,
        fake_company_edit: fake_company_edit,
        fake_id_edit:fake_id_edit,
      },
      type: "POST",
      url: "../controllers/editModalValid.php",
      success: function(data){
        if(data == "success"){
          console.log('Success save edit');
          window.location.href = '../index.php';
        }
        if (data == 'teste') {
          console.log('dont');
        }
      }
    });

  }