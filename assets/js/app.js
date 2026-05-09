const navToggle = document.querySelector(".nav-toggle");
const nav = document.querySelector(".main-nav");
const headerActions = document.querySelector(".header-actions");

if (navToggle && nav && headerActions) {
  navToggle.addEventListener("click", () => {
    const expanded = navToggle.getAttribute("aria-expanded") === "true";
    navToggle.setAttribute("aria-expanded", String(!expanded));
    nav.classList.toggle("open");
    headerActions.classList.toggle("open");
  });
}

document.querySelectorAll(".filter-button").forEach((button) => {
  button.addEventListener("click", () => {
    const filter = button.dataset.filter || "all";
    document.querySelectorAll(".filter-button").forEach((item) => item.classList.remove("active"));
    button.classList.add("active");

    document.querySelectorAll(".formation-card").forEach((card) => {
      const visible = filter === "all" || card.dataset.category === filter;
      card.hidden = !visible;
    });
  });
});

document.querySelectorAll(".async-form").forEach((form) => {
  form.addEventListener("submit", async (event) => {
    event.preventDefault();

    const status = form.querySelector(".form-status");
    const submit = form.querySelector("button[type='submit']");
    if (status) {
      status.className = "form-status";
      status.textContent = "Envoi en cours...";
    }
    if (submit) submit.disabled = true;

    try {
      const response = await fetch(form.action, {
        method: "POST",
        body: new FormData(form),
        headers: { Accept: "application/json" },
      });
      const payload = await response.json();

      if (!response.ok || !payload.ok) {
        throw new Error(payload.message || "Une erreur est survenue.");
      }

      if (status) {
        status.classList.add("success");
        status.textContent = payload.message || "Demande transmise.";
      }
      form.reset();
    } catch (error) {
      if (status) {
        status.classList.add("error");
        status.textContent = error.message || "Impossible d envoyer la demande.";
      }
    } finally {
      if (submit) submit.disabled = false;
    }
  });
});
