/**
 * usege
 * 1. コンテンツの親要素に'js-parent'を付与
 * 2. 追加ボタンに'js-add'を付与
 * 3. 削除ボタンに'js-remove'を付与
 *
 * 擬似要素を削除ボタンとする場合は第二引数にtrueを入れる。
 * 追加最大値は第一引数に入れる(defaultは10)
 */
export class CopyFragment {
  constructor(index = 0, copy_limit = 10, delete_btn_is_after_el = false) {
    this.template = document.querySelectorAll('template')[index]
    this.parent = document.querySelectorAll('.js-parent')[index]
    this.add_button = document.querySelectorAll('.js-add')[index]
    this.remove_button = this.parent.querySelectorAll('.js-remove')
    this.copy_limit = copy_limit
    this.delete_btn_is_after_el = delete_btn_is_after_el
    this.count = this.parent.querySelectorAll('.js-content').length

    this.init()
    this.setEvent()
  }

  /**
   * initialize
   */
  init() {
    if (this.count === 0) {
      this.insertFragment(this.createFragment())
      this.isLimit()
    }
  }

  /**
   * setEvent
   */
  setEvent() {
    this.add_button.addEventListener('click', (e) => {
      this.onClick(e)
    })

    this.parent.querySelectorAll('.js-remove').forEach((item, index) => {
      item.addEventListener('click', (e) => {
        this.onClick(e, index)
      })
    })
  }

  /**
   * onClick
   * @param {Event} e
   * @param {int|null} index
   */
  onClick(e, index = null) {
    switch (e.target) {
      case this.add_button:
        if (this.count > this.copy_limit - 1) return
        this.insertFragment(this.createFragment())
        this.isLimit()
        break
      case this.remove_button[index]:
        this.removeSelf(e)
        break
    }
  }

  /**
   * create fragment
   * @returns {DocumentFragment} fragment
   */
  createFragment() {
    const fragment = document.createDocumentFragment()
    const clone = document.importNode(this.template.content, true)
    fragment.appendChild(clone)
    return fragment
  }

  /**
   * insert fragment
   * @param {DocumentFragment} fragment
   */
  insertFragment(fragment) {
    this.parent.insertBefore(fragment, this.add_button)
    this.count++
    if (this.delete_btn_is_after_el) {
      this.parent
        .querySelectorAll('.js-content')
        [this.count - 1].addEventListener('click', (e) => {
          this.removeSelf(e)
        })
      return
    }
    this.parent
      .querySelectorAll('.js-content')
      [this.count - 1].querySelector('.js-remove')
      .addEventListener('click', (e) => {
        this.removeSelf(e)
      })
  }

  /**
   * remove content
   * @param {Event} e
   */
  removeSelf(e) {
    // 擬似要素clickで削除する時
    if (this.delete_btn_is_after_el) {
      if (e.offsetX > e.target.offsetWidth) {
        e.target.parentNode.removeChild(e.target)
      }
      this.count--
      this.isLimit()
      return
    }
    e.target.parentNode.remove()
    this.count--
    this.isLimit()
  }

  /**
   * 制限か判定
   */
  isLimit() {
    this.count >= this.copy_limit
      ? (this.add_button.style.opacity = 0.5)
      : (this.add_button.style.opacity = 1)
  }
}
