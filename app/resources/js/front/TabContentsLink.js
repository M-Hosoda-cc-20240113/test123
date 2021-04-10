/**
 * タブとコンテンツを紐付ける機能
 * usage 
 * 1.全てのタブにtab-jsクラスをつける
 * 2.全てのコンテンツにtab_content-jsをつける
 * 3.デフォルトでactiveにしたいタブにtab_active-jsをつける
 */
export class TabContentsLink {
    constructor() {
        this.tabs = document.querySelectorAll(".tab-js");
        this.contents = document.querySelectorAll(".tab_content-js");
        this.init().setEvent();
    }

    /**
     * 初期化
     * @returns {TabContentsLink} this
     */
    init() {
        this.contentsAllHide();
        this.tabs.forEach((tab, index) => {
            if (this.tabs[index].classList.contains("active")) {
                this.contents[index].style.display = "flex";
            }
        });
        return this;
    }

    /**
     * イベントの設置
     */
    setEvent() {
        this.tabs.forEach((tab, index) => {
            tab.addEventListener("click", (e) => {
                this.onClick(e, index);
            });
        });
    }

    /**
     * クリックイベント
     * @param {MouseEvent} e
     */
    onClick(e, index) {
        this.contentsAllHide();
        this.toggleTabActive(e);
        this.contents[index].style.display = "flex";
    }

    /**
     * 全コンテンツを非表示にする
     */
    contentsAllHide() {
        this.contents.forEach((content) => {
            content.style.display = "none";
        });
    }

    /**
     * 
     * @param {MouseEvent} e 
     */
    toggleTabActive(e) {
      this.tabs.forEach((tab)=>{
          tab.classList.remove('active'); 
      });
      e.target.classList.add('active');
    }
}
