// CONTROLS FILE SYSTEM ADD FILES
(() => {
  let fileSystem = document.getElementById("web-filesystem");
  fileSystem.addEventListener("submit", (e) => {
    e.preventDefault();
    let file = e.currentTarget.querySelector("input[type = file]").files[0];
    let data = new FormData();
    data.append("file", file);
    data.append("name", "f1.zip");

    fetch("../../model/saveFile.php", { method: "POST", body: data });
  });
})();
