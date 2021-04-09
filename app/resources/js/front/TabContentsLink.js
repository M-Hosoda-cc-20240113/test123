export class TabContentsLink {
    constructor() {
        this.tabs = document.querySelectorAll(".tab-js");
        this.contents = document.querySelectorAll(".tab_content-js");
        this.current_checked_index = this.findDefaultIndex();
        this.init().setEvent();
    }

    init() {
        this.contentsAllHide();
        this.tabs.forEach((tab, index) => {
            if (this.tabs[index].classList.contains("tab_active-js")) {
                this.contents[index].style.display = "flex";
            }
        });
        return this;
    }

    setEvent() {
        this.tabs.forEach((tab, index) => {
            tab.addEventListener("click", (e) => {
                this.onClick(e, index);
            });
        });
    }

    /**
     * @param {MouseEvent} e
     */
    onClick(e, index) {
        this.contentsAllHide();
        this.contents[index].style.display = "flex";
    }

    contentsAllHide() {
        this.contents.forEach((content) => {
            content.style.display = "none";
        });
    }

    findDefaultIndex() {
        this.tabs.forEach((tab, index) => {
            if (tab.classList.contains(".tab_defaul-js")) return index;
        });
    }
}
