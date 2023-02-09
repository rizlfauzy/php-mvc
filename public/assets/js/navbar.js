const hambuger_btn = document.querySelector("#hamburger"),
  header = document.querySelector("header"),
  { url } = document.body.dataset;

function addClass(e, classes) {
  e.classList && e.classList.add(...classes.split(" "));
}

function removeClass(e, classes) {
  e.classList && e.classList.remove(...classes.split(" "));
}

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

function get_data({ url }) {
  return fetch(url, {
    method: "GET",
    mode: "cors",
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
  window.pageYOffset > fixed_nav ? header.classList.add("navbar-fixed") : header.classList.remove("navbar-fixed");
});
