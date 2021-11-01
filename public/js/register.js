document.addEventListener('DOMContentLoaded', function () {
  const _ = (elems) => {
    return document.querySelector(elems);
  }
  // alert(BASE_URL);
  const nameField = _("#nameField");
  const emailField = _("#emailField");
  const passwordField = _("#passwordField");
  const registerBtn = _("#registerBtn");
  registerBtn.addEventListener('click', function (e) {
    e.preventDefault();
    e.stopPropagation();
    const name = nameField.value;
    const email = emailField.value;
    const password = passwordField.value;

    if (name === 0) {
      alert("Please enter your name");
      return;
    } else if (name < 3) {
      alert("Name must be at least 3 characters");
      return;
    } else if (email.length === 0) {
      alert("Email is required");
      return;
    } else if (email.length < 6) {
      alert("Email must be at least 6 characters");
      return;
    }
    else if (password.length === 0) {
      alert("Password is required");
      return;
    } else if (password.length < 8) {
      alert("Password must be at least 8 characters");
      return;
    } else {
      const user = {
        name: name,
        email: email,
        password: password
      };
      const url = BASE_URL + "/api/v1/auth/register";

      const options = {
        method: "POST",
        body: JSON.stringify(user),
        headers: {
          "Content-Type": "application/json"
        }
      };
      fetch(url, options)
        .then(res => res.json())
        .then(data => {
          if (data.status === "success") {
            localStorage.setItem("token", data.token);
            window.location.href = BASE_URL + "/login";
          } else {
            console.log(data);
            alert(JSON.stringify(data));
          }
        })
        .catch(err => console.log(err));
    }
  });
  if (localStorage.token !== undefined) {
    window.location.href = BASE_URL + "/dashboard";
  }
})

