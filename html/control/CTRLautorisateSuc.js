(() => {
  const dispatchState = () => {
    const event = new CustomEvent("change_state", {
      bubbles: false,
      detail: { CURRENT_STATE: window.globalThis.CONTROL_STATE.JUST_LOGGED_IN },
    });
    document.dispatchEvent(event);
  };

  let autoris = localStorage.getItem("autoris");
  if (autoris) {
    fetch("../model/autorisation.php", { method: "post", body: autoris }).then(async (response) => {
      let resText = JSON.parse(await response.text());
      if (resText.success) {
        dispatchState();
        return;
      }
    });
  }

  document.addEventListener(
    "autorisateSuc",
    (e) => {
      if (e.detail.autoris) {
        localStorage.setItem("autoris", JSON.stringify(e.detail.autoris));
        dispatchState();
      }
    },
    false
  );
})();
