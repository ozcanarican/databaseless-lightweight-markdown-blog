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

// const callback = (entries, observer) => {
//   entries.forEach((entry) => {
//     if (entry.isIntersecting) {
//       alert("load more");
//     }
//   });
// };

// const more = document.getElementById("more");
// if (more) {
//   let options = {
//     root: null,
//     rootMargin: "0px",
//     threshold: 1,
//   };
//   let observer = new IntersectionObserver(callback, options);
//   observer.observe(more);
// }
