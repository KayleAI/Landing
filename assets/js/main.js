// Load Char Class Custom Element

class LoadChar extends HTMLElement {
  constructor() {
    super();
    this.dots = 1;
    this.interval = null;
  }

  connectedCallback() {
    this.startAnimation();
  }

  disconnectedCallback() {
    this.stopAnimation();
  }

  startAnimation() {
    this.interval = setInterval(() => {
      this.innerHTML = ".".repeat(this.dots);
      this.dots = (this.dots % 3) + 1;
    }, 550);
  }

  stopAnimation() {
    clearInterval(this.interval);
    this.innerHTML = "";
  }
}

customElements.define("load-char", LoadChar);
