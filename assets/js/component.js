class ModalComponent {
  constructor(modal) {
    this.modal = modal;
    this.modal.style.display = "none";
    this.modal.p = modal.querySelector("p");
    this.modal.closeBtn = modal.querySelector("span.close");
    this.modal.closeBtn.onclick = this.closeHandler;
  }

  async fetchContent(boxId) {
    const data = await fetch(`index.php?box=${boxId}`, {
      headers: {
        "Content-Type": "application/json",
        "X-Requested-With": "XMLHttpRequest",
      },
    }).then((data) => data.json());
    this.modal.p.textContent = data.content;
  }

  open() {
    if (this.modal.style.display === "none") {
      this.modal.style.display = "block";
    }
  }
  close() {
    if (this.modal.style.display === "block") {
      this.modal.style.display = "none";
    }
  }
  closeHandler = (e) => this.close();
}

window.addEventListener("load", () => {
  
  const buttons = document.querySelectorAll("button");
  const template = document.querySelector("#contentModal");
  const modal = new ModalComponent(template);

  [...buttons].forEach((b) => {
    b.addEventListener("click",  (e) => {
      modal.open();
      modal.fetchContent(e.target.name);
    });

  });

});
