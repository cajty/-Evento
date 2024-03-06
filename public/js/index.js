
    function validateLogin() {
        var email = document.getElementById('email').value;
        var password = document.getElementById('password').value;

        // Check if any field is empty
        if (email == "" || password == "") {
            Swal.fire({
                position: "top-end",
                icon: "error",
                title: 'Please fill in all fields',
                showConfirmButton: false,
                timer: 1500
            });
            return false;
        }

        // Validate email format
        var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(email)) {
            Swal.fire({
                position: "top-end",
                icon: "error",
                title: 'Please enter a valid email address',
                showConfirmButton: false,
                timer: 1500
            });
            return false;
        }

        // Validate password length
        if (password.length < 8) {
            Swal.fire({
                position: "top-end",
                icon: "error",
                title: 'Password must be at least 8 characters long',
                showConfirmButton: false,
                timer: 1500
            });
            return false;
        }

        return true;
    }

    function validateRegister() {
        var name = document.getElementById('name').value;

        var email = document.getElementById('email').value;
        var password = document.getElementById('password').value;

        // Check if any field is empty
        if (name == "" || email == "" || password == "") {
            Swal.fire({
                position: "top-end",
                icon: "error",
                title: 'Please fill in all fields',
                showConfirmButton: false,
                timer: 1500
            });

            return false;
        }

        // Validate email format
        var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(email)) {
            Swal.fire({
                position: "top-end",
                icon: "error",
                title: 'Please enter a valid email address',
                showConfirmButton: false,
                timer: 1500
            });

            return false;
        }

        // Validate password length
        if (password.length < 8) {
            Swal.fire({
                position: "top-end",
                icon: "error",
                title: 'Password must be at least 8 characters long',
                showConfirmButton: false,
                timer: 1500
            });

            return false;
        }

        return true;
    }

    setTimeout(function() {
        var successAlert = document.getElementById('alert');
        successAlert.style.display = 'none';
    }, 1000);
    function request(place, url){
        let xml = new XMLHttpRequest();
        xml.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById(place).innerHTML = xml.responseText;
    
            }
        };
    
        xml.open("GET", url, true);
        xml.send();
    
    }