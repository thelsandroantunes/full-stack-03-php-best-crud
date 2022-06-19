
$(document).ready(function () {
  $('#myTable').DataTable({
    "language": {
      "emptyTable": "Nenhum registro encontrado",
      "info": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
      "infoEmpty": "Mostrando 0 até 0 de 0 registros",
      "infoFiltered": "(Filtrados de _MAX_ registros)",
      "infoPostFix": "",
      "infoThousands": ".",
      "lengthMenu": "_MENU_ resultados por página",
      "loadingRecords": "Carregando...",
      "processing": "Processando...",
      "zeroRecords": "Nenhum registro encontrado",
      "search": "Pesquisar",
      "paginate": {
        "next": "Próximo",
        "previous": "Anterior",
        "first": "Primeiro",
        "last": "Último"
      },
      "aria": {
        "sortAscending": ": Ordenar colunas de forma ascendente",
        "sortDescending": ": Ordenar colunas de forma descendente"
      }
    },
    "responsive": true,
    'lengthMenu': [[5, 10, 25, 50, -1], [5, 10, 25, 50, "Todos"]],
    'lengthChange': true,
    "pagingType": "full_numbers",
    "pageLength": 5,
  });
});

viewPF = document.getElementsByClassName('view');
Array.from(viewPF).forEach((element) => {
  element.addEventListener("click", (e) => {
    console.log("ver => " + e.target.id);
    tr = e.target.parentNode.parentNode.parentNode;
    td_join = tr.getElementsByTagName("td")[1];

    let fake_name = td_join.getElementsByClassName("fake_name")[0].innerText;
    //const myArrayName = fake_name.split(" ");

    fake_email = td_join.getElementsByClassName("fake_email")[0].innerText;
    fake_img = td_join.getElementsByClassName("fake_img")[0].src;

    fake_gender = tr.getElementsByTagName("td")[2].innerText;
    fake_ip = tr.getElementsByTagName("td")[3].innerText;
    fake_data_created = tr.getElementsByTagName("td")[4].innerText;
    fake_data_update = tr.getElementsByTagName("td")[5].innerText;

    fake_about = tr.getElementsByTagName("td")[7].innerText;
    fake_social_midia = tr.getElementsByTagName("td")[8].innerText;
    fake_office = tr.getElementsByTagName("td")[9].innerText;
    fake_company = tr.getElementsByTagName("td")[10].innerText;

    document.getElementById("nameViewModal").innerText = fake_name;
    document.getElementById("imgViewModal").setAttribute("src", fake_img);
    document.getElementById("officeViewModal").textContent = ' Fake Office'+fake_office;
    document.getElementById("companyViewModal").textContent = ' Fake Company'+fake_company;
    document.getElementById("emailViewModal").textContent = ' '+fake_email;

  })
});






/*
name2 = tr.getElementsByTagName("td")[1].innerText;
name3 = tr.getElementsByTagName("td")[2].innerText;
name4 = tr.getElementsByTagName("td")[3].innerText;
name5 = tr.getElementsByTagName("td")[4].innerText;
name6 = tr.getElementsByTagName("td")[5].innerText;
name7 = tr.getElementsByTagName("td")[6].innerText;
name8 = tr.getElementsByTagName("td")[7].innerText;
name9 = tr.getElementsByTagName("td")[8].innerText;
name10 = tr.getElementsByTagName("td")[9].innerText;
name11 = tr.getElementsByTagName("td")[10].innerText;

console.log("0 => " + name1);
console.log("1 => " + name2);
console.log("2 => " + name3);
console.log("3 => " + name4);
console.log("4 => " + name5);
console.log("5 => " + name6);
console.log("6 => " + name7);
console.log("7 => " + name8);
console.log("8 => " + name9);
console.log("9 => " + name10);
console.log("10 => " + name11);*/





deletes = document.getElementsByClassName('delete');
Array.from(deletes).forEach((element) => {
  element.addEventListener("click", (e) => {
    console.log("deletar ");
    sno = e.target.id.substr(1);

    if (confirm("Tem certeza de que deseja excluir esta anotação!")) {
      console.log("sim");
      window.location = `index.php?delete=${sno}`;
      // TODO: Crie um formulário e use a solicitação de postagem para enviar um formulário
    }
    else {
      console.log("não");
    }
  })
})

edits = document.getElementsByClassName('edit');
Array.from(edits).forEach((element) => {
  element.addEventListener("click", (e) => {
    console.log("editar");
    tr = e.target.parentNode.parentNode;
    name = tr.getElementsByTagName("td")[0].innerText;
    id_no = tr.getElementsByTagName("td")[1].innerText;

    console.log(name, id_no);
    console.log(e.target.id)

    nameEdit.value = name;
    id_noEdit.value = id_no;
    snoEdit.value = e.target.id;

    $('#editModal').modal('toggle');
  })
})

