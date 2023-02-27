(() => {
  let headElem = document.querySelector("head");

  headElem.addScript = (puth) => {
    let script = headElem.appendChild(document.createElement("script"));
    script.setAttribute("src", "./control/" + puth);
  };

  let controlPuths = [
    "CTRLautorisation.js",
    "CTRLautorisateSuc.js",
    "fileSystem/CTRLFSaddFiles.js",
  ];
  controlPuths.forEach((puth) => headElem.addScript(puth));

  document.addEventListener("change_state", (e) => {
    let oldElem = document.getElementById("content-" + window.globalThis.CURRENT_STATE);
    oldElem.classList.add("hide");
    let newState = e.detail.CURRENT_STATE;
    window.globalThis.CURRENT_STATE = newState;
    let newElem = document.getElementById("content-" + window.globalThis.CURRENT_STATE);
    newElem.classList.remove("hide");
  });
})();
