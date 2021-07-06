
// document.querySelector("#navlogin").addEventListener("click", sample);
// window.addEventListener("load", sample);

    // Create Ajax Request for Modal Pet Data
    function petData(str) {
        if (str=="") {
           document.querySelector(".record-details").innerHTML="";
           return;
        }
         // Create XHR Object
        let xhr = new XMLHttpRequest();
       
        xhr.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.querySelector(".record-details").innerHTML=this.responseText;
             
            }
        };
            //OPEN - type,      url/file,     async
        xhr.open('GET', "petData.php?q="+str, true);
        xhr.send();
    }
   
    // Search Pet Name
    let search_menu = document.querySelector('.search-menu');

    search_menu.addEventListener('keyup', () => {
        let input, filter, tr, table_data, txtValue

        input = document.querySelector(".search-menu");
        filter = input.value.toUpperCase();
        tr = document.querySelector(".users-details");
        table_data = document.querySelectorAll(".users-details td:nth-child(2)")

        Array.from(table_data).forEach((td) =>{

            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
        
                td.parentNode.style.display = "";
            
            } else {
  
                td.parentNode.style.display = "none";
            }

        });
      
    });


