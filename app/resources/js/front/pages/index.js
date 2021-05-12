import {TabContentsLink} from '../TabContentsLink';
import {FAQ} from '../FAQ';
import {Drawer} from '../Drawer';

export function index() {
  /**
   * コンテンツとタブのリンク
   */
  new TabContentsLink();

  const drawer = document.querySelector('.c-drawer--gray');
  const drawer_content = document.querySelector('.p-drawerContents');
  /**
   * @param {HTMLElement, HTMLElement}
   */
  new Drawer(drawer, drawer_content);

  /**
   * FAQイベント
   */
  new FAQ();
}
