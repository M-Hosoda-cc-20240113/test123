export function user_skill_edit() {
  // 要素
  const rows = document.querySelectorAll('.p-formGroupUnit--2col__itemForSkill');
  const add_button = document.querySelector('.js-add');
  const template = document.querySelector('template');
  const REGISTER_LIMIT = 10;

  // イベント設置
  rows.forEach(function(row) {
    row.addEventListener('click', (e) => {
      // 擬似要素がクリックされた時起動
      if (e.offsetX > row.offsetWidth) {
        e.target.parentNode.removeChild(e.target);
      }
    });
  });

  try {
    add_button.addEventListener('click', (e) => {
      // 要素
      const fragment = document.createDocumentFragment();
      const clone = document.importNode(template.content, true);
      const parent = document.querySelector('.js-form');

      // 10項目以上登録できないようにする
      if (parent.querySelectorAll(
          '.p-formGroupUnit--2col__itemForSkill').length >= REGISTER_LIMIT) {
        throw new Error('10項目以上登録できません。');
      }

      fragment.appendChild(clone);

      parent.insertBefore(fragment, add_button);

      // 追加要素に対してイベントの設置
      const target = parent.querySelectorAll(
          '.p-formGroupUnit--2col__itemForSkill')[parent.querySelectorAll(
          '.p-formGroupUnit--2col__itemForSkill').length - 1];

      target.addEventListener('click', (e) => {
        if (e.offsetX > target.offsetWidth) {
          e.target.parentNode.removeChild(e.target);
        }
      });
    });
  } catch (e) {
    console.log(e);
  }
}
