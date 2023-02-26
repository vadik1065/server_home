(() => {
  let autorisactSec = document.getElementById("autorisation");
  autorisactSec.addEventListener("submit", (e) => {
    e.preventDefault();
    let target = e.target;
    let writtenPass = target.querySelector("input[type = password]").value;
    let name = target.name;
    let formInfo = {
      name: name,
      password: writtenPass,
    };

    fetch("../model/autorisation.php", { method: "post", body: JSON.stringify(formInfo) }).then(
      async (response) => {
        let resText = JSON.parse(await response.text());
        if (!resText.success) {
          alert("неверные данные");
          return;
        }

        if (resText.autoris) {
          // localStorage.setItem('savePass',savePass);
          const event = new CustomEvent("autorisateSuc", {
            bubbles: false,
            detail: { autoris: resText.autoris },
          });
          document.dispatchEvent(event);
        }
      }
    );
  });
})();
