import {TabContentsLink} from '../TabContentsLink';
import {FAQ} from '../FAQ';
import {ListMoreOpen} from '../ListMoreOpen';

export function index() {
  const content_parent = document.querySelectorAll('.js-list-more-open_parent');
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
    const more_open = element.querySelector('.js-list-more-open_btn');
    const contents = element.querySelectorAll('.js-list-more-open_child');

    new ListMoreOpen(more_open, contents, display_count);
  });
}
