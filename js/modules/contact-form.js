export function contactForm() {
  const form = document.querySelector("#contact-form");
  const feedBack = document.querySelector("#feedback");

  function regForm(event) {
    event.preventDefault();
    const url = "http://localhost/vazhavilayil_rebin_portfolio_final/adduser.php"; // URL to the PHP script
    const thisform = event.currentTarget;

    // Prepare form data
    const formdata =
      "fname=" +
      encodeURIComponent(thisform.elements.firstname.value) + // Map firstname to fname
      "&lname=" +
      encodeURIComponent(thisform.elements.lastname.value) + // Map lastname to lname
      "&city=" +
      encodeURIComponent("Unknown") + // Add a default city value
      "&email=" +
      encodeURIComponent(thisform.elements.email.value);

    console.log(formdata);

    // Send the data via AJAX
    fetch(url, {
      method: "POST",
      headers: {
          "Content-Type": "application/x-www-form-urlencoded"
      },
      body: formdata
  })
      .then((response) => response.json())
      .then((responseText) => {
        console.log(responseText);
        feedBack.innerHTML = "";
        if (responseText.errors) {
          responseText.errors.forEach((error) => {
            const errorElement = document.createElement("p");
            errorElement.textContent = error;
            feedBack.appendChild(errorElement);
          });
        } else {
          form.reset();
          const messageElement = document.createElement("p");
          messageElement.textContent = responseText.message;
          feedBack.appendChild(messageElement);
        }
      })
      .catch((error) => {
        console.log(error);
        feedBack.innerHTML = "";
        const messageElement = document.createElement("p");
        messageElement.textContent =
          "An error occurred. Please try again later.";
      });
  }

  form.addEventListener("submit", regForm);
}