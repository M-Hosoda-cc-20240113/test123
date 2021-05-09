export class Drawer {
  /**
   * @param {HTMLElement} drawer
   */
  constructor(drawer) {
    this.drawer = drawer;
    this.setEvent();
  }

  /**
   * initialize
   */
  init() {

  }

  /**
   *  set event
   */
  setEvent() {
    this.drawer.addEventListener('click', (e) => {
      this.onClick(e);
    });
  }

  /**
   *
   * @param {MouseEvent} e
   */
  onClick(e) {
    this.toggleDrawer(e.currentTarget);
  }

  /**
   * @param {HTMLElement} e
   */
  toggleDrawer(e) {
    e.classList.toggle('js-active');
  }
}
