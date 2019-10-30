class Search {
  constructor() {
    this.addSearchHTML();
    this.resultsDiv = $("#search-overlay__results");
    this.openButton = $(".js-search-trigger");
    this.closeButton = $(".search-overlay__close");
    this.searchOverlay = $(".search-overlay");
    this.searchField = $("#search-term");
    this.events();
    this.isOverlayOpen = false;
    this.isSpinnerVisible = false;
    this.prevValue;
    this.typingTimer;
  }

  events() {
    this.openButton.on("click", this.openOverlay.bind(this));
    this.closeButton.on("click", this.closeOverlay.bind(this));
    $(document).on("keydown", this.keyPresDispatcher.bind(this));
    this.searchField.on("keyup", this.typingLogic.bind(this));
  }

  typingLogic() {
    if (this.searchField.val() != this.prevValue) {
      clearTimeout(this.typingTimer);

      if (this.searchField.val()) {
        if (!this.isSpinnerVisible) {
          this.resultsDiv.html('<div class="spinner-loader"></div>');
          this.isSpinnerVisible = true;
        }

        this.typingTimer = setTimeout(this.getResults.bind(this), 800);
      } else {
        this.resultsDiv.html("");
        this.isSpinnerVisible = false;
      }
    }

    this.prevValue = this.searchField.val();
  }

  //Getting Results from api and render data
  getResults() {

    $.getJSON(`${universityData.root_url}/wp-json/university/v1/search?term=${this.searchField.val()}`, (res) => {
      this.resultsDiv.html(`
      <div class="row">

        <div class="one-third">
            <h3 class="search-overlay__section-title">General Info</h3>
            ${res.generalInfo.length?  `
            <ul class="link-list min-list">
            ${res.generalInfo.map((item) => {
              return `<li><a class="a-flex" href="${item.link}"><span>${item.title}</span>
              ${item.img? `<img style="height:100px;  width:35%; object-fit:cover;" src="${item.img}"> `: ''}
              </a>
              </li>`
            }).join("")}
            </ul>`: 'Nothing found On General Info'}
          
        </div>

        <div class="one-third">
           <h3 class="search-overlay__section-title">Programs</h3>
              ${res.programs.length? `
              <ul class="link-list min-list">
              ${res.programs.map((item) => {
                return `<li><a class="a-flex" href="${item.link}"><span>${item.title}</span>
                ${item.img? `<img style="height:100px;  width:35%; object-fit:cover;" src="${item.img}"> `: ''}
                </a>
                </li>`
              }).join("")}
              </ul>`: 'Nothing found On Programs'}
             
           <h3 class="search-overlay__section-title">Professors</h3>
              ${res.professors.length? `
              <ul class="link-list min-list">
                ${res.professors.map((item) => {
                  return `<li><a class="a-flex" href="${item.link}"><span>${item.title}</span>
                  ${item.img? `<img style="height:100px;  width:35%; object-fit:cover;" src="${item.img}"> `: ''}
                  </a>
                  </li>`
                }).join("")}
              </ul>`: 'Nothing found On Professors'}
              
        </div>

        <div class="one-third">
           <h3 class="search-overlay__section-title">Campuses</h3>
              ${res.campuses.length? `
              <ul class="link-list min-list">
                ${res.campuses.map((item) => {
                  return `<li><a class="a-flex" href="${item.link}"><span>${item.title}</span>
                  ${item.img? `<img style="height:100px;  width:35%; object-fit:cover;" src="${item.img}"> `: ''}
                  </a>
                  </li>`
                }).join("")}
              </ul>`: 'Nothing found On Campuses'}
              
          <h3 class="search-overlay__section-title">Events</h3>
            ${res.events.length? `
            <ul class="link-list min-list">
            ${res.events.map((item) => {
              return `<li><a class="a-flex" href="${item.link}"><span>${item.title}</span>
              ${item.img? `<img style="height:100px;  width:35%; object-fit:cover;" src="${item.img}"> `: ''}
              </a>
              </li>`
            }).join("")}
             </ul>`: 'Nothing found On Events'}

        </div>

      </div>
      `);
    });


  }


  keyPresDispatcher(e) {
    if (
      e.keyCode === 83 &&
      !this.isOverlayOpen &&
      !$("input, textarea").is(":focus")
    ) {
      this.openOverlay();
    }

    if (e.keyCode === 27 && this.isOverlayOpen) {
      this.closeOverlay();
    }
  }
  openOverlay() {
    this.searchOverlay.addClass("search-overlay--active");
    $("body").addClass("body-no-scroll");
    this.isOverlayOpen = true;
    setTimeout(() => this.searchField.focus(), 350);
  }
  closeOverlay() {
    this.searchOverlay.removeClass("search-overlay--active");
    $("body").removeClass("body-no-scroll");
    this.isOverlayOpen = false;
  }
  addSearchHTML() {
    $("body").append(`
            <div class="search-overlay">
            <div class="search-overlay__top">
                <div class="container">
                    <i class="fa fa-search search-overlay__icon" aria-hidden="true"></i>
                    <input placeholder="what are you looking for ?" type="text" name="" id="search-term" class="search-term">
                    <i class="fa fa-close search-overlay__close" aria-hidden="true"></i>
                </div>
            </div>
            <div class="container">
                <div id="search-overlay__results"></div>
            </div>
            </div>
        `);
  }
}

new Search();
