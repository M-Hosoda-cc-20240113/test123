export class MoreOpen {
  constructor() {
    this.moreOpenBtn = document.querySelectorAll('.js-more_open');
    this.skillContents = document.querySelectorAll('.js-skill_content');
    this.positionContents = document.querySelectorAll('.js-position_content');
    this.areaContents = document.querySelectorAll('.js-area_content');
    this.setEvent();
  }

  init() {
    this.contentsHide()
    this.moreOpenBtn.forEach((tab, index) => {
      if (this.moreOpenBtn[index].classList.contains('is-active')) {
        this.skillContents[index].style.display = 'flex'
        this.positionContents[index].style.display = 'flex'
        this.areaContents[index].style.display = 'flex'
      }
    })
    return this
  }

  /**
   * イベントの設置
   */
  setEvent() {
    this.moreOpenBtn.forEach((tab, index) => {
      tab.addEventListener('click', (e) => {
        this.onClick(e, index)
      })
    })
  }

  onClick(e, index) {
    this.contentsHide()
    this.skillContents[index].style.display = 'flex'
    this.positionContents[index].style.display = 'flex'
    this.areaContents[index].style.display = 'flex'
  }

  /**
   * コンテンツを非表示にする
   */
  contentsHide() {
    this.skillContents.forEach((content,index) => {
      if (index > 10){
        content.style.display = 'none'
      }
    })
    this.positionContents.forEach((content,index) => {
      if (index > 10){
        content.style.display = 'none'
      }
    })
    this.areaContents.forEach((content,index) => {
      if (index > 10){
        content.style.display = 'none'
      }
    })
  }
}
