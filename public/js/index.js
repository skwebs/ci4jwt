document.addEventListener('DOMContentLoaded', function () {
  const _ = (elems) => {
    return document.querySelector(elems);
  }
  if (localStorage.token === undefined) {
    window.location.href = BASE_URL + "/login";
  } else {
    window.location.href = BASE_URL + "/dashboard";
  }
})

