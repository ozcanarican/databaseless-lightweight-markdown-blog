const popups = Array.from(document.querySelectorAll(".popup"));
popups.map((p, index) => {
  p.addEventListener("click", (e) => {
    e.target.style.display = "none";
  });
});
const popupContents = Array.from(document.querySelectorAll(".popup-content"));
popupContents.map((p, index) => {
  p.addEventListener("click", (e) => {
    e.stopPropagation();
  });
});
document.getElementById("iletisim").addEventListener("click", (e) => {
  document.getElementById("piletisim").style.display = "flex";
});

document.getElementById("contact").addEventListener("submit", (e) => {
  e.preventDefault();
  console.log(e.target.elements);
  let fd = new FormData();
  fd.append("test", "asd");
  Array.from(e.target.elements).forEach((el) => {
    if (el.nodeName === "INPUT" || el.nodeName === "TEXTAREA") {
      fd.append(el.getAttribute("name"), el.value);
    }
  });
  e.target.style.display = "none";
  fetch("postmail.php", { body: fd, method: "POST" })
    .then((r) => r.text())
    .then((r) => console.log(r));
  e.target.parentNode.appendChild(
    document.createTextNode("Mesajınız gönderildi")
  );
});
