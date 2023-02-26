(() => {
  let autoris = localStorage.getItem("autoris");
  if (autoris) {
    fetch("../model/autorisation.php", { method: "post", body: autoris }).then(async (response) => {
      let resText = JSON.parse(await response.text());
      if (resText.success) {
        console.log("autoris");
        return;
      }
    });
  }

  document.addEventListener(
    "autorisateSuc",
    (e) => {
      console.log(e);
      if (e.detail.autoris) {
        localStorage.setItem("autoris", JSON.stringify(e.detail.autoris));
        console.log("autoris");
      }
    },
    false
  );
})();
