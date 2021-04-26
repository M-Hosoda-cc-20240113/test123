export class SearchProjectApi {
  constructor(search_api_url) {
    this.url = search_api_url;
    this.DEFAULT_HITS = 8;
  }

  async search(parameter) {
    // デフォルトの検索パラメータ
    const api_parameter = {
      hits: this.DEFAULT_HITS,
      page: 1,
      keyword: '',
    };

    // パラメータの上書き
    Object.keys(parameter).forEach(function(key) {
      api_parameter[key] = parameter[key];
    });

    const qs = new URLSearchParams(api_parameter);
    const res = await fetch(`${this.url}?${qs}`);
    return res.json();
  }
}
