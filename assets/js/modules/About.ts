const aboutElem = document.querySelector("#about-page");

if (aboutElem) {
  const btn = aboutElem.querySelector("button")!;

  const myFn = (e: Event) => {
    const elem = e.currentTarget;

    console.log(elem);
  };

  btn.addEventListener("click", myFn);
}
