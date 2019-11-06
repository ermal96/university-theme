class MyNotes {
  constructor() {
    this.events();
  }

  // Events

  events() {
    $("#my-notes").on("click", ".delete-note", this.deleteNote.bind(this));
    $("#my-notes").on("click", ".edit-note", this.editNote.bind(this));
    $("#my-notes").on("click", ".update-note", this.updateNote.bind(this));
    $(".submit-note").on("click", this.createNote.bind(this));
  }

  // Methods

  deleteNote(e) {
    var id = $(e.target).parents("li");
    $.ajax({
      beforeSend: xhr => {
        xhr.setRequestHeader("X-WP-Nonce", universityData.nonce);
      },
      url: `${universityData.root_url}/wp-json/wp/v2/notes/${id.data("id")}`,
      type: "DELETE",
      success: res => {
        id.slideUp();
      },
      error: err => {
        console.log(err);
      }
    });
  }

  updateNote(e) {
    var id = $(e.target).parents("li");
    var updatedNote = {
      title: id.find(".note-title-field").text(),
      content: id.find(".note-body-field").text()
    };
    $.ajax({
      beforeSend: xhr => {
        xhr.setRequestHeader("X-WP-Nonce", universityData.nonce);
      },
      url: `${universityData.root_url}/wp-json/wp/v2/notes/${id.data("id")}`,
      type: "POST",
      data: updatedNote,
      success: res => {
        this.makeNoteReadonly(id);
        console.log(res);
      },
      error: err => {
        console.log(err);
      }
    });
  }

  createNote(e) {
    var newNote = {
      title: $(".new-note-title").val(),
      content: $(".new-note-body").val(),
      status: "publish"
    };
    $.ajax({
      beforeSend: xhr => {
        xhr.setRequestHeader("X-WP-Nonce", universityData.nonce);
      },
      url: `${universityData.root_url}/wp-json/wp/v2/notes/`,
      type: "POST",
      data: newNote,
      success: res => {
        $(".new-note-title, .new-note-body").val("");
        $(`
        <li data-id="${res.id}">
            <span contentEditable="false" class="note-title-field" type="text">
                ${res.title.raw}
            </span>
                <span class="edit-note"><i class="fa fa-pencil"></i> Edit</span>
                <span class="delete-note"><i class="fa fa-trash-o"></i> Delete</span>
            <span contentEditable="false" class="note-body-field" cols="30" rows="10">
                   ${res.content.raw}
            </span>
            <span class="update-note btn btn--blue btn--small"><i class="fa fa-arrow-right"></i> Save</span>
        </li>
        `)
          .prependTo("#my-notes")
          .hide()
          .slideDown();
      },
      error: err => {
        console.log(err);
      }
    });
  }

  editNote(e) {
    var id = $(e.target).parents("li");

    if (id.data("state") == "editable") {
      this.makeNoteReadonly(id);
    } else {
      this.makeNoteEditable(id);
    }
  }

  makeNoteEditable(id) {
    id.find(".edit-note").html('<i class="fa fa-times"></i> Cancel');
    id.find(".note-title-field, .note-body-field")
      .attr("contentEditable", "true")
      .addClass("note-active-field");
    id.find(".update-note").addClass("update-note--visible");
    id.data("state", "editable");
  }

  makeNoteReadonly(id) {
    id.find(".edit-note").html('<i class="fa fa-pencil"></i> Edit');
    id.find(".note-title-field, .note-body-field")
      .attr("contentEditable", "false")
      .removeClass("note-active-field");
    id.find(".update-note").removeClass("update-note--visible");
    id.data("state", "cancel");
  }
}

new MyNotes();
