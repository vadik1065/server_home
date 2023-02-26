(() => {
  let headElem = document.querySelector("head");
  headElem.addScript = (puth) => {
    let script = headElem.appendChild(document.createElement("script"));
    script.setAttribute("src", "./control/" + puth);
  };

  let controlPuths = ["CTRLautorisation.js", "CTRLautorisateSuc.js"];

  controlPuths.forEach((puth) => {
    headElem.addScript(puth);
  });
})();
