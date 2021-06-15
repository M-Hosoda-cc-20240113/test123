import { TabContentsLink } from '../TabContentsLink'
import { FAQ } from '../FAQ'
import {MoreOpen} from '../MoreOpen';

export function index() {
  /**
   * コンテンツとタブのリンク
   */
  new TabContentsLink()

  /**
   * FAQイベント
   */
  new FAQ()

  /**
   * もっと見るボタン
   */
  new MoreOpen()
}
