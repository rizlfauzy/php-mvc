const hambuger_btn = document.querySelector("#hamburger"),
  header = document.querySelector("header");

function call_data({ url, method, body }) {
  return fetch(url, {
    method,
    mode: "cors",
    body: JSON.stringify(body),
    headers: {
      "Content-Type": "application/json",
    },
  }).then(async (res) => {
    const response_json = await res.json();
    if (res.status === 302) window.location.reload();
    if (res.ok) return response_json;
    return response_json;
  });
}

hambuger_btn.addEventListener("click", function (e) {
  const nav_menu = hambuger_btn.nextElementSibling;
  hambuger_btn.classList.toggle("hamburger-active");
  nav_menu.classList.toggle("hidden");
});

window.addEventListener("scroll", function (e) {
  const fixed_nav = header.offsetTop;
  window.pageYOffset > fixed_nav
    ? header.classList.add("navbar-fixed")
    : header.classList.remove("navbar-fixed");
});
