document.addEventListener('DOMContentLoaded', function () {
  const _ = (elems) => {
    return document.querySelector(elems);
  }
  // alert(BASE_URL);
  const emailField = _("#emailField");
  const passwordField = _("#passwordField");
  const loginBtn = _("#loginBtn");
  loginBtn.addEventListener('click', function (e) {
    e.preventDefault();
    e.stopPropagation();
    const email = emailField.value;
    const password = passwordField.value;
    if (email.length === 0) {
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
        email: email,
        password: password
      };
      const url = BASE_URL + "/api/v1/auth/login";

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
            localStorage.setItem("name", JSON.stringify(data.data.name));
            window.location.href = BASE_URL + "/dashboard";
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

