const URL = window.location.href;
        const index = window.location.href.search("resend-email-verification.php") + 29;

        if ((URL.length !== index) && window.performance.navigation.type === 1) {
            window.location.href = URL.slice(0, index);
        }

       

