const users_list = document.querySelector(".users-list");
const logoutBtn = document.querySelector(".user-data a");

logoutBtn.addEventListener("click", () => {
  const logoutxhr = new XMLHttpRequest();
  logoutxhr.open("GET", "php/logout.php", true);
  logoutxhr.open = () => {
    if (logoutxhr.readyState == XMLHttpRequest.DONE) {
      if (logoutxhr.status == 200) {
        let data = logoutxhr.response;
        if (!data == "NO") {
          location.href = "login.php";
        }
      }
    }
  };

  logoutxhr.send();
});

setInterval(() => {
  const xhr = new XMLHttpRequest();
  xhr.open("GET", "php/users.php", true);
  xhr.onload = () => {
    if (xhr.readyState == XMLHttpRequest.DONE) {
      if (xhr.status == 200) {
        let data = xhr.response;
        users_list.innerHTML = data;
      }
    }
  };
  xhr.send();
}, 500);
