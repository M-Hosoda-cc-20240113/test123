import {TabContentsLink} from '../TabContentsLink';
import {SearchProjectApi} from '../SearchProjectApi';

export function index() {
  /**
   * コンテンツとタブのリンク
   */
  new TabContentsLink();

  /**
   * プロジェクト検索
   */
  const search_button = document.querySelector('.js-project_search');
  const search_url = search_button.dataset.searchUrl;

  // デフォルトパラメータ
  const current_page_of_search = 2;
  const text = '';

  const search_parameter = {
    page: current_page_of_search,
    keyword: text,
  };

  const search_api = new SearchProjectApi(search_url);
  search_button.addEventListener('click', (e) => {
    search_api.search(search_parameter).then((obj) => {
      console.log(obj);
    });
  });
}
