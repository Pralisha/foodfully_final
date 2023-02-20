const URL = window.location.href;
        const index = window.location.href.search("password-reset.php") + 18;

        if ((URL.length !== index) && window.performance.navigation.type === 1) {
            window.location.href = URL.slice(0, index);
        }

       

