export class Table {
  /**
   * @param {HTMLTableElement} table
   */
  constructor(table) {
    this.table = table;
    this.setEvent();
  }

  setEvent() {
    this.table.querySelectorAll('tbody tr').forEach((el) => {
      el.addEventListener('click', (e) => {
        this.jumpToOtherPage(e);
      });
    });
  }

  /**
   * @param {Event} e
   */
  jumpToOtherPage(e) {
    window.location.href = e.target.parentElement.getAttribute('data-href');
  }
}
