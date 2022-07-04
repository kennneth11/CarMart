function getMaker(selectObject) {
    var value = selectObject.value;  

    var res = document.getElementsByClassName("model-options");
    for(i=0; i<res.length; i++) {
        res[i].style.display = "none";
    }

    var selected = document.getElementsByClassName(value);
    for(i=0; i<selected.length; i++) {
        selected[i].style.display = "block";
    }
  }