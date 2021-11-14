const drop_down = document.querySelector(".dropdown");
const dropdown_content = document.querySelector(".dropdown-content");
const emojis = document.querySelectorAll(".dropdown-content a");
const message = document.querySelector('input[name="message"]');

emojis.forEach((emoji) => {
  emoji.addEventListener("click", () => {
    message.value += emoji.innerHTML;
  });
});

drop_down.addEventListener("click", (e) => {
  e.preventDefault();
  if (dropdown_content.style.display == "block") {
    dropdown_content.style.display = "none";
  } else {
    dropdown_content.style.display = "block";
  }
});
