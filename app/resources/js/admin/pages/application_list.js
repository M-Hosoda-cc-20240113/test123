export function application_list() {
  const rows = document.querySelectorAll('tr');
  rows.forEach((row) => {
    if (row.classList.contains('js-button-active')) {
      row.querySelector('button').disabled = true;
      row.querySelector('button').classList.add('c-button--disabled');
    }
  });
}