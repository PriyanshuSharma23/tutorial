import { StatusText } from "./status.js";

const form = document.querySelector("form");
const statusEl = document.querySelector("[data-status]");

const statusText = new StatusText(statusEl);

form.onsubmit = function (e) {
  e.preventDefault();

  let data = new FormData(form);

  statusText.show("Sending...", "neutral");
  const xhr = new XMLHttpRequest();

  //TODO: Add your own API endpoint
  xhr.open("POST", "http://localhost:8080/tutorial/message.php", true);

  xhr.onreadystatechange = () => {
    if (xhr.readyState === 4 && xhr.status === 200) {
      statusText.show("Registered!", "success");
    }

    // status code 400
    if (xhr.readyState === 4 && xhr.status === 400) {
      statusText.show(`Error! ${xhr.responseText}`, "error");
    }
  };

  xhr.send(data);
};
