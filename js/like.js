class Like {
  constructor() {
    this.events();
  }

  events() {
    $(".like-box").on("click", this.clickDispatcher.bind(this));
  }

  clickDispatcher(e) {
    var likeBox = $(e.target).closest(".like-box");
    if (likeBox.attr("data-exists") == "yes") {
      this.deleteLike(likeBox);
    } else {
      this.createLIke(likeBox);
    }
  }

  createLIke(likeBox) {
    var postId = likeBox.data("post-id");
    var title =
      likeBox.data("title") +
      " Has Been Liked by " +
      likeBox.data("user").toUpperCase();
    $.ajax({
      beforeSend: xhr => {
        xhr.setRequestHeader("X-WP-Nonce", universityData.nonce);
      },
      type: "POST",
      url: `${universityData.root_url}/wp-json/university/v1/like`,
      data: {
        postId: postId,
        title: title
      },
      success: res => {
        likeBox.attr("data-exists", "yes");
        var likeCount = parseInt(likeBox.find(".like-count").html(), 10);
        likeCount++;
        likeBox.find(".like-count").html(likeCount);
        likeBox.attr("data-id", res);
      },
      error: err => {
        console.log(err);
      }
    });
  }

  deleteLike(likeBox) {
    $.ajax({
      beforeSend: xhr => {
        xhr.setRequestHeader("X-WP-Nonce", universityData.nonce);
      },
      type: "DELETE",
      url: `${universityData.root_url}/wp-json/university/v1/like`,
      data: { like: likeBox.data("id") },
      success: res => {
        likeBox.attr("data-exists", "no");
        var likeCount = parseInt(likeBox.find(".like-count").html(), 10);
        likeCount--;
        likeBox.find(".like-count").html(likeCount);
        likeBox.attr("data-id", "");
        console.log(res);
      },
      error: err => {
        console.log(err);
      }
    });
  }
}

new Like();
