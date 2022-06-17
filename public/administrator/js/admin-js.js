function viewMaker(id, name,) {
    document.getElementById("modal_Maker_id").value = id;
    document.getElementById("modal_Maker_name").value = name;

    var pic = document.getElementById(id+name).src; 
    document.getElementById("maker_picture_modal").src= pic; 
    $('#view_maker_modal').modal('show');
  }
  

  function viewModel(id, name, maker) {
    document.getElementById("modal_Model_id").value = id;
    document.getElementById("modal_Model_name").value = name;
    document.getElementById("modal_Model_maker").value = maker;

    $('#view_model_modal').modal('show');
  }

  function view(id, name, modal) {

    if(modal == "#view_bodytype_modal"){
        document.getElementById("modal_bodytype_id").value = id;
        document.getElementById("modal_bodytype_name").value = name;
    }
    if(modal == "#view_transmission_modal"){
        document.getElementById("modal_transmission_id").value = id;
        document.getElementById("modal_transmission_name").value = name;
    }
    if(modal == "#view_fueltype_modal"){
        document.getElementById("modal_fueltype_id").value = id;
        document.getElementById("modal_fueltype_name").value = name;
    }

    $(modal).modal('show');
  }
