document.querySelector('.contactForm').addEventListener('submit', function (e) {
    e.preventDefault(); // Cegah pengiriman default

    const formData = new FormData(this);

    fetch('contactform/contactform2.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        if (data.trim() === 'OK') {
            Swal.fire({
                title: 'Success!',
                text: 'Your message has been sent.',
                icon: 'success',
                confirmButtonText: 'OK'
            });
            this.reset(); // Kosongkan form setelah pengiriman
        } else {
            Swal.fire({
                title: 'Error!',
                text: 'There are still empty columns.',
                // text: data.trim(),
                icon: 'error',
                confirmButtonText: 'Try Again'
            });
        }
    })
    .catch(error => {
        Swal.fire({
            title: 'Oops...',
            text: 'Something went wrong. Please try again later.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
    });
});
