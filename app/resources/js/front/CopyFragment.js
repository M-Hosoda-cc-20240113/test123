export class CopyFragment {
  constructor(template, parent, add_button, copy_limit = 10) {
    this.fragment = document.createDocumentFragment();
    this.clone = document.importNode(template.content, true);
    this.template = template;
    this.parent = parent;
    this.add_button = add_button;
    this.copy_limit = copy_limit;

    this.init();
  }

  init() {
  }

  setEvent() {
    this.add_button.addEventListener((e) => {
      this.onClick(e);
    });
  }

  onClick() {
    this.addCloneToFragment();
    this.insertFragment();
  }

  addCloneToFragment() {
    this.fragment.appendChild(this.clone);
  }

  insertFragment() {
    this.parent.insertBefore(this.fragment, this.add_button);
  }
}
