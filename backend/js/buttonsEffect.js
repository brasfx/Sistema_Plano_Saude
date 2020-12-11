elems = document.querySelectorAll('.sidenav');
const instances = M.Sidenav.init(elems);

dropdown = document.querySelectorAll('.dropdown-trigger');
const initDrop = M.Dropdown.init(dropdown, {
  coverTrigger: false,
});
