document.addEventListener('DOMContentLoaded', function () {
  const _ = (elems) => {
    return document.querySelector(elems);
  }
  alert(BASE_URL);
  const emailField = _("#emailField");
  const passwordField = _("#passwordField");
  const loginBtn = _("#loginBtn");
  loginBtn.addEventListener('click', function (e) {
    e.preventDefault();
    e.stopPropagation();
    const email = emailField.value;
    const password = passwordField.value;
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
          localStorage.setItem("token", data.data.token);
          window.location.href = BASE_URL + "/dashboard";
        } else {
          alert(data.message);
        }
      })
      .catch(err => console.log(err));
  });
})

