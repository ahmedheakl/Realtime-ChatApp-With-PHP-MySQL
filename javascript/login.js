const form = document.querySelector(".login");
const errorText = document.querySelector(".error-message");

form.addEventListener("submit", (e) => {
  e.preventDefault();
  const xhr = new XMLHttpRequest();
  xhr.open("POST", "php/login.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status == 200) {
        let data = xhr.response;
        if (data == "OK") {
          location.href = "users.php";
        } else {
          errorText.style.display = "block";
          errorText.innerHTML = data;
        }
      }
    }
  };
  let form_data = new FormData(form);
  xhr.send(form_data);
});
