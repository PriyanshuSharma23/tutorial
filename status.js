export class StatusText {
  constructor(elm) {
    this.elm = elm;
    this.text = elm.textContent;
    this.elm.textContent = "";
    this.elm.style.opacity = 0;
    this.states = {
      error: "text-danger",
      success: "text-success",
      neutral: "text-neutral",
    };
  }

  show(text, state) {
    this.elm.textContent = text;

    this.elm.classList.remove(this.states.error);
    this.elm.classList.remove(this.states.success);
    this.elm.classList.remove(this.states.neutral);

    this.elm.classList.add(this.states[state]);
    this.elm.style.opacity = 1;
  }

  hide() {
    this.elm.textContent = "";
    this.elm.classList.remove(this.states.error);
    this.elm.classList.remove(this.states.success);
    this.elm.classList.remove(this.states.neutral);
    this.elm.style.opacity = 0;
  }
}
