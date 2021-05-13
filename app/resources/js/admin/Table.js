export class Table {
  /**
   * @param {HTMLTableElement} table
   */
  constructor(table) {
    this.table = table
    this.setEvent()
  }

  setEvent() {
    this.table.querySelectorAll('tbody tr').forEach((el) => {
      el.addEventListener('click', (e) => {
        this.jumpToOherPage(e)
      })
    })
  }

  /**
   * @param {MouseEvent} e
   */
  jumpToOherPage(e) {
    window.location.href = e.target.parentElement.getAttribute('data-href')
  }
}
