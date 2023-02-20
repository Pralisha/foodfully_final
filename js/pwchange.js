// const URL = window.location.href;
//         const index = window.location.href.search("pw-change.php") + 13;

//         if ((URL.length !== index) && window.performance.navigation.type === 1) {
//             window.location.href = URL.slice(0, index);
//         }

         //passsword visibility
         function myFunction() {
            var x = document.getElementById("myInput1");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }

            var x = document.getElementById("myInput2");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }


       

