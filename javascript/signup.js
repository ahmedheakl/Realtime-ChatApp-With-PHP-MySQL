const form = document.querySelector(".form");
const signBtn = document.querySelector(".form button");
const errorText = document.querySelector(".error-message");

form.addEventListener("submit", (e) => {
  e.preventDefault();
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "php/signup.php", true);
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
