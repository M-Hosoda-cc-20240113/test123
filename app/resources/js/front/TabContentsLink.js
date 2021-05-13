/**
 * タブとコンテンツを紐付ける機能
 * usage
 * 1.全てのタブにjs-tabクラスをつける
 * 2.全てのコンテンツにjs-tab_contentをつける
 */
export class TabContentsLink {
  constructor() {
    this.tabs = document.querySelectorAll('.js-tab')
    this.contents = document.querySelectorAll('.js-tab_content')
    this.init().setEvent()
  }

  /**
   * 初期化
   * @returns {TabContentsLink} this
   */
  init() {
    this.contentsAllHide()
    this.tabs.forEach((tab, index) => {
      if (this.tabs[index].classList.contains('is-active')) {
        this.contents[index].style.display = 'flex'
      }
    })
    return this
  }

  /**
   * イベントの設置
   */
  setEvent() {
    this.tabs.forEach((tab, index) => {
      tab.addEventListener('click', (e) => {
        this.onClick(e, index)
      })
    })
  }

  /**
   * クリックイベント
   * @param {Event} e
   * @param {number} index
   */
  onClick(e, index) {
    this.contentsAllHide()
    this.toggleTabActive(e, index)
    this.contents[index].style.display = 'flex'
  }

  /**
   * 全コンテンツを非表示にする
   */
  contentsAllHide() {
    this.contents.forEach((content) => {
      content.style.display = 'none'
    })
  }

  /**
   *
   * @param {Event} e
   * @param {number} index
   */
  toggleTabActive(e, index) {
    this.tabs.forEach((tab) => {
      tab.classList.remove('is-active')
    })
    this.tabs[index].classList.add('is-active')
  }
}
