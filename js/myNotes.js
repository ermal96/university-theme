class MyNotes{
    constructor(){
    this.events();
}

// Events
    events(){
        $('.delete-note').on('click', this.deleteNote).bind(this);
        $('.edit-note').on('click', this.editNote).bind(this);
}

// Methods

    deleteNote(e){
        var id = $(e.target).parents("li");
        $.ajax({
            beforeSend: (xhr) => {
                xhr.setRequestHeader('X-WP-Nonce', universityData.nonce);
            },
            url: `${universityData.root_url}/wp-json/wp/v2/notes/${id.data('id')}`,
            type: 'DELETE',
            success: (res) => {
                id.slideUp();
            },
            error: (err) => {
                console.log('sorry');
                console.log(err);
            }

        });
    }

    editNote(e){
        var id = $(e.target).parents("li");
        id.find('.note-title-field, .note-body-field').removeAttr('readonly').addClass('note-active-field');
        id.find('.update-note').addClass('update-note--visible');
    }
}

new MyNotes;