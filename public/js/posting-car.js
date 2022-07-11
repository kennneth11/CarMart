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


        // "rgba(0, 0, 0, 0) url('../images/1920x830.jpg') no-repeat fixed center center / cover" ;


    $(window).on('load', function() {
        var pic = document.getElementById("backgroundCar").src
        document.getElementById("carBanner").style.background = "rgba(0, 0, 0, 0) url("+pic +") no-repeat fixed center center / cover" ;
    });

    $(window).on('load', function() {

        var cust = document.getElementsByClassName("my-img");
        for(i=0; i<cust.length; i++) {
            cust[i].style.height = "50vh";
        }

        var cust1 = document.getElementsByClassName("img-nav-selector");
        for(i=0; i<cust1.length; i++) {
            cust1[i].style.height = "7vh";
        }
    });


    function previewImages() {
        var preview = document.querySelector('#preview');


        var res = document.getElementsByClassName("uploadImage");
        for(i=0; i<res.length; i) {
            res[i].remove();
        }

        if (this.files) {
        [].forEach.call(this.files, readAndPreview);
        }
    
        
        
        function readAndPreview(file) {
    
            // Make sure `file.name` matches our extensions criteria
            if (!/\.(jpe?g|png|gif)$/i.test(file.name)) {
                return alert(file.name + " is not an image");
            } // else...

            
            var reader = new FileReader();

            
            
            reader.addEventListener("load", function() {
                

                divElement = document.createElement('div');
                var image = new Image();
                image.height = 95;
                image.title  = file.name;
                image.src    = this.result;
                image.className  = "img-fluid";
                divElement.innerHTML = "";
                divElement.appendChild(image);
                divElement.classList.add("uploadImage");
                divElement.classList.add("wrapper");
                divElement.classList.add("upload_more_img");
                preview.appendChild(divElement);
            });
        
            reader.readAsDataURL(file);
        }
    }

    // rgba(0, 0, 0, 0) url("../images/1920x830.jpg") no-repeat fixed center center / cover ;
  
  document.querySelector('#file-input').addEventListener("change", previewImages);


    