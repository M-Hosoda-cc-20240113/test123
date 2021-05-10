export class FAQ {
  constructor() {
    this.questions = document.querySelectorAll('.p-qa__question');
    this.setEvent();
  }

  /**
   * set event
   */
  setEvent() {
    this.questions.forEach((item, index) => {
      item.addEventListener('click', (e) => {
        this.onClick(e, index);
      });
    });

  }

  /**
   *
   * @param {Event} e
   * @param {number} index
   */
  onClick(e, index) {
    const answer = this.questions[index].parentNode.querySelector('.p-qa__answer');
    answer.classList.toggle('js-active');
    answer.previousElementSibling.classList.toggle('p-qa__button--close');
  }
}
