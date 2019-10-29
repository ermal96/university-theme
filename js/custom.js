class Search {
    constructor(){
       this.addSearchHTML();
       this.resultsDiv = $("#search-overlay__results");
       this.openButton = $(".js-search-trigger");
       this.closeButton = $(".search-overlay__close");
       this.searchOverlay = $(".search-overlay");
       this.searchField=  $("#search-term");
       this.events();
       this.isOverlayOpen = false;
       this.isSpinnerVisible = false;
       this.prevValue;
       this.typingTimer;
    }

    events(){
       this.openButton.on("click", this.openOverlay.bind(this));
       this.closeButton.on("click", this.closeOverlay.bind(this));
       $(document).on("keydown", this.keyPresDispatcher.bind(this));
       this.searchField.on("keyup", this.typingLogic.bind(this));
    }

    typingLogic(){
        if(this.searchField.val() != this.prevValue){
            clearTimeout(this.typingTimer);

            if(this.searchField.val()){
                if(!this.isSpinnerVisible){
                    this.resultsDiv.html('<div class="spinner-loader"></div>');
                    this.isSpinnerVisible = true;
                }

                this.typingTimer = setTimeout(this.getResults.bind(this), 800);

            } else{
                this.resultsDiv.html('');
                this.isSpinnerVisible = false;
            } 

            
           
        }

        this.prevValue = this.searchField.val();
    }

    getResults(){
        this.isSpinnerVisible = false;
        $.getJSON(universityData.root_url + `/wp-json/wp/v2/posts?search=${this.searchField.val()}`, (posts) => {
        $.getJSON(universityData.root_url + `/wp-json/wp/v2/pages?search=${this.searchField.val()}`, (pages) => {
            var allResults = posts.concat(pages);
            this.resultsDiv.html(`
            <h2 class="search-overlay__section-title">${allResults.length ? 'Result found for ' +  this.searchField.val() : 'Sorry no result found ' + this.searchField.val() }</h2>
            <ul class="link-list min-list">
               ${allResults.map(data => `<li><a href="${data.link}">${data.title.rendered}</a></li>`).join('')}
            </ul>
    `)
        })
    } )
    }

    keyPresDispatcher(e){

       if(e.keyCode === 83 && !this.isOverlayOpen && !$('input, textarea').is(':focus')){
            this.openOverlay();
       };
       
       if(e.keyCode === 27 && this.isOverlayOpen) {
            this.closeOverlay();
       };

    }
    openOverlay(){
        this.searchOverlay.addClass("search-overlay--active");
        $('body').addClass('body-no-scroll');
        this.isOverlayOpen = true;
        setTimeout(() => this.searchField.focus() , 350);
    }
    closeOverlay(){
        this.searchOverlay.removeClass("search-overlay--active");
        $('body').removeClass('body-no-scroll');
        this.isOverlayOpen = false;
    }
    addSearchHTML(){
        $('body').append(`
            <div class="search-overlay">
            <div class="search-overlay__top">
                <div class="container">
                    <i class="fa fa-search search-overlay__icon" aria-hidden="true"></i>
                        <input placeholder="what are you looking for ?" type="text" name="" id="search-term" class="search-term">
                    <i class="fa fa-close search-overlay__close" aria-hidden="true"></i>
                </div>
            </div>
            <div class="container">
                <div id="search-overlay__results">
                </div>
            </div>
            </div>
        `)
    }

}

var search = new Search();

