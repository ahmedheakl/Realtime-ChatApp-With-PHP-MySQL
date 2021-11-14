const form = document.querySelector(".send-message-form");
const inputVal = document.querySelector(
  ".send-message-form input[name='message']"
);
const chat_box = document.querySelector(".chat-box");

form.addEventListener("submit", (e) => {
  e.preventDefault();
  const xhr = new XMLHttpRequest();
  xhr.open("POST", "php/insert_chats.php", true);
  xhr.onload = () => {
    if (xhr.readyState == XMLHttpRequest.DONE) {
      if (xhr.status == 200) {
        let data = xhr.response;
        if (data == "OK") {
          inputVal.value = "";
          getMessages();
        }
      }
    }
  };
  const form_data = new FormData(form);
  xhr.send(form_data);
});

setInterval(() => {
  getMessages();
}, 1000);

function getMessages() {
  const xhr = new XMLHttpRequest();
  xhr.open("POST", "php/get_chats.php", true);
  xhr.onload = () => {
    if (xhr.readyState == XMLHttpRequest.DONE) {
      if (xhr.status == 200) {
        let data = xhr.response;
        chat_box.innerHTML = data;
      }
    }
  };
  const form_data = new FormData(form);
  xhr.send(form_data);
}
