const toggleBtn = document.querySelector(".field i");
const passwordInput = document.querySelector('input[name="password"]');

toggleBtn.addEventListener("click", () => {
  //   toggleBtn.classList.add("hide-tag");
  //   console.log(toggleBtn.classList);
  //   toggleBtn.classList.remove("show-tag");
  console.log(toggleBtn.classList);
  if (passwordInput.type == "text") {
    toggleBtn.classList.remove("hide-tag");
    toggleBtn.classList.add("show-tag");
    passwordInput.type = "password";
  } else {
    toggleBtn.classList.add("hide-tag");
    toggleBtn.classList.remove("show-tag");
    passwordInput.type = "text";
  }
});
