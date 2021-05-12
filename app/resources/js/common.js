import {Drawer} from './front/Drawer';

export function common() {

  // ドロワー
  const drawer = document.querySelector('.c-drawer--gray');
  const drawer_content = document.querySelector('.p-drawerContents');
  /**
   * @param {HTMLElement, HTMLElement}
   */
  new Drawer(drawer, drawer_content);
}
