window.onload = () => {
  // var forms = document.querySelectorAll('form');
  // forms.forEach(function(form) {
  //     var input = document.createElement('input');
  //     input.setAttribute('type', 'hidden');
  //     input.setAttribute('id', 'zc_gad');
  //     input.setAttribute('name', 'zc_gad');
  //     input.setAttribute('value', '');
  //     form.appendChild(input);
  // });

  const anchors = document.querySelectorAll(".anchor");
  const productBlock1 = document.getElementById("product-info-block-one");
  const productBlock2 = document.getElementById("product-info-block-two");
  const productBlock3 = document.getElementById("product-info-block-three");
  const animItem = document.querySelector(".section-info");
  const element = document.querySelector(".count1");
  const element1 = document.querySelector(".count2");
  const element2 = document.querySelector(".count3");
  // OutNum
  if (element != null && element1 != null && element2 != null) {
    if (window.innerWidth >= 1024) {
      element.innerHTML = "";
      element1.innerHTML = "";
      element2.innerHTML = "";
    } else {
      element.innerHTML = "7";
      element1.innerHTML = "25000";
      element2.innerHTML = "1000";
    }

    if (
      (window.pageYOffset == 0 && window.innerWidth >= 1024) ||
      (window.pageYOffset > 1200 && window.innerWidth >= 1024)
    ) {
      function outNum(number, timer, step, count) {
        let numberTop = number.getBoundingClientRect().top;
        let t = timer / (count / step);
        let end = count;
        let result = 0;
        window.addEventListener("scroll", function onScroll() {
          if (window.pageYOffset > numberTop - (window.innerHeight - 100)) {
            animItem.style.opacity = "1";
            this.removeEventListener("scroll", onScroll);
            let interval = setInterval(function () {
              result += step;
              number.innerHTML = result;
              if (result == end) {
                clearInterval(interval);
              }
            }, t);
          }
        });
      }

      outNum(element, 2000, 1, 7);
      outNum(element1, 2000, 1000, 25000);
      outNum(element2, 2000, 50, 1000);
    } else {
      if (window.innerWidth >= 1024) {
        function outNumOnload(number, timer, step, count) {
          let end = count;
          let t = timer;
          let result = 0;
          animItem.style.opacity = "1";
          let interval = setInterval(function () {
            result += step;
            number.innerHTML = result;
            if (result == end) {
              clearInterval(interval);
            }
          }, t);
        }
        outNumOnload(element, 2000 / (7 / 1), 1, 7);
        outNumOnload(element1, 2000 / (25000 / 1000), 1000, 25000);
        outNumOnload(element2, 2000 / (1000 / 50), 50, 1000);
      }
    }

    // anchor
  }

  if (
    productBlock1 != null &&
    productBlock2 != null &&
    productBlock3 != null &&
    window.innerWidth < 1024
  ) {
    function goToAnchor(element, elementBlock) {
      element.onclick = () => {
        const header = document.querySelector(".header");
        header.classList.add("header-active");
        elementBlock.scrollIntoView({ block: "start", behavior: "smooth" });
        setTimeout(() => {
          window.addEventListener("scroll", function scrolling() {
            header.classList.remove("header-active");
            window.removeEventListener("scroll", scrolling);
          });
        }, 1000);
      };
    }
    goToAnchor(anchors[0], productBlock1);
    goToAnchor(anchors[1], productBlock2);
    goToAnchor(anchors[2], productBlock3);
  }
  if (window.innerWidth > 1024) {
    function goToAnchor(element, block) {
      const header = document.querySelector(".header");
      if (element != undefined) {
        element.onclick = () => {
          block.scrollIntoView({ block: "start", behavior: "smooth" });
          header.classList.add("header-active");
          setTimeout(() => {
            window.addEventListener("scroll", function scrolling() {
              header.classList.remove("header-active");
              window.removeEventListener("scroll", scrolling);
            });
          }, 1000);
        };
      }
    }
    const rowProduct = document.querySelector(".product-img-2");
    goToAnchor(anchors[0], rowProduct);
    goToAnchor(anchors[1], rowProduct);
    goToAnchor(anchors[2], rowProduct);
  }

  /// anchor-close

  const btnsModal = document.querySelectorAll(".product-btn");
  const modal = document.querySelector(".modal__window");
  const btnsModalUA = document.querySelectorAll(".product-btn-ua");
  const modalUA = document.querySelector(".modal__window-ua");
  const modalBg = document.querySelector(".fixed-overlay");
  const closeModal = document.querySelector(".modal__close");
  const modalBgUA = document.querySelector(".fixed-overlay-ua");
  const closeModalUA = document.querySelector(".modal__close-ua");
  const HTML = document.querySelector("html");
  for (let i = 0; i < btnsModal.length; i++) {
    if (btnsModal[i] != undefined) {
      btnsModal[i].onclick = () => {
        modal.style.top = "25%";
        modalBg.style.cssText = `
                height:100%;
                width:100%;
                opacity:1;
            `;
        HTML.classList.add("overflow");
      };
    }
  }

  if (closeModal != undefined) {
    closeModal.onclick = () => {
      modal.style.top = "";
      modalBg.style.cssText = `
                       opacity:0;
                       height:0;
                       width:0;
                    `;
      HTML.classList.remove("overflow");
    };
  }

  for (let i = 0; i < btnsModalUA.length; i++) {
    if (btnsModalUA[i] != undefined) {
      btnsModalUA[i].onclick = () => {
        modalUA.style.top = "25%";
        modalBgUA.style.cssText = `
                height:100%;
                width:100%;
                opacity:1;
            `;
        HTML.classList.add("overflow");
      };
    }
  }

  if (closeModalUA != undefined) {
    closeModalUA.onclick = () => {
      modalUA.style.top = "";
      modalBgUA.style.cssText = `
                       opacity:0;
                       height:0;
                       width:0;
                    `;
      HTML.classList.remove("overflow");
    };
  }

  document.body.style.fontFamily = "";

  const subBtn = document.querySelector(".menu-item-8");
  const subArrow = document.querySelector(".menu-item-8 a");
  const subMenuBlock = document.querySelector(".menu-item-8 ul");
  const subBtnUA = document.querySelector(".menu-item-609");
  const subArrowUA = document.querySelector(".menu-item-609 a");
  const subMenuBlockUA = document.querySelector(".menu-item-609 ul");
  let rotate = "";
  let top = "";

  function getSubMenuHeader(btn, menu, arrow) {
    if (btn != undefined) {
      btn.onclick = () => {
        if (window.innerWidth <= 768) {
          if (menu.classList.contains("active")) {
            menu.classList.remove("active");
            rotate = "rotate(45deg)";
            top = "0";
            arrow.style.setProperty("--sq-rotate", rotate);
            arrow.style.setProperty("--sq-top", top);
          } else {
            menu.classList.add("active");
            btn.classList.add("arrow");
            rotate = "rotate(-135deg)";
            top = "5px";
            arrow.style.setProperty("--sq-rotate", rotate);
            arrow.style.setProperty("--sq-top", top);
          }
        }
      };
    }
  }
  const mainBtn = document.querySelector(".burger");
  const mainMenu = document.querySelector(".menu-header__menu-container");
  const mainMenuUA = document.querySelector(".menu-menu__header-ua-container");
  const firstSpan = document.querySelector(".first-span");
  const secondSpan = document.querySelector(".second");
  const thirdSpan = document.querySelector(".third");

  function getMainMenuHeader(btn, menu, span1 = 2, span2 = 3, span3 = 4) {
    btn.addEventListener("click", () => {
      if (menu.classList.contains("active-menu-header") && menu != null) {
        menu.classList.remove("active-menu-header");
        firstSpan.classList.remove("first-span-active");
        secondSpan.classList.remove("second-span-active");
        thirdSpan.classList.remove("third-span-active");
      } else {
        menu.classList.add("active-menu-header");
        firstSpan.classList.add("first-span-active");
        secondSpan.classList.add("second-span-active");
        thirdSpan.classList.add("third-span-active");
      }
    });
  }

  getSubMenuHeader(subBtn, subMenuBlock, subArrow);
  getMainMenuHeader(mainBtn, mainMenu);

  getSubMenuHeader(subBtnUA, subMenuBlockUA, subArrowUA);
  getMainMenuHeader(mainBtn, mainMenuUA);
};
