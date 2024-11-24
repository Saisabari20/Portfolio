document.getElementById("contactForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent form from submitting normally

    const formData = new FormData(this);

    fetch("PHP/send_mail.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        document.getElementById("responseMessage").innerHTML = data; // Display response from PHP
        document.getElementById("contactForm").reset(); // Optional: reset the form after submission
    })
    .catch(error => {
        document.getElementById("responseMessage").innerHTML = "<p>Error: Could not submit form.</p>";
    });
});
