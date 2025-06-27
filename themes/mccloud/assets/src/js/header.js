export class Header {
  constructor() {
    this.menuIsOpen = false;
    this.searchInput = undefined;
    this.searchContainer = ".header__search";
    this.searchValue = "";
    this.searchValueBefore = "";
    this.searchDropdown = "#headerSearchDropdown";
  }

  searchOpen(selector) {
    $(".header__search-btn").removeClass("xl:flex");
    $(".header__search").removeClass("!hidden");
    $(".header__nav").addClass("!hidden");

    if (selector) {
      $(selector).focus();
    }
  }

  searchClose() {
    $(".header__search-btn").addClass("xl:flex");
    $(".header__search").addClass("!hidden");
    $(".header__nav").removeClass("!hidden");
  }

  searchInit(el) {
    this.searchInput = $(el);

    let timer = null;
    $(el)
      .off("input")
      .on("input", () => {
        this.searchValueBefore = this.searchValue;
        this.searchValue = $(el).val();

        if (!this.searchValue) {
          this.search();
        } else if (this.searchValueBefore != this.searchValue) {
          clearTimeout(timer);
          timer = setTimeout(() => {
            this.search();
          }, 500);
        }
      });

    // $(this.searchInput).keypress(() => {
    //     this.search($(this.searchInput).val())
    // });

    $(document).mouseup((e) => {
      const container = $(this.searchContainer);
      // if the target of the click isn't the container nor a descendant of the container
      if (!container.is(e.target) && container.has(e.target).length === 0) {
        this.searchClose();
      }
    });
  }

  search() {
    if (this.searchValue.length > 0) {
      $(this.searchDropdown).removeClass("hidden");
    } else {
      $(this.searchDropdown).addClass("hidden");
    }
  }

  openMenu(selector) {
    $(".header-backdrop").removeClass("hidden");
    $(".header-drop").addClass("hidden");
    $(selector).removeClass("hidden");
    $(".header").removeClass("md:rounded-b-[22px]");
    $(".menu-toggler_open").addClass("hidden");
    $(".menu-toggler_close").removeClass("hidden");
    this.menuIsOpen = true;
  }

  closeMenu(selector) {
    $(".header-backdrop").addClass("hidden");
    $(".header-drop").addClass("hidden");
    $(".header").addClass("md:rounded-b-[22px]");
    $(".menu-toggler_open").removeClass("hidden");
    $(".menu-toggler_close").addClass("hidden");
    this.closeMenuMobile();
    this.menuIsOpen = false;
  }

  toggleMenu(selector) {
    if (!$(selector).hasClass("hidden")) {
      this.closeMenu(selector);
    } else {
      this.openMenu(selector);
    }
  }

  openMenuMobile() {
    $(".header-backdrop").removeClass("hidden");
    $(".header-drop-mobile").removeClass("hidden");
    $(".header").removeClass("md:rounded-b-[22px]");
    $(".menu-toggler_open").addClass("hidden");
    $(".menu-toggler_close").removeClass("hidden");
    this.menuIsOpen = true;
  }

  closeMenuMobile() {
    $(".header-backdrop").addClass("hidden");
    $(".header-drop-mobile").addClass("hidden");
    $(".header").addClass("md:rounded-b-[22px]");
    $(".menu-toggler_open").removeClass("hidden");
    $(".menu-toggler_close").addClass("hidden");
    this.menuIsOpen = false;
  }

  toggleMenuMobile() {
    if (this.menuIsOpen) {
      this.closeMenuMobile();
    } else {
      this.openMenuMobile();
    }
  }

  mobileProducts() {
    $(".header-drop-mobile__menu").toggleClass("hidden");
    $(".header-drop-mobile__products").toggleClass("hidden");
  }

  closeMobileSubMenu(selector) {
    $(".header-drop-mobile__menu").removeClass("hidden");
    $(selector).addClass("hidden");
  }

  openMobileSubMenu(selector) {
    $(".header-drop-mobile__menu").addClass("hidden");
    $(selector).removeClass("hidden");
  }
}
