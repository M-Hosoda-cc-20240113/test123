import {TabContentsLink} from '../TabContentsLink';
import {FAQ} from '../FAQ';
import {MoreOpen} from '../MoreOpen';

export function index() {
  const content_parent = document.querySelectorAll('.js-open');
  const display_count = 10;
  /**
   * コンテンツとタブのリンク
   */
  new TabContentsLink();

  /**
   * FAQイベント
   */
  new FAQ();

  /**
   * もっと見るボタン
   */
  content_parent.forEach((element) => {
    const more_open = element.querySelector('.js-more_open');
    const contents = element.querySelectorAll('.js-contents');

    new MoreOpen(more_open, contents, display_count);
  });
}
