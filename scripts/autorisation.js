(() => {
  let autorisactSec = document.getElementById("autorisation");
  autorisactSec.addEventListener("submit", (e) => {
    e.preventDefault();
    let target = e.target;
    let writtenPass = target.querySelector("password");
    log;
    let name = target.name;
    console.log(name);
  });
})();
